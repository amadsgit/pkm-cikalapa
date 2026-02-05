<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPembayaran extends Model
{
    use HasFactory;

    protected $table = 'jenis_pembayaran';

    protected $fillable = [
        'nama',
        'kode',
        'keterangan',
    ];

    public function layanan()
    {
        return $this->belongsToMany(
            Layanan::class,
            'layanan_pembayaran',
            'jenis_pembayaran_id',
            'layanan_id'
        )->withPivot('tarif', 'keterangan')
            ->withTimestamps();
    }
}
