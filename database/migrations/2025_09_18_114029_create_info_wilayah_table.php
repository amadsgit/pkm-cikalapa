<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('info_wilayah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_puskesmas_id')->constrained()->onDelete('cascade');
            $table->bigInteger('luas_m2')->nullable(); // luas wilayah dalam m2
            $table->decimal('luas_hektar', 10, 2)->nullable(); // luas dalam hektar
            $table->text('map_embed')->nullable(); // iframe google maps atau link
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('info_wilayah');
    }
};
