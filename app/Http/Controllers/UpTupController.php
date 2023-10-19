<?php

namespace App\Http\Controllers;

use App\Models\UpTup;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class UpTupController extends Controller
{
    //
    public function input_uptup(Request $request)
    {
        $valid = $request->validate([
            'tahun_anggaran' => ['required'],
            'bulan' => ['required'],
            'jml_gup_tepat_waktu' => ['required'],
            'jml_gup' => ['required'],
            'jml_ptup_tepat_waktu' => ['required'],
            'jml_ptup' => ['required'],
            'persentase_gup' => ['required'],
            'tgl_gup' => ['required'],
            'tgl_gup_sebelumnya' => ['required'],
            'persentase_tup' => ['required'],
            'pinalti_nilai' => ['required'],
        ]);

        $uptup = UpTup::where('tahun_anggaran', $request->tahun_anggaran)->where('bulan', $request->bulan)->get()->first();
        $nilai_kepatuhan = (100 * (($request->jml_gup_tepat_waktu + $request->jml_ptup_tepat_waktu) / ($request->jml_gup + $request->jml_ptup))) - $request->pinalti_nilai;

        $tgl_gup = new DateTime($request->tgl_gup);
        $tgl_gup_sebelumnya = new DateTime($request->tgl_gup_sebelumnya);
        $day_gup_diff = (int)$tgl_gup->diff($tgl_gup_sebelumnya)->format('%a');
        $day_gum_m = cal_days_in_month(CAL_GREGORIAN, $tgl_gup_sebelumnya->format('m'), $tgl_gup_sebelumnya->format('Y'));


        $nilai_gup = $request->persentase_gup * ($day_gum_m / $day_gup_diff);

        $nilai_setoran = (100 - $request->persentase_tup);

        $ikpa = (0.5 * $nilai_kepatuhan) + (0.25 * $nilai_gup) + (0.25 * $nilai_setoran);

        if ($uptup) {
            # code...
            $affectedRows = $uptup->update(array(
                'tahun_anggaran' => $request->tahun_anggaran,
                'bulan' => $request->bulan,
                'jml_gup_tepat_waktu' => $request->jml_gup_tepat_waktu,
                'jml_gup' => $request->jml_gup,
                'jml_ptup_tepat_waktu' => $request->jml_ptup_tepat_waktu,
                'jml_ptup' => $request->jml_ptup,
                'persentase_gup' => $request->persentase_gup,
                'tgl_gup' => $tgl_gup,
                'tgl_gup_sebelumnya' => $tgl_gup_sebelumnya,
                'persentase_tup' => $request->persentase_tup,
                'pinalti_nilai' => $request->pinalti_nilai,
                'ikpa' => $ikpa
            ));
        } else {
            # code...
            $affectedRows = UpTup::create([
                'tahun_anggaran' => $request->tahun_anggaran,
                'bulan' => $request->bulan,
                'jml_gup_tepat_waktu' => $request->jml_gup_tepat_waktu,
                'jml_gup' => $request->jml_gup,
                'jml_ptup_tepat_waktu' => $request->jml_ptup_tepat_waktu,
                'jml_ptup' => $request->jml_ptup,
                'persentase_gup' => $request->persentase_gup,
                'tgl_gup' => $tgl_gup,
                'tgl_gup_sebelumnya' => $tgl_gup_sebelumnya,
                'persentase_tup' => $request->persentase_tup,
                'pinalti_nilai' => $request->pinalti_nilai,
                'ikpa' => $ikpa
            ]);
        }

        (new IkpaSatkerController)->generate_ikpa($request->tahun_anggaran);

        if ($affectedRows) {
            return redirect()->back()->with('success', 'Penyelesaian Tagihan berhasil diperbaharui.');
        } else {
            return redirect()->back()->with('error', 'Penyelesaian Tagihan gagal diperbaharui.');
        }
    }

    public function delete_uptup(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required']
        ]);

        $affectedRows = UpTup::where('id', $request->id)->delete();

        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'Pengelolaan UP/TUP berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Pengelolaan UP/TUP gagal dihapus.');
        }
    }

    public function get_uptup_byid(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
        ]);
        $uptup = UpTup::find($request->id);
        return $uptup;
    }

    public function add_warning_uptup(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
            'warning' => ['required'],
            'warning_desc' => ['required'],
        ]);

        $uptup = UpTup::find($request->id);
        if ($uptup) {
            # code...
            $affectedRows = $uptup->update(array(
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
