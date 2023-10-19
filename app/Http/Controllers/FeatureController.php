<?php

namespace App\Http\Controllers;

use App\Models\BelanjaKontraktual;
use App\Models\CapaianOutput;
use App\Models\DeviasiTigaDipa;
use App\Models\DispensasiSpm;
use App\Models\IkpaSatker;
use App\Models\Knowledge;
use App\Models\MOutput;
use App\Models\PenyerapanAnggaran;
use App\Models\Qna;
use App\Models\RevisiDipa;
use App\Models\Tagihan;
use App\Models\UpTup;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeatureController extends Controller
{
    //

    public function home(Request $request)
    {
        $user = Auth::user();
        $roles = $user->roles->pluck('name')->toArray();
        if ($request->tahun_anggaran) {
            $tahun_anggaran = $request->tahun_anggaran;
            # code...
        } else {
            $tahun_anggaran = date('Y');
        }


        $data_ikpa_satker = IkpaSatker::where('tahun_anggaran', $tahun_anggaran)->get();
        // dd($data_ikpa_satker);

        if (in_array('Admin', $roles)) {
            # code...
            return view('admin/pages/home', compact('data_ikpa_satker', 'tahun_anggaran'));
        } else {
            return view('user/pages/home', compact('data_ikpa_satker', 'tahun_anggaran'));
        }
    }
    public function revisi_dipa()
    {
        $user = Auth::user();
        $roles = $user->roles->pluck('name')->toArray();
        $data_revisi = RevisiDipa::paginate(10);

        if (in_array('Admin', $roles)) {
            # code...
            return view('admin/pages/input_komponen/umum/revisi_dipa', compact('data_revisi'));
        } else {
            return view('auserdmin/pages/input_komponen/umum/revisi_dipa', compact('data_revisi'));
        }
    }

    public function belanja_kontraktual()
    {
        $user = Auth::user();
        $roles = $user->roles->pluck('name')->toArray();
        $data_belanja = BelanjaKontraktual::paginate(10);
        if (in_array('Admin', $roles)) {
            # code...
            return view('admin/pages/input_komponen/umum/belanja_kontraktual', compact('data_belanja'));
        } else {
            # code...
            return view('user/pages/input_komponen/umum/belanja_kontraktual', compact('data_belanja'));
        }
    }

    public function tagihan()
    {
        $user = Auth::user();
        $roles = $user->roles->pluck('name')->toArray();
        $data_tagihan = Tagihan::paginate(10);
        if (in_array('Admin', $roles)) {
            # code...
            return view('admin/pages/input_komponen/umum/tagihan', compact('data_tagihan'));
        } else {
            # code...
            return view('user/pages/input_komponen/umum/tagihan', compact('data_tagihan'));
        }
    }

    public function uptup()
    {
        $user = Auth::user();
        $roles = $user->roles->pluck('name')->toArray();
        $data_uptup = UpTup::paginate(10);
        if (in_array('Admin', $roles)) {
            # code...
            return view('admin/pages/input_komponen/umum/uptup', compact('data_uptup'));
        } else {
            # code...
            return view('user/pages/input_komponen/umum/uptup', compact('data_uptup'));
        }
    }

    public function spm()
    {
        $user = Auth::user();
        $roles = $user->roles->pluck('name')->toArray();
        $data_spm = DispensasiSpm::paginate(10);
        if (in_array('Admin', $roles)) {
            # code...
            return view('admin/pages/input_komponen/umum/spm', compact('data_spm'));
        } else {
            # code...
            return view('user/pages/input_komponen/umum/spm', compact('data_spm'));
        }
    }

    public function deviasi_tiga_dipa()
    {
        $user = Auth::user();
        $roles = $user->roles->pluck('name')->toArray();
        $data_deviasi = DeviasiTigaDipa::paginate(10);
        if (in_array('Admin', $roles)) {
            # code...
            return view('admin/pages/input_komponen/tim/deviasi_tiga_dipa', compact('data_deviasi'));
        } else {
            # code...
            return view('user/pages/input_komponen/tim/deviasi_tiga_dipa', compact('data_deviasi'));
        }
    }

    public function penyerapan_anggaran()
    {
        $user = Auth::user();
        $data_penyerapan = PenyerapanAnggaran::paginate(10);
        $roles = $user->roles->pluck('name')->toArray();
        if (in_array('Admin', $roles)) {
            # code...
            return view('admin/pages/input_komponen/tim/penyerapan_anggaran', compact('data_penyerapan'));
        } else {
            # code...
            return view('user/pages/input_komponen/tim/penyerapan_anggaran', compact('data_penyerapan'));
        }
    }

    public function capaian_output()
    {
        $user = Auth::user();
        $data_coutput = CapaianOutput::paginate(10);
        $m_output = MOutput::all();
        $roles = $user->roles->pluck('name')->toArray();
        if (in_array('Admin', $roles)) {
            # code...
            return view('admin/pages/input_komponen/tim/capaian_output', compact('data_coutput', 'm_output'));
        } else {
            # code...
            return view('user/pages/input_komponen/tim/capaian_output', compact('data_coutput', 'm_output'));
        }
    }

    public function knowledges()
    {
        $user = Auth::user();
        $data_knowledge = Knowledge::paginate(10);
        $roles = $user->roles->pluck('name')->toArray();
        if (in_array('Admin', $roles)) {
            # code...
            return view('admin/pages/knowledges', compact('data_knowledge'));
        } else {
            # code...
            return view('user/pages/knowledges', compact('data_knowledge'));
        }
    }

    public function faq()
    {
        $user = Auth::user();
        $data_faq = Qna::paginate(10);
        $roles = $user->roles->pluck('name')->toArray();
        if (in_array('Admin', $roles)) {
            # code...
            return view('admin/pages/faq', compact('data_faq'));
        } else {
            # code...
            return view('user/pages/faq', compact('data_faq'));
        }
    }
}
