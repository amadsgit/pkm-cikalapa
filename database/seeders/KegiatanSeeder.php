<?php

namespace Database\Seeders;

use App\Models\KategoriKegiatan;
use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KegiatanSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil kategori "Pemeriksaan Kesehatan Gratis"
        $kategori = KategoriKegiatan::where('slug', 'pemeriksaan-kesehatan-gratis')->first();

        // Ambil user pertama sebagai author
        $user = User::first();

        if ($kategori && $user) {
            // Data 1
            Kegiatan::create([
                'kategori_id' => $kategori->id,
                'judul' => 'Cek Kesehatan Gratis untuk Masyarakat',
                'deskripsi' => 'Layanan pemeriksaan kesehatan dasar secara gratis bagi masyarakat, sebagai langkah deteksi dini penyakit dan peningkatan kesadaran hidup sehat.',
                'gambar' => 'kegiatan/ckg.jpg',
                'tanggal' => now()->toDateString(),
                'user_id' => $user->id,
                'slug' => Str::slug('Cek Kesehatan Gratis untuk Masyarakat'),
            ]);

            // Data 2
            Kegiatan::create([
                'kategori_id' => $kategori->id,
                'judul' => 'Pemeriksaan Gigi Gratis Anak-anak',
                'deskripsi' => 'Kegiatan pemeriksaan kesehatan gigi untuk anak-anak di Posyandu, untuk mencegah karies dan menjaga kesehatan mulut sejak dini.',
                'gambar' => 'kegiatan/gigi.jpg',
                'tanggal' => now()->subDay()->toDateString(),
                'user_id' => $user->id,
                'slug' => Str::slug('Pemeriksaan Gigi Gratis Anak-anak'),
            ]);

            // Data 3
            Kegiatan::create([
                'kategori_id' => $kategori->id,
                'judul' => 'Senam Sehat Bersama Masyarakat',
                'deskripsi' => 'Kegiatan senam sehat bersama warga desa untuk meningkatkan kebugaran dan mendorong pola hidup aktif.',
                'gambar' => 'kegiatan/senam.jpg',
                'tanggal' => now()->subDays(2)->toDateString(),
                'user_id' => $user->id,
                'slug' => Str::slug('Senam Sehat Bersama Masyarakat'),
            ]);

            // Data 4
            Kegiatan::create([
                'kategori_id' => $kategori->id,
                'judul' => 'Penyuluhan Kesehatan Reproduksi Remaja',
                'deskripsi' => 'Kegiatan edukasi tentang kesehatan reproduksi bagi remaja untuk mencegah penyakit menular dan meningkatkan pengetahuan tentang kesehatan pribadi.',
                'gambar' => 'kegiatan/remaja.jpg',
                'tanggal' => now()->subDays(3)->toDateString(),
                'user_id' => $user->id,
                'slug' => Str::slug('Penyuluhan Kesehatan Reproduksi Remaja'),
            ]);
        }
    }
}
