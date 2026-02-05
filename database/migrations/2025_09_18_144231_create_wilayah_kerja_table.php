<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wilayah_kerja', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_puskesmas_id')->nullable(); // relasi ke profil puskesmas
            $table->string('nama'); // nama kelurahan/desa
            $table->enum('jenis', ['kelurahan', 'desa'])->default('kelurahan'); // tipe wilayah
            $table->string('kode_wilayah')->nullable(); // opsional: kode BPS/Kemendagri
            $table->timestamps();

            // foreign key
            $table->foreign('profile_puskesmas_id')
                ->references('id')->on('profile_puskesmas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilayah_kerja');
    }
};
