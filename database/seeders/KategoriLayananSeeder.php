<?php

namespace Database\Seeders;

use App\Models\KategoriLayanan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KategoriLayananSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama_kategori' => 'Pelayanan Kesehatan', 'deskripsi' => 'Layanan medis umum dan spesialis di Puskesmas.'],
            ['nama_kategori' => 'Pelayanan Penunjang', 'deskripsi' => 'Layanan penunjang medis seperti laboratorium dan radiologi.'],
            ['nama_kategori' => 'Tarif Tambahan pada Pemeriksaan Gigi', 'deskripsi' => 'Biaya tambahan untuk layanan pemeriksaan gigi.'],
            ['nama_kategori' => 'Tarif Tambahan pada Pelayanan Kebidanan', 'deskripsi' => 'Biaya tambahan untuk pelayanan kebidanan.'],
            ['nama_kategori' => 'Tarif Tambahan pada Pelayanan Kegawatdaruratan dan Observasi', 'deskripsi' => 'Biaya tambahan untuk layanan gawat darurat dan observasi.'],
            ['nama_kategori' => 'Tarif Pelayanan Pemeriksaan Laboratorium', 'deskripsi' => 'Biaya pemeriksaan laboratorium umum dan khusus.'],
        ];

        foreach ($data as $item) {
            KategoriLayanan::create([
                'nama_kategori' => $item['nama_kategori'],
                'deskripsi' => $item['deskripsi'],
                'slug' => Str::slug($item['nama_kategori']),
            ]);
        }
    }
}
