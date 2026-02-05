<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananProsedur extends Model
{
    use HasFactory;

    protected $table = 'layanan_prosedur';

    protected $fillable = [
        'layanan_id',
        'judul',
        'deskripsi',
        'gambar',
        'urutan',
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }

    // Helper untuk menampilkan URL gambar dengan aman
    public function getGambarUrlAttribute()
    {
        return $this->gambar ? asset('storage/'.$this->gambar) : null;
    }
}
