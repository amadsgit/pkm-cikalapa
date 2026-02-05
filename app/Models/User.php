<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'pegawai_id',
        'nip',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Ambil nama user dari relasi pegawai
     */
    public function getNamaAttribute()
    {
        return $this->pegawai->nama_pegawai ?? 'User';
    }

    /**
     * Ambil foto user dari relasi pegawai
     */
    public function getFotoAttribute()
    {
        return $this->pegawai->foto ?? 'User';
    }

    /**
     * Ambil nama role pertama user
     */
    public function getRoleNameAttribute()
    {
        return $this->roles->first()->name ?? 'Tanpa Role';
    }

    /**
     * Relasi ke tabel pegawai (1 user = 1 pegawai)
     */
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    /**
     * Relasi ke tabel roles (many-to-many via role_user)
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    /**
     * Helper untuk cek apakah user punya role tertentu
     */
    public function hasRole($roles)
    {
        if (is_array($roles)) {
            return $this->roles->whereIn('slug', $roles)->isNotEmpty();
        }

        return $this->roles->contains('slug', $roles);
    }
}
