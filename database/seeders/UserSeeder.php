<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   

        $user = User::create([
            'nama' => 'Admin Prodi',
            'alamat' => 'Sentani',
            'no_hp' => '082198159714',
            'email' => 'adminprodi@master.com',
            'password' =>  bcrypt('adminprodi@master.com'),
            'jenis_kelamin' => '',

        ]);
        $user->assignRole('adminprodi');



        $user = User::create([
            'nama' => 'Mahasiswa 1',
            'alamat' => 'Sentani',
            'no_hp' => '082198159711',
            'email' => 'mahasiswa1@gmail.com',
            'password' =>  bcrypt('mahasiswa1@gmail.com'),
            'jenis_kelamin' => '',

        ]);
        $user->assignRole('mahasiswa');
          $user = User::create([
            'nama' => 'Mahasiswa 2',
            'alamat' => 'Sentani',
            'no_hp' => '082198159712',
            'email' => 'mahasiswa2@gmail.com',
            'password' =>  bcrypt('mahasiswa2@gmail.com'),
            'jenis_kelamin' => '',

        ]);
        $user->assignRole('mahasiswa');


        $user = User::create([
            'nama' => 'Samuel',
            'alamat' => 'Sentani',
            'no_hp' => '082198159721',
            'email' => 'samuel@gmail.com',
            'password' =>  bcrypt('samuel@gmail.com'),
            'jenis_kelamin' => '',

        ]);
        $user->assignRole('dosen');
    }
}
