<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BelanjaKontraktual extends Model
{
    use HasFactory;
    protected $table = 'belanja_kontraktual';
    protected $fillable = [
        'tahun_anggaran',
        'tgl_kontrak',
        'tgl_daftar',
        'tgl_daftar',
        'nilai_kepatuhan',
        'nilai_pra',
        'nilai_akselerasi',
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
