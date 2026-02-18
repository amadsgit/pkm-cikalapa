<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'Administrator',
                'slug' => 'administrator',
                'description' => 'admin puskesmas',
                'created_at' => Carbon::parse('2025-09-12 06:16:34'),
                'updated_at' => Carbon::parse('2025-09-12 06:16:34'),
            ],
            [
                'id' => 2,
                'name' => 'Author',
                'slug' => 'author',
                'description' => 'penulis berita/artikel',
                'created_at' => Carbon::parse('2025-09-12 06:17:41'),
                'updated_at' => Carbon::parse('2025-09-12 06:17:41'),
            ],
            [
                'id' => 3,
                'name' => 'Kepala Puskesmas',
                'slug' => 'kepala-puskesmas',
                'description' => 'Kepala Puskesmas',
                'created_at' => Carbon::parse('2025-09-12 06:18:38'),
                'updated_at' => Carbon::parse('2025-09-12 06:18:38'),
            ],
            [
                'id' => 4,
                'name' => 'Kasubag TU',
                'slug' => 'kasubag-tu',
                'description' => 'Kasubag Tata Usaha',
                'created_at' => Carbon::parse('2025-09-12 06:18:57'),
                'updated_at' => Carbon::parse('2025-09-12 06:18:57'),
            ],
        ]);
    }
}
