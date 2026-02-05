<?php

namespace Database\Seeders;

use App\Models\InfoWilayah;
use App\Models\ProfilePuskesmas;
use Illuminate\Database\Seeder;

class InfoWilayahSeeder extends Seeder
{
    public function run(): void
    {
        $profileId = ProfilePuskesmas::first()->id;

        InfoWilayah::updateOrCreate(
            ['profile_puskesmas_id' => $profileId],
            [
                'luas_m2' => 4567800,
                'luas_hektar' => 456.78,
                'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.5430319237307!2d107.7631300737872!3d-6.579205393414267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e693b58c635ac47%3A0x47d8e5b8a0c57b99!2sUPTD%20Puskesmas%20Cikalapa%20Kecamatan%20Subang%20Subang!5e0!3m2!1sid!2sid!4v1756728632619!5m2!1sid!2sid',
            ]
        );
    }
}
