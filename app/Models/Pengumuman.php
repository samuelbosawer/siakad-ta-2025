<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
     protected $table = 'pengumumans'; 
    public $timestamps = false;
    protected $fillable = [
        'judul',
        'gambar',
        'deskripsi',
        'tanggal',
    ];

    
}
