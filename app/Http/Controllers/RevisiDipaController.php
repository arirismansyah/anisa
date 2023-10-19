<?php

namespace App\Http\Controllers;

use App\Models\RevisiDipa;
use Illuminate\Http\Request;

class RevisiDipaController extends Controller
{
    //
    public function input_revisi_dipa(Request $request)
    {
        $valid = $request->validate([
            'tahun_anggaran' => ['required'],

            'rev_jan' => ['required'],
            'rev_feb' => ['required'],
            'rev_mar' => ['required'],
            'rev_apr' => ['required'],
            'rev_may' => ['required'],
            'rev_jun' => ['required'],

            'rev_jul' => ['required'],
            'rev_aug' => ['required'],
            'rev_sep' => ['required'],
            'rev_oct' => ['required'],
            'rev_nov' => ['required'],
            'rev_dec' => ['required'],

        ]);

        $rev = RevisiDipa::select()->where('tahun_anggaran', $request->tahun_anggaran)->first();

        if ($rev) {
            $rev_tw_1 = $request->rev_jan + $request->rev_feb + $request->rev_mar;
            $rev_tw_2 = $request->rev_apr + $request->rev_may + $request->rev_jun;
            $rev_tw_3 = $request->rev_jul + $request->rev_aug + $request->rev_sep;
            $rev_tw_4 = $request->rev_oct + $request->rev_nov + $request->rev_dec;

            if ($rev_tw_1 > 0) {
                $rrev_tw_1 = 100 * (1 / $rev_tw_1);
            } else {
                $rrev_tw_1 = 100;
            }

            if ($rev_tw_2 > 0) {
                $rrev_tw_2 = 100 * (1 / $rev_tw_2);
            } else {
                $rrev_tw_2 = 100;
            }

            if ($rev_tw_3 > 0) {
                $rrev_tw_3 = 100 * (1 / $rev_tw_3);
            } else {
                $rrev_tw_3 = 100;
            }

            if ($rev_tw_4 > 0) {
                $rrev_tw_4 = 100 * (1 / $rev_tw_4);
            } else {
                $rrev_tw_4 = 100;
            }

            $ikpa = ($rrev_tw_1 + $rrev_tw_2 + $rrev_tw_3 + $rrev_tw_4) / 4;

            $affectedRows = $rev->update(array(
                'tahun_anggaran' => $request->tahun_anggaran,

                'rev_jan' => $request->rev_jan,
                'rev_feb' => $request->rev_feb,
                'rev_mar' => $request->rev_mar,
                'rev_apr' => $request->rev_apr,
                'rev_may' => $request->rev_may,
                'rev_jun' => $request->rev_jun,

                'rev_jul' => $request->rev_jul,
                'rev_aug' => $request->rev_aug,
                'rev_sep' => $request->rev_sep,
                'rev_oct' => $request->rev_oct,
                'rev_nov' => $request->rev_nov,
                'rev_dec' => $request->rev_dec,

                'rev_tw_1' => $rrev_tw_1,
                'rev_tw_2' => $rrev_tw_2,
                'rev_tw_3' => $rrev_tw_3,
                'rev_tw_4' => $rrev_tw_4,

                'ikpa' => $ikpa
            ));
        } else {
            $rev_tw_1 = $request->rev_jan + $request->rev_feb + $request->rev_mar;
            $rev_tw_2 = $request->rev_apr + $request->rev_may + $request->rev_jun;
            $rev_tw_3 = $request->rev_jul + $request->rev_aug + $request->rev_sep;
            $rev_tw_4 = $request->rev_oct + $request->rev_nov + $request->rev_dec;

            if ($rev_tw_1 > 0) {
                $rrev_tw_1 = 100 * (1 / $rev_tw_1);
            } else {
                $rrev_tw_1 = 100;
            }

            if ($rev_tw_2 > 0) {
                $rrev_tw_2 = 100 * (1 / $rev_tw_2);
            } else {
                $rrev_tw_2 = 100;
            }

            if ($rev_tw_3 > 0) {
                $rrev_tw_3 = 100 * (1 / $rev_tw_3);
            } else {
                $rrev_tw_3 = 100;
            }

            if ($rev_tw_4 > 0) {
                $rrev_tw_4 = 100 * (1 / $rev_tw_4);
            } else {
                $rrev_tw_4 = 100;
            }

            $ikpa = ($rrev_tw_1 + $rrev_tw_2 + $rrev_tw_3 + $rrev_tw_4) / 4;

            $affectedRows = RevisiDipa::create([
                'tahun_anggaran' => $request->tahun_anggaran,

                'rev_jan' => $request->rev_jan,
                'rev_feb' => $request->rev_feb,
                'rev_mar' => $request->rev_mar,
                'rev_apr' => $request->rev_apr,
                'rev_may' => $request->rev_may,
                'rev_jun' => $request->rev_jun,

                'rev_jul' => $request->rev_jul,
                'rev_aug' => $request->rev_aug,
                'rev_sep' => $request->rev_sep,
                'rev_oct' => $request->rev_oct,
                'rev_nov' => $request->rev_nov,
                'rev_dec' => $request->rev_dec,

                'rev_tw_1' => $rrev_tw_1,
                'rev_tw_2' => $rrev_tw_2,
                'rev_tw_3' => $rrev_tw_3,
                'rev_tw_4' => $rrev_tw_4,

                'ikpa' => $ikpa
            ]);
        }

        (new IkpaSatkerController)->generate_ikpa($request->tahun_anggaran);

        if ($affectedRows) {
            return redirect()->back()->with('success', 'Revisi DIPA berhasil diperbaharui.');
        } else {
            return redirect()->back()->with('error', 'Revisi DIPA gagal diperbaharui.');
        }
    }

    public function get_revisi_dipa_bytahun(Request $request)
    {
        $valid = $request->validate([
            'tahun_anggaran' => ['required'],
        ]);
        $rev = RevisiDipa::select()->where('tahun_anggaran', $request->tahun_anggaran)->first();
        return $rev;
    }

    public function get_revisi_dipa_byid(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
        ]);
        $rev = RevisiDipa::find($request->id);
        return $rev;
    }

    public function delete_revisi_dipa(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required']
        ]);

        $affectedRows = RevisiDipa::where('id', $request->id)->delete();

        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'Revisi DIPA berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Revisi DIPA gagal dihapus.');
        }
    }

    public function add_warning_revisi_dipa(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
            'warning' => ['required'],
            'warning_desc' => ['required'],
        ]);

        $rev = RevisiDipa::find($request->id);
        if ($rev) {
            # code...
            $affectedRows = $rev->update(array(
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
