<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormKkn extends Model
{
     protected $fillable = [
        'tanggal', 'kem_studi', 'bukti_bayar', 'keterangan', 'status', 'mahasiswa_id','kkn_id'
    ];

    public $timestamps = false;

    public function kkn()
    {
        return $this->belongsTo(Kkn::class, 'kkn_id');
    }

    public function mahasiswa()
    {
       return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
