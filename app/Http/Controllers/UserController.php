<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function add_user(Request $request)
    {
        $valid = $request->validate([
            'nama' => ['required'],
            'username' => ['required'],
            'kode_tim' => ['required'],
            'nama_tim' => ['required'],
            'password' => ['required'],
            'role' => ['required']
        ]);

        if ($request->email != null) {
            $email = $request->email;
        } else {
            $email = null;
        }

        if ($request->jenis_kelamin != null) {
            $jenis_kelamin = $request->jenis_kelamin;
        } else {
            $jenis_kelamin = null;
        }

        if ($request->no_telp != null) {
            $no_telp = $request->no_telp;
        } else {
            $no_telp = null;
        }


        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'nama' => $request->nama,
            'kode_tim' => $request->kode_tim,
            'nama_tim' => $request->nama_tim,

            'email' => $email,
            'jenis_kelamin' => $jenis_kelamin,
            'no_telp' => $no_telp,
        ]);

        $user->assignRole($request->role);

        if ($user) {
            return redirect()->back()->with('success', 'User berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'User gagal ditambahkan.');
        }
    }

    public function edit_role_user(Request $request)
    {
        $valid = $request->validate(
            [
                'id' => ['required'],
                'role' => ['required'],
            ]
        );

        $user = User::find($request->id);
        $result = $user->syncRoles([$request->role]);
        if ($result) {
            return redirect()->back()->with('success', 'Role berhasil diperbaharui.');
        } else {
            return redirect()->back()->with('error', 'Role gagal diperbaharui.');
        }
    }

    public function get_user_byid(Request $request)
    {
        $valid = $request->validate(
            [
                'id' => ['required'],
            ]
        );

        $user = User::find($request->id);
        return $user;
    }

    public function edit_user(Request $request)
    {
        $valid = $request->validate(
            [
                'id' => ['required'],
                'username' => ['required',],
                'nama' => ['required'],
                'kode_tim' => ['required'],
                'nama_tim' => ['required'],
                'role' => ['required'],
            ]
        );

        if ($request->email != null) {
            $email = $request->email;
        } else {
            $email = null;
        }

        if ($request->jenis_kelamin != null) {
            $jenis_kelamin = $request->jenis_kelamin;
        } else {
            $jenis_kelamin = null;
        }

        if ($request->no_telp != null) {
            $no_telp = $request->no_telp;
        } else {
            $no_telp = null;
        }

        $user = User::find($request->id);
        $affectedRows = $user->update(array(
            'username' => $request->username,
            'email' => $request->email,
            'nama' => $request->nama,
            'kode_tim' => $request->kode_tim,
            'nama_tim' => $request->nama_tim,
            'email' => $email,
            'jenis_kelamin' => $jenis_kelamin,
            'no_telp' => $no_telp,
        ));

        $user->assignRole($request->role);

        if ($affectedRows) {
            return redirect()->back()->with('success', 'User berhasil diedit.');
        } else {
            return redirect()->back()->with('error', 'User gagal diedit.');
        }
    }

    public function delete_user(Request $request)
    {
        $valid = $request->validate(
            [
                'id' => ['required'],
            ]
        );

        $affectedRows = User::where('id', $request->id)->delete();

        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'User berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'User gagal dihapus.');
        }
    }
}
