<?php

namespace App\Http\Controllers;

use App\Models\Tim;
use Illuminate\Http\Request;

class TimController extends Controller
{
    //
    public function add_team(Request $request)
    {
        $valid = $request->validate([
            'kode_tim' => ['required'],
            'nama_tim' => ['required'],
        ]);

        $role = Tim::create([
            'kode_tim' => $request->kode_tim,
            'nama_tim' => $request->nama_tim,
        ]);

        if ($role) {
            return redirect()->back()->with('success', 'Tim kerja berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Tim kerja gagal ditambahkan.');
        }
    }

    public function edit_team(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
            'kode_tim' => ['required'],
            'nama_tim' => ['required'],
        ]);

        $affectedRows = Tim::find($request->id)->update(array('kode_tim' => $request->kode_tim, 'nama_tim' => $request->nama_tim));

        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'Tim kerja berhasil diperbaharui.');
        } else {
            return redirect()->back()->with('error', 'Tim kerja gagal diperbaharui.');
        }
    }

    public function delete_team(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
        ]);

        $affectedRows = Tim::find($request->id)->delete();
        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'Tim kerja berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Tim kerja gagal dihapus.');
        }
    }
}
