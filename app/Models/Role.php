<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    /**
     * Relasi ke users (many-to-many via role_user)
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user')
                    ->withTimestamps();
    }
}
