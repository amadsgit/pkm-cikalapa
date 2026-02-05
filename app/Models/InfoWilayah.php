<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoWilayah extends Model
{
    use HasFactory;

    protected $table = 'info_wilayah';

    protected $fillable = [
        'profile_puskesmas_id',
        'luas_m2',
        'luas_hektar',
        'map_embed',
    ];

    public function profile()
    {
        return $this->belongsTo(ProfilePuskesmas::class, 'profile_puskesmas_id');
    }

    public function batasWilayah()
    {
        // foreignKey on BatasWilayah, localKey on InfoWilayah
        return $this->hasMany(BatasWilayah::class, 'profile_puskesmas_id', 'profile_puskesmas_id');
    }
}
