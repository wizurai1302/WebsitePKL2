<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];
    // protected $table = ['perusahaans'];
    protected $fillable = [
        'nama',
        'lokasi',
        'image',
        'deskripsi',
        'jurusan',
        'alamat',
    ];
}
