<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatasWilayah extends Model
{
    use HasFactory;

    protected $table = 'batas_wilayah';

    protected $fillable = [
        'profile_puskesmas_id',
        'arah',
        'berbatasan_dengan',
        'keterangan',
    ];

    public function profile()
    {
        return $this->belongsTo(ProfilePuskesmas::class, 'profile_puskesmas_id');
    }

    public function infoWilayah()
    {
        // foreignKey on this table, ownerKey on InfoWilayah
        return $this->belongsTo(InfoWilayah::class, 'profile_puskesmas_id', 'profile_puskesmas_id');
    }
}
