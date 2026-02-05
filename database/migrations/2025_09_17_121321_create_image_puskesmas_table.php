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
        Schema::create('image_puskesmas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_puskesmas_id')
                ->constrained('profile_puskesmas')
                ->onDelete('cascade');
            $table->string('image_path'); // path gambar slider
            $table->string('caption')->nullable(); // keterangan gambar
            $table->integer('order')->default(0); // urutan slider
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_puskesmas');
    }
};
