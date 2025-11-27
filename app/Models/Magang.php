<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Magang extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nama_magang',
        'tanggal',
        'semester',
        'sk',
        'ket',
        'jenis_kelamin',
        'status',
    ];

    // Relasi ke Dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

}
