<?php

namespace Database\Seeders;

use App\Models\ProfilePuskesmas;
use Illuminate\Database\Seeder;

class ProfilePuskesmasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfilePuskesmas::create([
            'nama_puskesmas' => 'Puskesmas Cikalapa',
            'kecamatan' => 'Subang',
            'kabupaten' => 'Subang',
            'provinsi' => 'Jawa Barat',
            'kode_pos' => '41214',
            'telepon' => '0260-123456',
            'whatsapp' => '081286208542',
            'email' => 'puskesmascikalapa@mail.com',
            'website' => 'https://pkmcikalapa.subang.go.id',
            'alamat' => 'Jl. Pulau Kalimantan No.39 Kel.Pasirkareumbi',
            'logo' => 'logo/logopkm.png',
        ]);
    }
}
