<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasiPuskesmas extends Model
{
    use HasFactory;

    protected $table = 'struktur_organisasi_puskesmas';

    protected $fillable = [
        'profile_puskesmas_id',
        'image',
    ];

    public function profile()
    {
        return $this->belongsTo(ProfilePuskesmas::class, 'profile_puskesmas_id');
    }
}
