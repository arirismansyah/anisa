<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    //
    public function input_tagihan(Request $request)
    {
        $valid = $request->validate([
            'tahun_anggaran' => ['required'],
            'bulan' => ['required'],
            'jml_ls_kontraktual_tepat_waktu' => ['required'],
            'jml_ls_kontraktual' => ['required'],
        ]);

        $tagihan = Tagihan::where('tahun_anggaran', $request->tahun_anggaran)->where('bulan', $request->bulan)->get()->first();

        $ikpa = 100 * ($request->jml_ls_kontraktual_tepat_waktu / $request->jml_ls_kontraktual);

        if ($tagihan) {
            # code...
            $affectedRows = $tagihan->update(array(
                'tahun_anggaran' => $request->tahun_anggaran,
                'bulan' => $request->bulan,
                'jml_ls_kontraktual_tepat_waktu' => $request->jml_ls_kontraktual_tepat_waktu,
                'jml_ls_kontraktual' => $request->jml_ls_kontraktual,
                'ikpa' => $ikpa,
            ));
        } else {
            # code...
            $affectedRows = Tagihan::create([
                'tahun_anggaran' => $request->tahun_anggaran,
                'bulan' => $request->bulan,
                'jml_ls_kontraktual_tepat_waktu' => $request->jml_ls_kontraktual_tepat_waktu,
                'jml_ls_kontraktual' => $request->jml_ls_kontraktual,
                'ikpa' => $ikpa,
            ]);
        }

        (new IkpaSatkerController)->generate_ikpa($request->tahun_anggaran);

        if ($affectedRows) {
            return redirect()->back()->with('success', 'Penyelesaian Tagihan berhasil diperbaharui.');
        } else {
            return redirect()->back()->with('error', 'Penyelesaian Tagihan gagal diperbaharui.');
        }
    }

    public function delete_tagihan(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required']
        ]);

        $affectedRows = Tagihan::where('id', $request->id)->delete();

        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'Penyelesaian Tagihan berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Penyelesaian Tagihan gagal dihapus.');
        }
    }

    public function get_tagihan_byid(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
        ]);
        $tagihan = Tagihan::find($request->id);
        return $tagihan;
    }

    public function add_warning_tagihan(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
            'warning' => ['required'],
            'warning_desc' => ['required'],
        ]);

        $tagihan = Tagihan::find($request->id);
        if ($tagihan) {
            # code...
            $affectedRows = $tagihan->update(array(
                'warning' => $request->warning,
                'warning_desc' => $request->warning_desc,
            ));

            if ($affectedRows > 0) {
                return redirect()->back()->with('success', 'Catatan berhasil ditambahkan.');
            } else {
                return redirect()->back()->with('error', 'Catatan gagal ditambahkan.');
            }
        } else {
            # code...
            return redirect()->back()->with('error', 'Catatan gagal ditambahkan.');
        }
    }
}
