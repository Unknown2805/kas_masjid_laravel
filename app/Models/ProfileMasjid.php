<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileMasjid extends Model
{
    use HasFactory;
    protected $table = 'profile_masjid';

    protected $fillable = [
        'image',
        'masjid',
    ];

}
