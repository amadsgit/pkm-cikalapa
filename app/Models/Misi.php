<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Misi extends Model
{
    use HasFactory;

    protected $table = 'misi';

    protected $fillable = [
        'profile_puskesmas_id',
        'content',
        'order',
    ];

    /**
     * Relasi ke ProfilePuskesmas
     */
    public function profile()
    {
        return $this->belongsTo(ProfilePuskesmas::class, 'profile_puskesmas_id');
    }
}
