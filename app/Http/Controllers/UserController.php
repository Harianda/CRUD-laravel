<?php

namespace App\Http\Controllers;

use App\Models\user as modelUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = modelUser::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        modelUser::create($request->all());

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(modelUser $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, modelUser $user)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(modelUser $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
