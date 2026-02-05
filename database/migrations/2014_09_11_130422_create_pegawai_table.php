<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable(); // disimpan terenkripsi
            $table->string('nama_pegawai', 100);
            $table->string('nip', 18)->unique(); // foreign key bisa ditambahkan jika tabel users tersedia
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin', 20);
            $table->string('jabatan', 50);
            $table->string('pangkat', 50);
            $table->string('golongan', 10);
            $table->date('tmt_sk_jabatan')->nullable();
            $table->string('sk_jabatan')->nullable();
            $table->date('tmt_sk_pangkat_golongan')->nullable();
            $table->string('sk_pangkat_golongan')->nullable();
            $table->string('status_kepegawaian', 50);
            $table->string('str')->nullable(); // disimpan terenkripsi
            $table->date('tgl_akhir_str')->nullable();
            $table->string('sip')->nullable(); // disimpan terenkripsi
            $table->date('tgl_akhir_sip')->nullable();
            $table->string('pendidikan_terakhir', 100);
            $table->string('jurusan', 100);
            $table->string('hp', 12)->nullable();
            $table->string('alamat', 200)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
