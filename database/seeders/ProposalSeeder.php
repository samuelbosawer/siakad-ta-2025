<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('proposals')->insert([
            [
                'judul'         => 'Proposal Penelitian Sistem Informasi 2025',
                'berkas'        => null,
                'status'        => 'Selesai',
                'tanggal'           => '2025-01-12',
                'mahasiswa_id'  => 1,   // sesuaikan dengan data di tabel mahasiswas
            ],
            [
                'judul'         => 'Proposal Kegiatan Pengabdian Masyarakat',
                'berkas'        => null,
                'status'        => 'Belum Selesai',
                'tanggal'           => '2025-02-01',
                'mahasiswa_id'  => 2,
            ]
        ]);
    }
}
