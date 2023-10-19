<?php

namespace App\Http\Controllers;

use App\Models\PenyerapanAnggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenyerapanAnggaranController extends Controller
{
    //
    public function input_penyerapan(Request $request)
    {
        $valid = $request->validate([
            'tahun_anggaran' => ['required'],
            'bulan' => ['required'],
            'pagu' => ['required'],
            'blokir' => ['required'],
            'nominal_target' => ['required'],
            'nominal_penyerapan' => ['required'],
        ]);

        $pagu_netto = $request->pagu - $request->blokir;
        $persentase_penyerapan = 100 * ($request->nominal_penyerapan / $request->nominal_target);
        $user = Auth::user();

        if ($request->bulan > 1) {
            # code...
            $sum_persen_penyerapan = $persentase_penyerapan;
            for ($i = 1; $i < $request->bulan; $i++) {
                # code...
                $penyerapan_0 = PenyerapanAnggaran::where('tahun_anggaran', $request->tahun_anggaran)->where('bulan', $request->bulan)->where('kode_tim', $user->kode_tim)->first();

                if ($penyerapan_0) {
                    # code...
                    $sum_persen_penyerapan = $sum_persen_penyerapan + $penyerapan_0->persentase_penyerapan;
                }
            }

            $ikpa = $sum_persen_penyerapan / $request->bulan;
        } else {
            $ikpa = $persentase_penyerapan;
        }

        $penyerapan = PenyerapanAnggaran::where('tahun_anggaran', $request->tahun_anggaran)->where('bulan', $request->bulan)->where('kode_tim', $user->kode_tim)->get()->first();

        if ($penyerapan) {
            # code...
            $affectedRows = $penyerapan->update(array(
                'tahun_anggaran' => $request->tahun_anggaran,
                'bulan' => $request->bulan,
                'pagu' => $request->pagu,
                'blokir' => $request->blokir,
                'pagu_netto' => $pagu_netto,
                'nominal_target' => $request->nominal_target,
                'nominal_penyerapan' => $request->nominal_penyerapan,
                'persentase_penyerapan' => $persentase_penyerapan,
                'username' => $user->username,
                'kode_tim' => $user->kode_tim,
                'nama_tim' => $user->nama_tim,
                'ikpa' => $ikpa,
            ));
        } else {
            # code...
            $affectedRows = PenyerapanAnggaran::create([
                'tahun_anggaran' => $request->tahun_anggaran,
                'bulan' => $request->bulan,
                'pagu' => $request->pagu,
                'blokir' => $request->blokir,
                'pagu_netto' => $pagu_netto,
                'nominal_target' => $request->nominal_target,
                'nominal_penyerapan' => $request->nominal_penyerapan,
                'persentase_penyerapan' => $persentase_penyerapan,
                'username' => $user->username,
                'kode_tim' => $user->kode_tim,
                'nama_tim' => $user->nama_tim,
                'ikpa' => $ikpa,
            ]);
        }

        (new IkpaSatkerController)->generate_ikpa($request->tahun_anggaran);
        
        if ($affectedRows) {
            return redirect()->back()->with('success', 'Penyerapan anggaran berhasil diperbaharui.');
        } else {
            return redirect()->back()->with('error', 'Penyerapan anggaran gagal diperbaharui.');
        }
    }

    public function delete_penyerapan(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required']
        ]);

        $affectedRows = PenyerapanAnggaran::where('id', $request->id)->delete();

        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'Penyerapan Anggaran berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Penyerapan Anggaran gagal dihapus.');
        }
    }

    public function get_penyerapan_byid(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
        ]);
        $penyerapan = PenyerapanAnggaran::find($request->id);
        return $penyerapan;
    }

    public function add_warning_penyerapan(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
            'warning' => ['required'],
            'warning_desc' => ['required'],
        ]);

        $penyerapan = PenyerapanAnggaran::find($request->id);
        if ($penyerapan) {
            # code...
            $affectedRows = $penyerapan->update(array(
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
