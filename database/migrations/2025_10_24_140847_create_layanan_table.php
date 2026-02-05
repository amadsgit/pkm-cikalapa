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
        Schema::create('layanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori_layanan')->onDelete('cascade');
            $table->string('nama_layanan', 150);
            $table->text('deskripsi')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('jadwal')->nullable();
            $table->string('kontak', 100)->nullable();
            $table->string('slug')->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan');
    }
};
