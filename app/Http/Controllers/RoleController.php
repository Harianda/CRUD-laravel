<?php

namespace App\Http\Controllers;

use App\Models\role as modelRole;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = modelRole::all();

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_role' => 'required|max:255',
        ]);

        modelRole::create($validatedData);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function edit(modelRole $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, modelRole $role)
    {
        $validatedData = $request->validate([
            'nama_role' => 'required|max:255',
        ]);

        $role->update($validatedData);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(modelRole $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
