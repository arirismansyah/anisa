<?php

namespace App\Http\Controllers;

use App\Models\Knowledge;
use Illuminate\Http\Request;

class KnowledgeController extends Controller
{
    //
    public function add_knowledge(Request $request)
    {
        $valid = $request->validate([
            'judul' => ['required'],
            'deskripsi' => ['required'],
        ]);

        $knowledge = Knowledge::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'lampiran' => $request->lampiran,
        ]);

        if ($knowledge) {
            return redirect()->back()->with('success', 'Knowledge berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Knowledge
             gagal ditambahkan.');
        }
    }

    public function get_knowledge_byid(Request $request)
    {
        $valid = $request->validate(
            [
                'id' => ['required'],
            ]
        );

        $qna = Knowledge::find($request->id);
        return $qna;
    }

    public function edit_knowledge(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
            'judul' => ['required'],
            'deskripsi' => ['required'],

        ]);

        $affectedRows = Knowledge::find($request->id)->update(
            array(
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'lampiran' => $request->lampiran,
            )
        );

        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'Knowledge berhasil diperbaharui.');
        } else {
            return redirect()->back()->with('error', 'Knowledge gagal diperbaharui.');
        }
    }

    public function delete_knowledge(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required'],
        ]);

        $affectedRows = Knowledge::find($request->id)->delete();
        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'Knowledge berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Knowledge gagal dihapus.');
        }
    }
}
