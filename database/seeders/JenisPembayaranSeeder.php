<?php

namespace Database\Seeders;

use App\Models\JenisPembayaran;
use Illuminate\Database\Seeder;

class JenisPembayaranSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'BPJS', 'keterangan' => 'Pembayaran menggunakan BPJS Kesehatan.'],
            ['nama' => 'Umum', 'keterangan' => 'Pembayaran secara umum atau pribadi.'],
        ];

        foreach ($data as $item) {
            JenisPembayaran::create($item);
        }
    }
}
