<?php

namespace App\Models;

use App\Models\Informasi;
use Illuminate\Database\Eloquent\Model;

class KategoriInformasi extends Model
{
    protected $table = 'kategori_informasi';
    protected $fillable = ['nama', 'deskripsi', 'slug'];

    public function informasi()
    {
        return $this->hasMany(Informasi::class, 'kategori_id');
    }
}

