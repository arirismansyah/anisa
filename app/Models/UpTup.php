<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UpTup extends Model
{
    use HasFactory;

    protected $table = 'up_tups';


    protected $fillable = [
        'tahun_anggaran',
        'bulan',
        'jml_gup_tepat_waktu',
        'jml_gup',
        'jml_ptup_tepat_waktu',
        'jml_ptup',
        'pinalti_nilai',
        'persentase_gup',
        'tgl_gup',
        'tgl_gup_sebelumnya',
        'persentase_tup',
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
