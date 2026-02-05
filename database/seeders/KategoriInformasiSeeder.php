<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\KategoriInformasi;

class KategoriInformasiSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            'Artikel',
            'Pengumuman',
            'Berita',
            'Edukasi & Tips Sehat',
            'Rekrutmen',
        ];

        foreach ($kategoris as $nama) {
            KategoriInformasi::updateOrCreate(
                ['slug' => Str::slug($nama)],
                ['nama' => $nama]
            );
        }
    }
}
