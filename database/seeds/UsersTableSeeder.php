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
            'name'     => 'Guru',
            'email'    => 'guru@eoola.com',
            'role'     => 'teacher',
            'password' => bcrypt('guru123'),
        ]);

        User::create([
            'name'     => 'Admin Utama',
            'email'    => 'admin@eoola.com',
            'role'     => 'admin',
            'password' => bcrypt('admin123'),
        ]);

        User::create([
            'name'     => 'Siswa Utama',
            'email'    => 'siswa@eoola.com',
            'role'     => 'student',
            'password' => bcrypt('siswa123'),
        ]);

    }
}
