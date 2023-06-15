<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|min:2',
            'rol' => 'required|in:user,employee,admin',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'state' => 'nullable|boolean',
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->rol = $request->input('rol');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->state = $request->input('state', true);
        $user->save();

        return redirect()->route('users.index')->with('success', 'A new user has been created');
    }


    public function show(string $id)
    {
        $user = User::find($id);

        return view('users.show', ['user' => $user]);
    }


    public function edit(string $id)
    {
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
    }


    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $request->validate([
            'name' => 'required|unique:users,name,' . $id . '|min:2',
            'rol' => 'required|in:user,employee,admin',
            'email' => 'required|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'state' => 'nullable|boolean',
        ]);

        $user->name = $request->input('name');
        $user->rol = $request->input('rol');
        $user->email = $request->input('email');
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->state = $request->input('state', true);
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }


    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'A user has been removed');
    }
    public function disable(string $id)
    {
        $user = User::find($id);
        $user->state = false;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User disabled successfully');
    }

    public function enable(string $id)
    {
        $user = User::find($id);
        $user->state = true;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User enabled successfully');
    }
}
