<?php

namespace App\Http\Controllers;

use App\Models\DeviasiTigaDipa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeviasiTigaDipaController extends Controller
{
    //
    public function input_deviasi(Request $request)
    {
        $valid = $request->validate([
            'tahun_anggaran' => ['required'],
            'bulan' => ['required'],
            'rencana_anggaran' => ['required'],
            'penyerapan_anggaran' => ['required'],
            'persen_deviasi_sebelumnya' => ['required'],
        ]);

        $persen_deviasi = 100 * (($request->rencana_anggaran - $request->penyerapan_anggaran) / $request->rencana_anggaran);

        if ($request->bulan == 1) {
            # code...
            $ikpa = 100 - $persen_deviasi;
        } else {
            # code...
            $ikpa = 100 - ($persen_deviasi + $request->persen_deviasi_sebelumnya) / 2;
        }

        $user = Auth::user();

        $deviasi = DeviasiTigaDipa::where('tahun_anggaran', $request->tahun_anggaran)->where('bulan', $request->bulan)->where('kode_tim', $user->kode_tim)->get()->first();

        if ($deviasi) {
            # code...
            $affectedRows = $deviasi->update(array(
                'tahun_anggaran' => $request->tahun_anggaran,
                'bulan' => $request->bulan,
                'rencana_anggaran' => $request->rencana_anggaran,
                'penyerapan_anggaran' => $request->penyerapan_anggaran,
                'persen_deviasi_sebelumnya' => $request->persen_deviasi_sebelumnya,
                'persen_deviasi' => $persen_deviasi,
                'username' => $user->username,
                'kode_tim' => $user->kode_tim,
                'nama_tim' => $user->nama_tim,
                'ikpa' => $ikpa,
            ));
        } else {
            # code...
            $affectedRows = DeviasiTigaDipa::create([
                'tahun_anggaran' => $request->tahun_anggaran,
                'bulan' => $request->bulan,
                'rencana_anggaran' => $request->rencana_anggaran,
                'penyerapan_anggaran' => $request->penyerapan_anggaran,
                'persen_deviasi_sebelumnya' => $request->persen_deviasi_sebelumnya,
                'persen_deviasi' => $persen_deviasi,
                'username' => $user->username,
                'kode_tim' => $user->kode_tim,
                'nama_tim' => $user->nama_tim,
                'ikpa' => $ikpa,
            ]);
        }

        (new IkpaSatkerController)->generate_ikpa($request->tahun_anggaran);

        if ($affectedRows) {
            return redirect()->back()->with('success', 'Deviasi Halaman III DIPA berhasil diperbaharui.');
        } else {
            return redirect()->back()->with('error', 'Deviasi Halaman III DIPA gagal diperbaharui.');
        }
    }


    public function delete_deviasi(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required']
        ]);

        $affectedRows = DeviasiTigaDipa::where('id', $request->id)->delete();

        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'Deviasi Halaman III DIPA berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Deviasi Halaman III DIPA gagal dihapus.');
        }
    }

    public function get_deviasi_byid(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
        ]);
        $deviasi = DeviasiTigaDipa::find($request->id);
        return $deviasi;
    }

    public function add_warning_deviasi(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
            'warning' => ['required'],
            'warning_desc' => ['required'],
        ]);

        $deviasi = DeviasiTigaDipa::find($request->id);
        if ($deviasi) {
            # code...
            $affectedRows = $deviasi->update(array(
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
