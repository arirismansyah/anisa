<?php

namespace App\Http\Controllers;

use App\Models\Knowledge;
use App\Models\MOutput;
use App\Models\Qna;
use App\Models\Tim;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use \wapmorgan\UnifiedArchive\UnifiedArchive;


class AdminController extends Controller
{
    //
    public function roles()
    {
        $data_roles = Role::paginate(10);
        return view('admin/pages/roles', compact('data_roles'));
    }

    public function teams()
    {
        $data_teams = Tim::paginate(10);
        return view('admin/pages/teams', compact('data_teams'));
    }

    public function users()
    {
        $data_users = User::paginate(10);
        $data_roles = Role::all();
        $data_teams = Tim::all();
        return view('admin/pages/users', compact('data_users', 'data_roles', 'data_teams'));
    }

    public function m_qna()
    {
        $data_qnas = Qna::paginate(10);
        return view('admin/pages/m_qna', compact('data_qnas'));
    }

    public function m_knowledge()
    {
        $data_knowledges = Knowledge::paginate(10);
        return view('admin/pages/m_knowledge', compact('data_knowledges'));
    }

    public function adk()
    {
        return view('admin/pages/adk');
    }

    public function alokasi_output(Request $request)
    {
        if ($request->tahun_anggaran) {
            # code...
            $tahun_anggaran = $request->tahun_anggaran;
        } else {
            # code...
            $tahun_anggaran = date('Y');
        }

        $data_output_belum = MOutput::where('tahun_anggaran', $tahun_anggaran)->whereNull('kode_tim')->get();
        $data_output_sudah = MOutput::where('tahun_anggaran', $tahun_anggaran)->whereNotNull('kode_tim')->get();
        $data_tim = Tim::all();
        
        return view('admin/pages/alokasi_output', compact('tahun_anggaran', 'data_output_belum', 'data_output_sudah', 'data_tim'));
    }

    public function upload_adk(Request $request)
    {
        $valid = $request->validate([
            'tahun_anggaran' => ['required'],
            'file' => ['required'],
        ]);
        $now = new DateTime();
        $file_adk = $request->file('file');
        // dd($file_adk);
        $nama_file = "adk_" . $now->format('YmdHis') . '.rar';
        $file_adk->move('adk_file/raw', $nama_file);
        // $ouput_dir = 'adk_file/extracted/' . $nama_file;

        // $archive = UnifiedArchive::can('adk_file/raw/' . $nama_file);



        if ($file_adk) {
            return redirect()->back()->with('success', 'Upload ADK berhasil.');
        } else {
            return redirect()->back()->with('error', 'Upload ADK gagal.');
        }
    }

    
}
