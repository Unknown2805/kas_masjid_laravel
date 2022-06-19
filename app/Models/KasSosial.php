<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\KasSosialController;

class KasSosial extends Model
{
    use HasFactory;
    protected $table = 'kas_sosial';

    protected $fillable = [
        'tanggal',
        'uraian',
        'masuk',
        'keluar',
        'jenis'
    ];
}
