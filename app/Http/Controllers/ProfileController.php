<?php

namespace App\Http\Controllers;

use App\Models\profile as modelProfile;
use App\Models\user as modelUser;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = modelProfile::all();

        return view('profiles.index', compact('profiles'));
    }

    public function create()
    {
        $users = modelUser::all();
        return view('profiles.create',compact('users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_user' => 'required|integer',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'notlp' => 'required|string',
        ]);

        modelProfile::create($validatedData);

        return redirect()->route('profiles.index')->with('success', 'Profile created successfully.');
    }

    public function edit(modelProfile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    public function update(Request $request, modelProfile $profile)
    {
        $validatedData = $request->validate([
            'id_user' => 'required|integer',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'notlp' => 'required|string',
        ]);

        $profile->update($validatedData);

        return redirect()->route('profiles.index')->with('success', 'Profile updated successfully.');
    }

    public function destroy(modelProfile $profile)
    {
        $profile->delete();

        return redirect()->route('profiles.index')->with('success', 'Profile deleted successfully.');
    }
}
