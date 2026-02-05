<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WilayahKerja extends Model
{
    use HasFactory;

    protected $table = 'wilayah_kerja';

    protected $fillable = [
        'profile_puskesmas_id',
        'nama',
        'jenis',
        'kode_wilayah',
    ];

    /**
     * Relasi ke ProfilePuskesmas
     */
    public function profile()
    {
        return $this->belongsTo(ProfilePuskesmas::class, 'profile_puskesmas_id');
    }
}
