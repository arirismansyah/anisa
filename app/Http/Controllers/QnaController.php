<?php

namespace App\Http\Controllers;

use App\Models\Qna;
use Illuminate\Http\Request;

class QnaController extends Controller
{
    //
    public function add_qna(Request $request)
    {
        $valid = $request->validate([
            'pertanyaan' => ['required'],
            'jawaban' => ['required'],
        ]);

        $qna = Qna::create([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
        ]);

        if ($qna) {
            return redirect()->back()->with('success', 'Q&A berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Q&A
             gagal ditambahkan.');
        }
    }

    public function get_qna_byid(Request $request)
    {
        $valid = $request->validate(
            [
                'id' => ['required'],
            ]
        );

        $qna = Qna::find($request->id);
        return $qna;
    }

    public function edit_qna(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
            'pertanyaan' => ['required'],
            'jawaban' => ['required'],
        ]);

        $affectedRows = Qna::find($request->id)->update(array('pertanyaan' => $request->pertanyaan, 'jawaban' => $request->jawaban));

        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'Q&A berhasil diperbaharui.');
        } else {
            return redirect()->back()->with('error', 'Q&A gagal diperbaharui.');
        }
    }

    public function delete_qna(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
        ]);

        $affectedRows = Qna::find($request->id)->delete();
        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'Q&A berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Q&A gagal dihapus.');
        }
    }
}
