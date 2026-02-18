<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([

            [
                'id' => 1,
                'pegawai_id' => 1,
                'nip' => '198809052020121005',
                'email' => 'kapus@gmail.com',
                'password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 2,
                'pegawai_id' => 1,
                'nip' => '198112242010012014',
                'email' => 'ruhandi58@gmail.com',
                'password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
