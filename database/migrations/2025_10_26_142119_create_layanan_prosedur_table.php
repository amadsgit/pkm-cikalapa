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
        Schema::create('layanan_prosedur', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_id')->constrained('layanan')->onDelete('cascade');
            $table->string('judul')->nullable(); // Judul langkah, contoh: "Verifikasi Berkas"
            $table->text('deskripsi')->nullable(); // Penjelasan langkah
            $table->string('gambar')->nullable(); // Path file gambar opsional
            $table->integer('urutan')->default(0); // Urutan langkah
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_prosedur');
    }
};
