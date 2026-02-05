<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        'kategori_id',
        'judul',
        'deskripsi',
        'lokasi',
        'waktu',
        'gambar',
        'tanggal',
        'user_id',
        'slug',
    ];

    // Relasi ke user (penulis)
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriKegiatan::class, 'kategori_id');
    }
}
