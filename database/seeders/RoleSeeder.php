<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [

            [
                'id' => 1,
                'name' => 'Administrator',
                'slug' => 'administrator',
                'description' => 'admin puskesmas',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 2,
                'name' => 'Author',
                'slug' => 'author',
                'description' => 'penulis berita/artikel',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 3,
                'name' => 'Kepala Puskesmas',
                'slug' => 'kepala-puskesmas',
                'description' => 'Kepala Puskesmas',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 4,
                'name' => 'Kasubag TU',
                'slug' => 'kasubag-tu',
                'description' => 'Kasubag Tata Usaha',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        foreach ($roles as $role) {

            DB::table('roles')->updateOrInsert(

                ['id' => $role['id']],
                $role

            );

        }
    }
}
