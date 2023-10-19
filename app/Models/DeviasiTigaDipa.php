<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DeviasiTigaDipa extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun_anggaran',
        'bulan',
        'rencana_anggaran',
        'penyerapan_anggaran',
        'persen_deviasi',
        'persen_deviasi_sebelumnya',
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
