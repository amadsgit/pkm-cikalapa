<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('struktur_organisasi_puskesmas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_puskesmas_id')
                ->constrained('profile_puskesmas')
                ->onDelete('cascade');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('struktur_organisasi_puskesmas');
    }
};
