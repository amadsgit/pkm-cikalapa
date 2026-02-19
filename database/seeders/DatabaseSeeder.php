<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RoleSeeder::class,
            PegawaiSeeder::class,
            UserSeeder::class,
            RoleUserSeeder::class,
            ProfilePuskesmasSeeder::class,
            InformasiSeeder::class,
            BatasWilayahSeeder::class,
            KategoriInformasiSeeder::class,
            KategoriKegiatanSeeder::class,
            LayananSeeder::class,
            KategoriLayananSeeder::class,
            JenisPembayaranSeeder::class,
            LayananKesehatanSeeder::class,
            LayananPersyaratanSeeder::class,
            WilayahKerjaSeeder::class,
            StaffPuskesmasSeeder::class,
        ]);
    }
}
