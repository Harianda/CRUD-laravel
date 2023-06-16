<?php

namespace App\Http\Controllers;

use App\Models\user_role as modelUserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function assignRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'role_id' => 'required',
        ]);

        $userRole = new modelUserRole();
        $userRole->id_user = $request->input('user_id');
        $userRole->id_role = $request->input('role_id');
        $userRole->save();

        return redirect()->back()->with('success', 'Role assigned successfully.');
    }

    public function removeRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'role_id' => 'required',
        ]);

        modelUserRole::where('id_user', $request->input('user_id'))
            ->where('id_role', $request->input('role_id'))
            ->delete();

        return redirect()->back()->with('success', 'Role removed successfully.');
    }
}
