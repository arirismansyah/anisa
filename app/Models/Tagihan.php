<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tagihan extends Model
{
    use HasFactory;
    protected $table = 'tagihan';

    protected $fillable = [
        'tahun_anggaran',
        'bulan',
        'jml_ls_kontraktual_tepat_waktu',
        'jml_ls_kontraktual',
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
