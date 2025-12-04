<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prodis')->insert([
            'nama'     => 'ILMU KOMUNIKASI UNIVERSITAS MUHAMMADIYAH PAPUA',
            'visi'     => 'Menjadi Program Studi unggul dalam bidang Ilmu Komunikasi berbasis teknologi dan nilai keislaman.',
            'misi'     => '1. Menyelenggarakan pendidikan berkualitas di bidang Ilmu Komunikasi. <br>
                           2. Melaksanakan penelitian dan pengabdian kepada masyarakat.<br>
                           3. Menghasilkan lulusan yang kompeten dan berkarakter.<br>',
            'struktur' => 'Struktur organisasi Prodi Ilmu Komunikasi Universitas Muhammadiyah Papua.',
            'sejarah'  => 'Program Studi Ilmu Komunikasi berdiri sebagai bagian dari pengembangan pendidikan tinggi di Universitas Muhammadiyah Papua.',
        ]);
    }
}
