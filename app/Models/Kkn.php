<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kkn extends Model
{
    protected $fillable = [
        'nama_kkn', 'tahun', 'status', 'sk'
    ];

    public $timestamps = false;
}
