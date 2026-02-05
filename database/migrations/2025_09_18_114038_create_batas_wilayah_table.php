<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('batas_wilayah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_puskesmas_id')->constrained()->onDelete('cascade');
            $table->enum('arah', ['utara', 'timur', 'selatan', 'barat']); // arah mata angin
            $table->string('berbatasan_dengan'); // nama wilayah/puskesmas berbatasan
            $table->text('keterangan')->nullable(); // keterangan tambahan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('batas_wilayah');
    }
};
