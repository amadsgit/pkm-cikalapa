<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffPuskesmas extends Model
{
    use HasFactory;

    protected $table = 'staff_puskesmas';

    protected $fillable = [
        'profile_puskesmas_id',
        'pegawai_id',
        'jabatan_alias',
        'order',
    ];

    /**
     * Relasi ke ProfilePuskesmas
     */
    public function profile()
    {
        return $this->belongsTo(ProfilePuskesmas::class, 'profile_puskesmas_id');
    }

    /**
     * Relasi ke Pegawai
     */
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
}
