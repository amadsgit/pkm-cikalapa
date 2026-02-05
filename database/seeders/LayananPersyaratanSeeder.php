<?php

namespace Database\Seeders;

use App\Models\LayananPersyaratan;
use Illuminate\Database\Seeder;

class LayananPersyaratanSeeder extends Seeder
{
    /**
     * Jalankan seeder database.
     */
    public function run(): void
    {
        $data = [
            [
                'layanan_id' => 1,
                'nama_persyaratan' => 'Kartu Tanda Penduduk (KTP)',
                'keterangan' => 'Asli dan fotokopi untuk verifikasi identitas pasien rawat jalan',
                'urutan' => 1,
            ],
            [
                'layanan_id' => 1,
                'nama_persyaratan' => 'Kartu BPJS Kesehatan',
                'keterangan' => 'Asli dan fotokopi untuk keperluan administrasi pelayanan rawat jalan',
                'urutan' => 2,
            ],
        ];

        LayananPersyaratan::insert($data);
    }
}
