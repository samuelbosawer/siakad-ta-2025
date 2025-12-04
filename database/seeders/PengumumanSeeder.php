<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('pengumumans')->insert([
            [
                'judul'     => 'Pengumuman Ujian Tengah Semester',
                'gambar'    => null,
                'tanggal'   => '2025-03-10',
                'deskripsi' => 'Pelaksanaan UTS akan dimulai pada tanggal 15 Maret 2025. 
                                Mohon mahasiswa mempersiapkan diri dan mengecek jadwal masing-masing.'
            ],
            [
                'judul'     => 'Libur Nasional Hari Raya',
                'gambar'    => null,
                'tanggal'   => '2025-04-17',
                'deskripsi' => 'Seluruh kegiatan perkuliahan diliburkan pada tanggal 17 April 2025 
                                dalam rangka libur nasional.'
            ]
        ]);
    }
}
