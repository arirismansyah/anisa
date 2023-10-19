<?php

namespace App\Http\Controllers;

use App\Models\MOutput;
use Illuminate\Http\Request;

class MOutputController extends Controller
{
    //
    public function alokasi_output_totim(Request $request){
        $valid = $request->validate([
            'id'=>['required'],
            'kode_tim'=>['required'],
            'nama_tim'=>['required'],
        ]);

        $output = MOutput::find($request->id);
        // dd($output);
        if ($output) {
            # code...
            $affectedRows = $output->update(array(
                'kode_tim'=>$request->kode_tim,
                'nama_tim'=>$request->nama_tim,
            ));
        } else {
            $affectedRows = 0;
        }

        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'Output berhasil dialokasikan.');
        } else {
            return redirect()->back()->with('error', 'Output gagal dialokasikan.');
        }
    }
}
