<?php

namespace Database\Seeders;

use App\Models\WilayahKerja;
use Illuminate\Database\Seeder;

class WilayahKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wilayah = [
            [
                'profile_puskesmas_id' => 1,
                'nama' => 'Kelurahan Parung',
                'jenis' => 'kelurahan',
                'kode_wilayah' => null,
            ],
            [
                'profile_puskesmas_id' => 1,
                'nama' => 'Kelurahan Wanareja',
                'jenis' => 'kelurahan',
                'kode_wilayah' => null,
            ],
            [
                'profile_puskesmas_id' => 1,
                'nama' => 'Kelurahan Soklat',
                'jenis' => 'kelurahan',
                'kode_wilayah' => null,
            ],
            [
                'profile_puskesmas_id' => 1,
                'nama' => 'Kelurahan Pariskareumbi',
                'jenis' => 'kelurahan',
                'kode_wilayah' => null,
            ],
        ];

        foreach ($wilayah as $item) {
            WilayahKerja::create($item);
        }
    }
}
