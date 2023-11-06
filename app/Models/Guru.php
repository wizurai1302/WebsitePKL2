<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'gurus';
    protected $fillable = [
        'name',
        'nuptk',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
