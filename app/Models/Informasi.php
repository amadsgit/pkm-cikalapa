<?php

namespace App\Models;

use App\Models\User;
use App\Models\KategoriInformasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Informasi extends Model
{
    use HasFactory;

    protected $table = 'informasi';

    protected $fillable = [
        'kategori_id',
        'judul',
        'deskripsi',
        'gambar',
        'tanggal',
        'user_id',
        'slug',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriInformasi::class, 'kategori_id');
    }
}
