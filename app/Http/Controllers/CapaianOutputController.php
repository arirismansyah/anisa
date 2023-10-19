<?php

namespace App\Http\Controllers;

use App\Models\CapaianOutput;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CapaianOutputController extends Controller
{
    //
    public function input_coutput(Request $request)
    {
        $valid = $request->validate([
            'tahun_anggaran' => ['required'],
            'bulan' => ['required'],
            'tanggal_entri' => ['required'],
            'kd_program' => ['required'],
            'kd_kegiatan' => ['required'],
            'kd_output' => ['required'],
            'kd_suboutput' => ['required'],
            'uraian_output' => ['required'],
            'target_pcro' => ['required'],
            'penambahan_pcro' => ['required'],
            'target_rvro' => ['required'],
            'penambahan_rvro' => ['required'],

        ]);

        $batas_tanggal = new DateTime('5-' . ($request->bulan + 1) . '-' . $request->tahun_anggaran);
        $tanggal_entri = new DateTime($request->tanggal_entri);

        if ($tanggal_entri <= $batas_tanggal) {
            # code...
            $nilai_kepatuhan = 100;
        } else {
            $nilai_kepatuhan = 0;
        }

        if ($request->penambahan_pcro >= $request->target_pcro) {
            # code...
            $nilai_capaian = 100;
        } else {
            # code...
            $nilai_capaian = 100 * ($request->penambahan_pcro / $request->target_pcro);
        }

        $ikpa = (0.7 * ($nilai_capaian)) + (0.3 * ($nilai_kepatuhan));

        $user = Auth::user();

        # code...
        $affectedRows = CapaianOutput::create([
            'tahun_anggaran' => $request->tahun_anggaran,
            'bulan' => $request->bulan,
            'tanggal_entri' => $tanggal_entri,
            'kd_program' => $request->kd_program,
            'kd_kegiatan' => $request->kd_kegiatan,
            'kd_output' => $request->kd_output,
            'kd_suboutput' => $request->kd_suboutput,
            'uraian_output' => $request->uraian_output,
            'target_pcro' => $request->target_pcro,
            'penambahan_pcro' => $request->penambahan_pcro,
            'target_rvro' => $request->target_rvro,
            'penambahan_rvro' => $request->penambahan_rvro,
            'nilai_kepatuhan' => $nilai_kepatuhan,
            'nilai_capaian' => $nilai_capaian,
            'username' => $user->username,
            'nama_tim' => $user->nama_tim,
            'kode_tim' => $user->kode_tim,
            'ikpa' => $ikpa,
        ]);

        (new IkpaSatkerController)->generate_ikpa($request->tahun_anggaran);

        if ($affectedRows) {
            return redirect()->back()->with('success', 'Capaian Output berhasil diperbaharui.');
        } else {
            return redirect()->back()->with('error', 'Capaian Output gagal diperbaharui.');
        }
    }

    public function delete_coutput(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required']
        ]);

        $affectedRows = CapaianOutput::where('id', $request->id)->delete();

        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'CapaianOutput berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'CapaianOutput gagal dihapus.');
        }
    }

    public function get_coutput_byid(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
        ]);
        $coutput = CapaianOutput::find($request->id);
        return $coutput;
    }

    public function add_warning_coutput(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
            'warning' => ['required'],
            'warning_desc' => ['required'],
        ]);

        $coutput = CapaianOutput::find($request->id);
        if ($coutput) {
            # code...
            $affectedRows = $coutput->update(array(
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
