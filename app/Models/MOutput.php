<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MOutput extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahun_anggaran',
        'kd_program',
        'kd_kegiatan',
        'kd_output',
        'kd_suboutput',
        'uraian_output',
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
