<?php

namespace App\Http\Controllers;

use App\Models\BelanjaKontraktual;
use DateTime;
use Illuminate\Http\Request;

class BelanjaKontraktualController extends Controller
{
    //
    public function add_belanja_kontraktual(Request $request)
    {
        $valid = $request->validate([
            'tahun_anggaran' => ['required'],
            'tgl_kontrak' => ['required'],
            'tgl_daftar' => ['required'],
        ]);

        $tgl_kontrak = new DateTime($request->tgl_kontrak);
        $tgl_daftar = new DateTime($request->tgl_daftar);

        $week_day_diff = 0;

        while ($tgl_kontrak <= $tgl_daftar) {
            // find out the day for timestamp and increase particular day
            $timestamp = strtotime($tgl_kontrak->format('d-m-Y'));
            $weekDay = date('l', $timestamp);
            if ($weekDay != 'Saturday' && $weekDay != 'Sunday') {
                $week_day_diff = $week_day_diff + 1;
            }

            $tgl_kontrak->modify('+1 day');
        }

        if ($week_day_diff > 5) {
            $nilai_kepatuhan = 0;
        } else {
            $nilai_kepatuhan = 40;
        }

        $nilai_pra = 30;
        $nilai_akselerasi = 30;

        $ikpa = ($nilai_kepatuhan + $nilai_pra + $nilai_akselerasi);

        $affectedRows = BelanjaKontraktual::create([
            'tahun_anggaran' => $request->tahun_anggaran,
            'tgl_kontrak' => $tgl_kontrak,
            'tgl_daftar' => $tgl_daftar,
            'nilai_kepatuhan' => $nilai_kepatuhan,
            'nilai_pra' => $nilai_pra,
            'nilai_akselerasi' => $nilai_akselerasi,
            'ikpa' => $ikpa,
        ]);

        (new IkpaSatkerController)->generate_ikpa($request->tahun_anggaran);

        if ($affectedRows) {
            return redirect()->back()->with('success', 'Belanja kontraktual berhasil diperbaharui.');
        } else {
            return redirect()->back()->with('error', 'Belanja kontraktual gagal diperbaharui.');
        }
    }

    public function delete_belanja_kontraktual(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required']
        ]);

        $affectedRows = BelanjaKontraktual::where('id', $request->id)->delete();

        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'Belanja Kontraktual berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Belanja Kontraktual gagal dihapus.');
        }
    }

    public function get_belanja_kontraktual_byid(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
        ]);
        $belanja = BelanjaKontraktual::find($request->id);
        return $belanja;
    }

    public function add_warning_belanja_kontraktual(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
            'warning' => ['required'],
            'warning_desc' => ['required'],
        ]);

        $belanja = BelanjaKontraktual::find($request->id);
        if ($belanja) {
            # code...
            $affectedRows = $belanja->update(array(
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
