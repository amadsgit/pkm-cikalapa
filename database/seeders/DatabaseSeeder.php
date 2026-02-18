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
            BatasWilayahSeeder::class,
            KategoriInformasiSeeder::class,
            KategoriKegiatanSeeder::class,
            KategoriLayananSeeder::class,
            LayananSeeder::class,
            LayananKesehatanSeeder::class,
            LayananPersyaratanSeeder::class,
            ProfilePuskesmasSeeder::class,
            WilayahKerjaSeeder::class,
            StaffPuskesmasSeeder::class,
        ]);
    }
}
