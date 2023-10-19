<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PenyerapanAnggaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahun_anggaran',
        'bulan',
        'pagu',
        'blokir',
        'pagu_netto',
        'nominal_target',
        'nominal_penyerapan',
        'persentase_penyerapan',
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
