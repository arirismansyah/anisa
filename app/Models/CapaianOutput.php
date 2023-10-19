<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CapaianOutput extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahun_anggaran',
        'bulan',
        'kd_program',
        'kd_kegiatan',
        'kd_output',
        'kd_suboutput',
        'uraian_output',
        'tanggal_entri',
        'target_pcro',
        'penambahan_pcro',
        'target_rvro',
        'penambahan_rvro',
        'nilai_kepatuhan',
        'nilai_capaian',
        'ikpa',
        'username',
        'kode_tim',
        'nama_tim',
        'warning',
        'warning_desc',
        'created_by',
        'updated_by',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $user = Auth::user();
            $model->created_by = $user->username;
            $model->updated_by = $user->username;
        });
        static::saving(function ($model) {
            $user = Auth::user();
            $model->updated_by = $user->username;
        });
    }
}
