<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormMagang extends Model
{
    protected $fillable = [
        'berkas', 'tanggal', 'ket', 'status', 'magang_id', 'mahasiswa_id'
    ];

    public $timestamps = false;

    public function magang()
    {
        return $this->belongsTo(Magang::class, 'magang_id');
    }

    public function mahasiswa()
    {
       return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
