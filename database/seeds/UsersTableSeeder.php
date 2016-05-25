<?php

use Illuminate\Database\Seeder;
use Eoola\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Contoh Guru',
            'no_induk'    => 'guru',
            'role'     => 'teacher',
            'password' => bcrypt('guru123'),
        ]);

        User::create([
            'name'     => 'Admin Utama',
            'no_induk'    => 'admin',
            'role'     => 'admin',
            'password' => bcrypt('admin123'),
        ]);

        User::create([
            'name'     => 'Contoh Siswa',
            'no_induk'    => 'siswa',
            'role'     => 'student',
            'password' => bcrypt('siswa123'),
        ]);

    }
}
