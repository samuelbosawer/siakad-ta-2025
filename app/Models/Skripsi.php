<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{

      public $timestamps = false;
   protected $fillable = [
        'berkas', 'id_proposal', 'status', 'keterangan'
    ];



    public function proposal()
    {
        return $this->belongsTo(Proposal::class, 'id_proposal');
    }
}
