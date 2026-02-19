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
        // 1. Pastikan Kategori ada, jika tidak ada, buatkan saja otomatis
        $kategori = KategoriLayanan::firstOrCreate(
            ['nama_kategori' => 'Pelayanan Kesehatan'],
            ['slug' => Str::slug('Pelayanan Kesehatan')]
        );

        // 2. Pastikan Jenis Pembayaran ada (Ini yang sering bikin skip)
        $bpjs = JenisPembayaran::firstOrCreate(['nama' => 'BPJS']);
        $umum = JenisPembayaran::firstOrCreate(['nama' => 'Umum']);

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

            // Gunakan updateOrCreate: Parameter 1 untuk cari, Parameter 2 untuk isi data
            $layanan = Layanan::updateOrCreate(
                ['slug' => $slug],
                [
                    'kategori_id' => $kategori->id,
                    'nama_layanan' => $data['nama_layanan'],
                    'deskripsi' => $data['deskripsi'],
                ]
            );

            LayananPembayaran::updateOrCreate(
                [
                    'layanan_id' => $layanan->id,
                    'jenis_pembayaran_id' => $bpjs->id,
                ],
                [
                    'tarif' => $data['tarif_bpjs'],
                    'keterangan' => 'Gratis untuk peserta BPJS',
                ]
            );

            LayananPembayaran::updateOrCreate(
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

        $this->command->info('Seeder layanan kesehatan BERHASIL dimasukkan.');
    }
}
