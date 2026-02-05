<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KategoriKegiatanSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            'Lokmin Bulanan',
            'Lokmin Triwulan',
            'Penyuluhan',
            'Sosialisasi',
            'Pelayanan Kesehatan',
            'Rapat Internal',
            'Rapat Koordinasi Eksternal',
            'Kegiatan Posyandu',
            'Kegiatan Posbindu',
            'Pemeriksaan Kesehatan Gratis',
            'Senam',
            'Kegiatan Nasional',
            'Prolanis',
        ];

        foreach ($kategori as $k) {
            DB::table('kategori_kegiatan')->updateOrInsert(
                ['nama' => $k],
                [
                    'slug' => Str::slug($k),
                    'updated_at' => now(),
                    'created_at' => now()
                ]
            );
        }
    }
}
