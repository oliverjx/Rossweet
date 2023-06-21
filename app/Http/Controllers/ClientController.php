<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::all();

        return view('clients.index', ['clients' => $clients]);
    }


    public function create()
    {
        return view('clients.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'direction' => 'required',
            'birthday' => 'required|date',
            'geder' => 'required'
        ]);

        // Create a new user
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); // Set a default password
        $user->save();

        // Create a new client and associate it with the user
        $client = new Client;
        $client->name = $request->input('name');
        $client->last_name = $request->input('last_name');
        $client->email = $request->input('email');
        $client->phone_number = $request->input('phone_number');
        $client->direction = $request->input('direction');
        $client->birthday = $request->input('birthday');
        $client->Gender = $request->input('gender');
        $client->user_id = $user->id; // Assign the user ID to the client
        $client->save();

        
        return redirect()->route('clients.index')->with('success', 'A new client has been created');
        
    }

    public function edit(string $id)
    {
        $client = Client::find($id);
        return view('clients.edit', ['client' => $client]);
    }


    public function update(Request $request, Client $client)
    {
        $request->validate([
            'edit-name' => 'required',
            'edit-last_name' => 'required',
            'edit-email' => 'required|email',
            'edit-phone_number' => 'required',
            'edit-direction' => 'required',
            'edit-birthday' => 'required|date',
        ]);

        $client->name = $request->input('edit-name');
        $client->last_name = $request->input('edit-lastname');
        $client->email = $request->input('edit-email');
        $client->phone_number = $request->input('edit-phonenumber');
        $client->direction = $request->input('edit-direction');
        $client->birthday = $request->input('edit-birthday');
        $client->gender = $request->input('edit-gender');
        $client->notes = $request->input('edit-notes');
        $client->save();

        return redirect()->route('clients.index')->with('success', 'Client updated successfully');
    }


    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'A client has been removed');
    }
}
