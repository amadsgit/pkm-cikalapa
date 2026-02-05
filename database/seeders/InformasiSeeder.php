<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Informasi;
use App\Models\KategoriInformasi;

class InformasiSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil kategori "Berita" dan "Pengumuman"
        $kategoriBerita = KategoriInformasi::where('slug', 'berita')->first();
        $kategoriPengumuman = KategoriInformasi::where('slug', 'pengumuman')->first();
        $user = \App\Models\User::first();

        if ($kategoriBerita) {
            // Data 1
            Informasi::create([
                'kategori_id' => $kategoriBerita->id,
                'judul'       => 'Pelayanan Kesehatan Terbaru di Puskesmas',
                'deskripsi'   => 'Puskesmas Cikalapa mengadakan pelayanan kesehatan terbaru untuk masyarakat, termasuk pemeriksaan gratis dan edukasi kesehatan.',
                'gambar'      => 'informasi/ckg.jpg',
                'tanggal'     => now()->toDateString(),
                'user_id'     => $user->id,
                'slug'        => Str::slug('Pelayanan Kesehatan Terbaru di Puskesmas'),
            ]);

            // Data 2
            Informasi::create([
                'kategori_id' => $kategoriBerita->id,
                'judul'       => 'Kegiatan Posyandu Bulan September',
                'deskripsi'   => 'Posyandu melati parung mengadakan kegiatan rutin untuk memantau tumbuh kembang anak balita dan memberikan imunisasi.',
                'gambar'      => 'informasi/posyandu.png',
                'tanggal'     => now()->subDay()->toDateString(),
                'user_id'     => $user->id,
                'slug'        => Str::slug('Kegiatan Posyandu Bulan September'),
            ]);

            // Data 3 (Berita tambahan)
            Informasi::create([
                'kategori_id' => $kategoriBerita->id,
                'judul'       => 'Tips Hidup Sehat di Musim Hujan',
                'deskripsi'   => 'Tips menjaga kesehatan dan imunitas tubuh selama musim hujan, termasuk pola makan dan olahraga ringan.',
                'gambar'      => 'informasi/tips-hujan.jpg',
                'tanggal'     => now()->subDays(2)->toDateString(),
                'user_id'     => $user->id,
                'slug'        => Str::slug('Tips Hidup Sehat di Musim Hujan'),
            ]);
        }

        if ($kategoriPengumuman) {
            // Data 4 (Pengumuman)
            Informasi::create([
                'kategori_id' => $kategoriPengumuman->id,
                'judul'       => 'Pendaftaran Vaksinasi Covid-19 Tahap Berikutnya',
                'deskripsi'   => 'Puskesmas Cikalapa membuka pendaftaran vaksinasi Covid-19 untuk masyarakat umum. Segera daftar sebelum kuota habis.',
                'gambar'      => 'informasi/vaksin.jpg',
                'tanggal'     => now()->subDays(3)->toDateString(),
                'user_id'     => $user->id,
                'slug'        => Str::slug('Pendaftaran Vaksinasi Covid-19 Tahap Berikutnya'),
            ]);
        }
    }
}
