<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagePuskesmas extends Model
{
    use HasFactory;

    protected $table = 'image_puskesmas';

    protected $fillable = [
        'profile_puskesmas_id',
        'image_path',
        'caption',
        'order',
    ];

    /**
     * Relasi ke ProfilePuskesmas (gambar milik satu profil)
     */
    public function profile()
    {
        return $this->belongsTo(ProfilePuskesmas::class, 'profile_puskesmas_id');
    }
}
