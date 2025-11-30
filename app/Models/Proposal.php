<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{

   
   public $timestamps = false;
   protected $fillable = [
        'judul', 'mahasiswa_id', 'status', 'tanggal','berkas'
    ];


     public function mahasiswa()
    {
       return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
