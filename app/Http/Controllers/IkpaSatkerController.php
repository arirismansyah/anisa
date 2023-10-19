<?php

namespace App\Http\Controllers;

use App\Models\BelanjaKontraktual;
use App\Models\CapaianOutput;
use App\Models\DeviasiTigaDipa;
use App\Models\DispensasiSpm;
use App\Models\IkpaSatker;
use App\Models\PenyerapanAnggaran;
use App\Models\RevisiDipa;
use App\Models\Tagihan;
use App\Models\UpTup;
use DateTime;
use Illuminate\Http\Request;

class IkpaSatkerController extends Controller
{
    //
    public function generate_ikpa(int $tahun)
    {
        $revisi_dipa = RevisiDipa::where('tahun_anggaran', $tahun)->get()->first();
        $spm = DispensasiSpm::where('tahun_anggaran', $tahun)->get();



        for ($i = 1; $i <= 12; $i++) {

            // tahun
            if ($revisi_dipa->count() > 0) {
                $nilai_revisi_dipa_bulan = $revisi_dipa->first()->ikpa;
            } else {
                $nilai_revisi_dipa_bulan = 0;
            }

            // tahun
            if ($spm->count() > 0) {
                $nilai_spm_bulan = $spm->first()->ikpa;
            } else {
                $nilai_spm_bulan = 0;
            }

            // bulan
            $belanja_kontraktual = BelanjaKontraktual::where('tahun_anggaran', $tahun)->whereMonth('tgl_kontrak', $i)->get(); //bulan
            if ($belanja_kontraktual->count() > 0) {
                # code...
                $nilai_belanja_kontraktual_bulan = $belanja_kontraktual->avg('ikpa');
            } else {
                $nilai_belanja_kontraktual_bulan = 100;
            }

            $penyelesaian_tagihan_bulan = Tagihan::where('tahun_anggaran', $tahun)->where('bulan', $i)->get(); //bulan
            if ($penyelesaian_tagihan_bulan->count() > 0) {
                $nilai_penyelesaian_tagihan_bulan = $penyelesaian_tagihan_bulan->avg('ikpa');
            } else {
                # code...
                $nilai_penyelesaian_tagihan_bulan = 0;
            }

            $uptup_bulan = UpTup::where('tahun_anggaran', $tahun)->where('bulan', $i)->get(); //bulan
            if ($uptup_bulan->count() > 0) {
                $nilai_uptup_bulan = $uptup_bulan->avg('ikpa');
            } else {
                # code...
                $nilai_uptup_bulan = 0;
            }

            $deviasi_bulan = DeviasiTigaDipa::where('tahun_anggaran', $tahun)->where('bulan', $i)->get(); //bulan
            if ($deviasi_bulan->count() > 0) {
                $nilai_deviasi_bulan = $deviasi_bulan->avg('ikpa');
                # code...
            } else {
                # code...
                $nilai_deviasi_bulan = 0;
            }

            $penyerapan_bulan = PenyerapanAnggaran::where('tahun_anggaran', $tahun)->where('bulan', $i)->get(); //bulan
            if ($penyerapan_bulan->count() > 0) {
                # code...
                $nilai_penyerapan_bulan = $penyerapan_bulan->avg('ikpa');
            } else {
                # code...
                $nilai_penyerapan_bulan = 0;
            }

            $coutput_bulan = CapaianOutput::where('tahun_anggaran', $tahun)->where('bulan', $i)->get(); //bulan
            if ($coutput_bulan->count() > 0) {
                # code...
                $nilai_coutput_bulan = $coutput_bulan->avg('ikpa');
            } else {
                # code...
                $nilai_coutput_bulan = 0;
            }



            $nilai_ikpa_bulan = (0.1 * $nilai_revisi_dipa_bulan) + (0.1 * $nilai_deviasi_bulan) + (0.2 * $nilai_penyerapan_bulan) + (0.1 * $nilai_belanja_kontraktual_bulan) + (0.1 * $nilai_penyelesaian_tagihan_bulan) + (0.1 * $nilai_uptup_bulan) + (0.05 * $nilai_spm_bulan) + (0.25 * $nilai_coutput_bulan);

            // dd($nilai_ikpa_bulan);



            $ikpa_bulan = IkpaSatker::where('tahun_anggaran', $tahun)->where('bulan', $i)->get()->first();
            if ($ikpa_bulan) {
                # code...
                $ikpa_bulan->update(array(
                    'tahun_anggaran' => $tahun,
                    'bulan' => $i,
                    'nilai_revisi_dipa' => $nilai_revisi_dipa_bulan,
                    'nilai_deviasi_tiga_dipa' => $nilai_deviasi_bulan,
                    'nilai_penyerapan_anggaran' => $nilai_penyerapan_bulan,
                    'nilai_belanja_kontraktual' => $nilai_belanja_kontraktual_bulan,
                    'nilai_penyelesaian_tagihan' => $nilai_penyelesaian_tagihan_bulan,
                    'nilai_up_tup' => $nilai_uptup_bulan,
                    'nilai_dispensasi_spm' => $nilai_spm_bulan,
                    'nilai_capaian_output' => $nilai_coutput_bulan,
                    'ikpa' => $nilai_ikpa_bulan,
                ));
            } else {
                # code...
                IkpaSatker::create([
                    'tahun_anggaran' => $tahun,
                    'bulan' => $i,
                    'nilai_revisi_dipa' => $nilai_revisi_dipa_bulan,
                    'nilai_deviasi_tiga_dipa' => $nilai_deviasi_bulan,
                    'nilai_penyerapan_anggaran' => $nilai_penyerapan_bulan,
                    'nilai_belanja_kontraktual' => $nilai_belanja_kontraktual_bulan,
                    'nilai_penyelesaian_tagihan' => $nilai_penyelesaian_tagihan_bulan,
                    'nilai_up_tup' => $nilai_uptup_bulan,
                    'nilai_dispensasi_spm' => $nilai_spm_bulan,
                    'nilai_capaian_output' => $nilai_coutput_bulan,
                    'ikpa' => $nilai_ikpa_bulan,
                ]);
            }
        }
    }
}
