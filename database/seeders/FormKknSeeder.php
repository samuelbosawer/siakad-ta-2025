<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormKknSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('form_kkns')->insert([
            [
                'mahasiswa_id' => 1,
                'tanggal' => '2025-01-10',
                'kem_studi' => 'Teknik Informatika',
                'bukti_bayar' => 'bukti_bayar_1.jpg',
                'keterangan' => 'Sudah membayar biaya KKN',
                'kkn_id' => 1
            ],
            [
                'mahasiswa_id' => 2,
                'tanggal' => '2025-01-12',
                'kem_studi' => 'Sistem Informasi',
                'bukti_bayar' => 'bukti_bayar_2.jpg',
                'keterangan' => 'Menunggu validasi',
                'kkn_id' => 1
            ]
        ]);
    }
}
