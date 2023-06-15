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
        $user = auth()->user();
        $clients = $user->clients;
        
        return view('clients.index', ['clients' => $clients]);
    }


    public function create()
    {
        return view('clients.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'direction' => 'required',
            'birthday' => 'required|date',
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
        $client->user_id = $user->id; // Assign the user ID to the client
        $client->save();

        return redirect()->route('clients.index')->with('success', 'A new client has been created');
    }


    public function show(string $id)
    {
        $client = Client::find($id);

        return view('clients.show', ['client' => $client]);
    }


    public function edit(string $id)
    {
        $client = Client::find($id);
        return view('clients.edit', ['client' => $client]);
    }


    public function update(Request $request, string $id)
    {
        $client = Client::find($id);
        $client->name = $request->input('name');
        $client->last_name = $request->input('last_name');
        $client->email = $request->input('email');
        $client->phone_number = $request->input('phone_number');
        $client->direction = $request->input('direction');
        $client->birthday = $request->input('birthday');
        $client->save();

        return redirect()->route('clients.index')->with('success', 'Client updated successfully');
    }


    public function destroy(string $id)
    {
        $client = Client::find($id);
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'A client has been removed');
    }
}
