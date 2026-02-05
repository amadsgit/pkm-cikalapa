<?php

namespace Database\Seeders;

use App\Models\Klaster;
use App\Models\Layanan;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $layananList = [
            [
                'nama' => 'Klaster 1 Manajemen',
                'deskripsi' => 'Layanan yang fokus pada manajemen administrasi dan operasional Puskesmas untuk mendukung kelancaran layanan kesehatan.',
            ],
            [
                'nama' => 'Klaster 2 Ibu & Anak',
                'deskripsi' => 'Layanan kesehatan khusus untuk ibu hamil, ibu menyusui, dan anak-anak, termasuk imunisasi dan pemeriksaan rutin.',
            ],
            [
                'nama' => 'Klaster 3 Usia Dewasa & Lansia',
                'deskripsi' => 'Layanan kesehatan untuk orang dewasa dan lansia, termasuk pemeriksaan rutin, deteksi dini penyakit kronis, dan edukasi kesehatan.',
            ],
            [
                'nama' => 'Klaster 4 Penanggulangan Penyakit Menular',
                'deskripsi' => 'Program khusus untuk pencegahan, deteksi, dan pengendalian penyakit menular di wilayah Puskesmas.',
            ],
            [
                'nama' => 'Klaster 5 Lintas Klaster',
                'deskripsi' => 'Layanan yang mencakup berbagai program lintas klaster untuk memastikan semua kebutuhan kesehatan masyarakat terpenuhi.',
            ],
        ];

        foreach ($layananList as $layanan) {
            Klaster::create([
                'nama' => $layanan['nama'],
                'deskripsi' => $layanan['deskripsi'],
                'slug' => Str::slug($layanan['nama']),
            ]);
        }
    }
}
