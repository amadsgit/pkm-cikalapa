<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriLayanan extends Model
{
    use HasFactory;

    protected $table = 'kategori_layanan';

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
        'slug',
    ];

    // Relasi ke tabel layanan (One to Many)
    public function layanan()
    {
        return $this->hasMany(Layanan::class, 'kategori_id');
    }
}
