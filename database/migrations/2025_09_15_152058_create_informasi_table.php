<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('informasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->date('tanggal')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategori_informasi')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('informasi');
    }
};
