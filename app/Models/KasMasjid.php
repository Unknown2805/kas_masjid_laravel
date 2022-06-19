<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\KasMasjidController;

class KasMasjid extends Model
{
    use HasFactory;
    protected $table = 'kas_masjid';

    protected $fillable = [
        'tanggal',
        'uraian',
        'masuk',
        'keluar',
        'jenis'
    ];

}



