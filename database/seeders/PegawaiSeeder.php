<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pegawai')->insert([

            [
                'id' => 1,
                'foto' => 'pegawai/foto/default.png',

                'nama_pegawai' => 'Wawan Supandi,SKM',
                'nip' => '198809052020121005',
                'tempat_lahir' => 'subang',
                'tanggal_lahir' => '1975-02-12',
                'jenis_kelamin' => 'Laki-laki',

                'jabatan' => 'Kepala Puskesmas',
                'pangkat' => 'Pembina',
                'golongan' => 'III/b',

                'status_kepegawaian' => 'PNS',
                'tgl_mulai_kerja' => '2020-01-05',

                'pendidikan_terakhir' => 'S1',
                'jurusan' => 'Kesehatan Masyarakat',

                'hp' => '08213132312',
                'alamat' => 'subang',

                'created_at' => now(),
                'updated_at' => now(),

            ],

            [
                'id' => 2,

                'nama_pegawai' => 'Dedi Ruhandi,SKM.,MM',
                'nip' => '198112242010012014',
                'tempat_lahir' => 'Subang',
                'tanggal_lahir' => '2025-10-07',

                'jenis_kelamin' => 'Laki-laki',
                'jabatan' => 'Kasubag TU',

                'pangkat' => 'Pembina',
                'golongan' => 'IV/a',

                'status_kepegawaian' => 'PNS',

                'tgl_mulai_kerja' => '2022-12-14',

                'pendidikan_terakhir' => 'S2',

                'jurusan' => 'Manajemen Administrasi',

                'hp' => '08888888120',

                'alamat' => 'subang',

                'created_at' => now(),
                'updated_at' => now(),

            ],

        ]);
    }
}
