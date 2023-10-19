<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MOutputController extends Controller
{
    //
    public function alokasi_output(Request $request)
    {
        $valid = $request->validate([
            'kode_tim' => ['required'],
            'nama_tim' => ['required'],
        ]);
    }
}
