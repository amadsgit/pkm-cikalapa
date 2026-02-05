<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('staff_puskesmas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_puskesmas_id')
                ->constrained('profile_puskesmas')
                ->onDelete('cascade');
            $table->foreignId('pegawai_id')
                ->constrained('pegawai')
                ->onDelete('cascade');

            // Field tambahan untuk menyesuaikan tampilan struktur staff
            $table->string('jabatan_alias')->nullable(); // alias jabatan khusus tampilan
            $table->integer('order')->default(0); // urutan staff dalam daftar

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('staff_puskesmas');
    }
};
