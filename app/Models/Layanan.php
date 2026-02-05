<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';

    protected $fillable = [
        'kategori_id',
        'nama_layanan',
        'deskripsi',
        'lokasi',
        'jadwal',
        'kontak',
        'slug',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriLayanan::class, 'kategori_id');
    }

    public function persyaratan()
    {
        return $this->hasMany(LayananPersyaratan::class, 'layanan_id')->orderBy('urutan');
    }

    public function prosedur()
    {
        return $this->hasMany(LayananProsedur::class, 'layanan_id')->orderBy('urutan');
    }

    // Many-to-many ke JenisPembayaran melalui pivot layanan_pembayaran
    public function pembayaran()
    {
        return $this->hasMany(LayananPembayaran::class, 'layanan_id');
    }

    // Helper: dapatkan tarif untuk jenis pembayaran tertentu (kode atau id)
    public function tarifUntuk($jenisKodeOrId)
    {
        $pembayaran = is_numeric($jenisKodeOrId)
            ? $this->pembayaran()->where('jenis_pembayaran.id', $jenisKodeOrId)->first()
            : $this->pembayaran()->where('jenis_pembayaran.kode', $jenisKodeOrId)->first();

        return $pembayaran ? $pembayaran->pivot->tarif : null;
    }
}
