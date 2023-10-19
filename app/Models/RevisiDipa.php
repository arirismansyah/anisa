<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class RevisiDipa extends Model
{
    use HasFactory;
    protected $table = 'revisi_dipa';
    protected $fillable = [
        'tahun_anggaran',
        'rev_jan',
        'rev_feb',
        'rev_mar',
        'rev_apr',
        'rev_may',
        'rev_jun',
        'rev_jul',
        'rev_aug',
        'rev_sep',
        'rev_oct',
        'rev_nov',
        'rev_dec',
        'rev_tw_1',
        'rev_tw_2',
        'rev_tw_3',
        'rev_tw_4',
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
