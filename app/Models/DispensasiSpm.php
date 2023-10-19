<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DispensasiSpm extends Model
{
    use HasFactory;
    protected $table = 'dispensasi_spm';

    protected $fillable = [
        'tahun_anggaran',
        'jumlah_spm_dispensasi',
        'jumlah_spm',
        'nilai_permil',
        'ikpa',
        'warning',
        'warning_desc',
        'created_by',
        'updated_by'
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
