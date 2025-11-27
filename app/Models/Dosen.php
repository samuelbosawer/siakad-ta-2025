<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    public $timestamps = false;
        protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'semester',
        'alamat',
        'no_hp',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
