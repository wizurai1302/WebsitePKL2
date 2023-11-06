<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePerusahaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'phone',
        'email',
        'lokasi',
        'facebook',
        'instagram',
    ];
}
