<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananPersyaratan extends Model
{
    use HasFactory;

    protected $table = 'layanan_persyaratan';

    protected $fillable = [
        'layanan_id',
        'nama_persyaratan',
        'keterangan',
        'urutan',
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}
