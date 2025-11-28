<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormMagangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('form_magangs')->insert([
            'berkas'        => null,
            'tanggal'       => '2025-02-10',
            'ket'           => 'Pengajuan form magang untuk proses verifikasi.',
            'magang_id'     => 1,   // sesuaikan dengan id dari tabel magangs
            'mahasiswa_id'  => 1,   // sesuaikan dengan id dari tabel mahasiswas
        ]);
    }
}
