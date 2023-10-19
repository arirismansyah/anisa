<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IkpaSatker extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun_anggaran',
        'bulan',
        'nilai_revisi_dipa',
        'nilai_deviasi_tiga_dipa',
        'nilai_penyerapan_anggaran',
        'nilai_belanja_kontraktual',
        'nilai_penyelesaian_tagihan',
        'nilai_up_tup',
        'nilai_dispensasi_spm',
        'nilai_capaian_output',
        'ikpa',
    ];
}
