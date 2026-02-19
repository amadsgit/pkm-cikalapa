<?php

namespace Database\Seeders;

use App\Models\JenisPembayaran;
use App\Models\KategoriLayanan;
use App\Models\Layanan;
use App\Models\LayananPembayaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LayananKesehatanSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = KategoriLayanan::where('nama_kategori', 'Pelayanan Kesehatan')->first();
        $bpjs = JenisPembayaran::where('nama', 'BPJS')->first();
        $umum = JenisPembayaran::where('nama', 'Umum')->first();

        if (! $kategori || ! $bpjs || ! $umum) {
            $this->command->warn('Seeder kategori dan jenis pembayaran belum ada');

            return;
        }

        $layanans = [
            [
                'nama_layanan' => 'Pelayanan Rawat Jalan',
                'deskripsi' => 'Layanan pemeriksaan dan pengobatan pasien rawat jalan di Puskesmas.',
                'tarif_umum' => 14000,
                'tarif_bpjs' => 0,
            ],
            [
                'nama_layanan' => 'Pelayanan Kegawatdaruratan dan Observasi Pasien',
                'deskripsi' => 'Layanan untuk pasien gawat darurat dan observasi awal di Puskesmas.',
                'tarif_umum' => 75000,
                'tarif_bpjs' => 0,
            ],
        ];

        foreach ($layanans as $data) {

            $slug = Str::slug($data['nama_layanan']);

            $layanan = Layanan::Create(
                ['slug' => $slug],
                [
                    'kategori_id' => $kategori->id,
                    'nama_layanan' => $data['nama_layanan'],
                    'deskripsi' => $data['deskripsi'],
                ]
            );

            LayananPembayaran::Create(
                [
                    'layanan_id' => $layanan->id,
                    'jenis_pembayaran_id' => $bpjs->id,
                ],
                [
                    'tarif' => $data['tarif_bpjs'],
                    'keterangan' => 'Gratis untuk peserta BPJS',
                ]
            );

            LayananPembayaran::Create(
                [
                    'layanan_id' => $layanan->id,
                    'jenis_pembayaran_id' => $umum->id,
                ],
                [
                    'tarif' => $data['tarif_umum'],
                    'keterangan' => 'Tarif umum tanpa BPJS',
                ]
            );
        }

        $this->command->info('Seeder layanan kesehatan OK');
    }
}
