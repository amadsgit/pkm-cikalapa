<?php

namespace Database\Seeders;

use App\Models\Layanan;
use App\Models\LayananPersyaratan;
use Illuminate\Database\Seeder;

class LayananPersyaratanSeeder extends Seeder
{
    public function run(): void
    {
        $layanan = Layanan::where('slug', 'pelayanan-rawat-jalan')->first();

        if (! $layanan) {

            $this->command->warn('Layanan tidak ditemukan');

            return;
        }

        $data = [

            [
                'nama_persyaratan' => 'Kartu Tanda Penduduk (KTP)',
                'keterangan' => 'Asli dan fotokopi untuk verifikasi identitas pasien rawat jalan',
                'urutan' => 1,
            ],

            [
                'nama_persyaratan' => 'Kartu BPJS Kesehatan',
                'keterangan' => 'Asli dan fotokopi untuk keperluan administrasi pelayanan rawat jalan',
                'urutan' => 2,
            ],
        ];

        foreach ($data as $item) {

            LayananPersyaratan::updateOrCreate(

                [
                    'layanan_id' => $layanan->id,
                    'nama_persyaratan' => $item['nama_persyaratan'],
                ],

                [
                    'keterangan' => $item['keterangan'],
                    'urutan' => $item['urutan'],
                ]

            );

        }

        $this->command->info('Seeder persyaratan OK');
    }
}
