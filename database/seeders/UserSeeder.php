<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {

        $users = [

            [

                'id' => 1,
                'pegawai_id' => 1,
                'nip' => '198809052020121005',

                'email' => 'kapus@gmail.com',

                'password' => Hash::make('password123'),

                'created_at' => now(),
                'updated_at' => now(),

            ],

            [

                'id' => 2,

                'pegawai_id' => 2,

                'nip' => '198112242010012014',

                'email' => 'ruhandi58@gmail.com',

                'password' => Hash::make('password123'),

                'created_at' => now(),
                'updated_at' => now(),

            ],

        ];

        foreach ($users as $user) {

            DB::table('users')->updateOrInsert(

                ['email' => $user['email']],

                $user

            );

        }

    }
}
