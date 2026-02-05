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
        Schema::create('layanan_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_id')->constrained('layanan')->onDelete('cascade');
            $table->foreignId('jenis_pembayaran_id')->constrained('jenis_pembayaran')->onDelete('cascade');
            $table->decimal('tarif', 12, 2)->default(0.00); // 0.00 artinya gratis / ditanggung
            $table->string('keterangan')->nullable(); // mis: 'Gratis untuk peserta BPJS'
            $table->timestamps();

            $table->unique(['layanan_id', 'jenis_pembayaran_id'], 'layanan_pembayaran_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_pembayaran');
    }
};
