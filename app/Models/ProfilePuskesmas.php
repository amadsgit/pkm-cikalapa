<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePuskesmas extends Model
{
    use HasFactory;

    protected $table = 'profile_puskesmas';

    protected $fillable = [
        'nama_puskesmas',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'telepon',
        'whatsapp',
        'email',
        'website',
        'alamat',
        'logo',
    ];

    public function images()
    {
        return $this->hasMany(ImagePuskesmas::class, 'profile_puskesmas_id');
    }

    public function visi()
    {
        return $this->hasOne(Visi::class, 'profile_puskesmas_id');
    }

    public function sejarah()
    {
        return $this->hasOne(SejarahPuskesmas::class, 'profile_puskesmas_id');
    }

    public function misi()
    {
        return $this->hasMany(Misi::class, 'profile_puskesmas_id')->orderBy('order', 'asc');
    }

    public function struktur()
    {
        return $this->hasOne(StrukturOrganisasiPuskesmas::class, 'profile_puskesmas_id');
    }

    public function staff()
    {
        return $this->hasMany(StaffPuskesmas::class, 'profile_puskesmas_id')->orderBy('order', 'asc');
    }

    public function infoWilayah()
    {
        return $this->hasOne(InfoWilayah::class, 'profile_puskesmas_id');
    }

    public function batasWilayah()
    {
        return $this->hasMany(BatasWilayah::class, 'profile_puskesmas_id');
    }

    public function wilayahKerja()
    {
        return $this->hasMany(WilayahKerja::class, 'profile_puskesmas_id');
    }
}
