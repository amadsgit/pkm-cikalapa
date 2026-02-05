<?php

namespace Database\Seeders;

use App\Models\BatasWilayah;
use Illuminate\Database\Seeder;

class BatasWilayahSeeder extends Seeder
{
    /**
     * Jalankan seeder database.
     */
    public function run(): void
    {
        $profileId = 1; // sesuaikan dengan id profile_puskesmas yang ada

        $data = [
            [
                'profile_puskesmas_id' => $profileId,
                'arah' => 'Utara',
                'berbatasan_dengan' => 'Puskesmas Sukarahayu',
                'keterangan' => 'Batas wilayah bagian utara',
            ],
            [
                'profile_puskesmas_id' => $profileId,
                'arah' => 'Timur',
                'berbatasan_dengan' => 'Puskesmas Cibogo',
                'keterangan' => 'Batas wilayah bagian timur',
            ],
            [
                'profile_puskesmas_id' => $profileId,
                'arah' => 'Selatan',
                'berbatasan_dengan' => 'Puskesmas Tanjungwangi',
                'keterangan' => 'Batas wilayah bagian selatan',
            ],
            [
                'profile_puskesmas_id' => $profileId,
                'arah' => 'Barat',
                'berbatasan_dengan' => 'Puskesmas Sukarahayu',
                'keterangan' => 'Batas wilayah bagian barat',
            ],
        ];

        foreach ($data as $item) {
            BatasWilayah::create($item);
        }
    }
}
