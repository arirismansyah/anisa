<?php

namespace App\Http\Controllers;

use App\Models\DispensasiSpm;
use Illuminate\Http\Request;

class DispensasiSpmController extends Controller
{
    //
    public function input_spm(Request $request)
    {
        $valid = $request->validate([
            'tahun_anggaran' => ['required'],
            'jumlah_spm_dispensasi' => ['required'],
            'jumlah_spm' => ['required'],
        ]);

        $spm = DispensasiSpm::where('tahun_anggaran', $request->tahun_anggaran)->get()->first();
        $nilai_permil = ($request->jumlah_spm_dispensasi / $request->jumlah_spm) * 1000;

        if ($nilai_permil <= 0) {
            $ikpa = 100;
        } elseif ($nilai_permil >= 0.01 && $nilai_permil <= 0.099) {
            $ikpa = 95;
        } elseif ($nilai_permil >= 0.1 && $nilai_permil <= 0.99) {
            $ikpa = 90;
        } elseif ($nilai_permil >= 1 && $nilai_permil <= 4.99) {
            $ikpa = 85;
        } else {
            $ikpa = 80;
        }


        if ($spm) {
            # code...
            $affectedRows = $spm->update(array(
                'tahun_anggaran' => $request->tahun_anggaran,
                'jumlah_spm_dispensasi' => $request->jumlah_spm_dispensasi,
                'jumlah_spm' => $request->jumlah_spm,
                'nilai_permil' => $nilai_permil,
                'ikpa' => $ikpa,
            ));
        } else {
            # code...
            $affectedRows = DispensasiSpm::create([
                'tahun_anggaran' => $request->tahun_anggaran,
                'jumlah_spm_dispensasi' => $request->jumlah_spm_dispensasi,
                'jumlah_spm' => $request->jumlah_spm,
                'nilai_permil' => $nilai_permil,
                'ikpa' => $ikpa,
            ]);
        }

        (new IkpaSatkerController)->generate_ikpa($request->tahun_anggaran);

        if ($affectedRows) {
            return redirect()->back()->with('success', 'Dispensasi SPM berhasil diperbaharui.');
        } else {
            return redirect()->back()->with('error', 'Dispensasi SPM gagal diperbaharui.');
        }
    }


    public function delete_spm(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required']
        ]);

        $affectedRows = DispensasiSpm::where('id', $request->id)->delete();

        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'Dispensasi SPM berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Dispensasi SPM gagal dihapus.');
        }
    }

    public function get_spm_byid(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
        ]);
        $spm = DispensasiSpm::find($request->id);
        return $spm;
    }

    public function add_warning_spm(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
            'warning' => ['required'],
            'warning_desc' => ['required'],
        ]);

        $spm = DispensasiSpm::find($request->id);
        if ($spm) {
            # code...
            $affectedRows = $spm->update(array(
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
