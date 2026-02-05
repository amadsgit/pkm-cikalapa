<?php

namespace App\Models;

use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\Model;

class KategoriKegiatan extends Model
{
    protected $table = 'kategori_kegiatan';
    protected $fillable = ['nama', 'deskripsi', 'slug'];

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'kategori_id');
    }
}

