<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\ProfilePuskesmas;
use App\Models\StaffPuskesmas;
use Illuminate\Database\Seeder;

class StaffPuskesmasSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil profil puskesmas pertama
        $profile = ProfilePuskesmas::first();

        if (! $profile) {
            $this->command->warn('⚠️ Tidak ada data Profile Puskesmas. Seeder StaffPuskesmas dilewati.');

            return;
        }

        // Cari pegawai dengan jabatan Kepala Puskesmas
        $kepala = Pegawai::where('jabatan', 'Kepala Puskesmas')->first();

        if (! $kepala) {
            $this->command->warn('⚠️ Tidak ada pegawai dengan jabatan Kepala Puskesmas. Seeder StaffPuskesmas dilewati.');

            return;
        }

        // Insert ke staff_puskesmas
        StaffPuskesmas::updateOrCreate(
            [
                'profile_puskesmas_id' => $profile->id,
                'pegawai_id' => $kepala->id,
            ],
            [
                'jabatan_alias' => 'Kepala Puskesmas', // bisa dikustomisasi untuk tampilan
                'order' => 1,
            ]
        );

        $this->command->info('Staff Kepala Puskesmas berhasil dimasukkan ke staff_puskesmas.');
    }
}
