<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananPembayaran extends Model
{
    use HasFactory;

    protected $table = 'layanan_pembayaran';

    protected $fillable = [
        'layanan_id',
        'jenis_pembayaran_id',
        'tarif',
        'keterangan',
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }

    public function jenisPembayaran()
    {
        return $this->belongsTo(JenisPembayaran::class, 'jenis_pembayaran_id');
    }
}
