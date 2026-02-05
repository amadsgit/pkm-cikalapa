<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visi extends Model
{
    use HasFactory;

    protected $table = 'visi';

    protected $fillable = [
        'profile_puskesmas_id',
        'content',
    ];

    public function profile()
    {
        return $this->belongsTo(ProfilePuskesmas::class, 'profile_puskesmas_id');
    }
}
