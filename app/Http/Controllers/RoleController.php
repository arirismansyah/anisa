<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function add_role(Request $request)
    {
        $valid = $request->validate([
            'name' => ['required'],
            'guard_name' => ['required'],
        ]);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);

        if ($role) {
            return redirect()->back()->with('success', 'Role berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Role gagal ditambahkan.');
        }
    }

    public function edit_role(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
            'name' => ['required'],
            'guard_name' => ['required'],
        ]);

        $affectedRows = Role::find($request->id)->update(array('name' => $request->name, 'guard_name' => $request->guard_name));

        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'Role berhasil diperbaharui.');
        } else {
            return redirect()->back()->with('error', 'Role gagal diperbaharui.');
        }
    }

    public function delete_role(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
        ]);

        $affectedRows = Role::find($request->id)->delete();
        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'Role berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Role gagal dihapus.');
        }
    }
}
