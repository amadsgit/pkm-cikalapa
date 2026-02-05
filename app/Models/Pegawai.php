<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'foto',
        'nama_pegawai',
        'nip',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'jabatan',
        'pangkat',
        'golongan',
        'tmt_sk_jabatan',
        'sk_jabatan',
        'tmt_sk_pangkat_golongan',
        'sk_pangkat_golongan',
        'status_kepegawaian',
        'tgl_mulai_kerja',
        'str',
        'tgl_akhir_str',
        'sip',
        'tgl_akhir_sip',
        'pendidikan_terakhir',
        'jurusan',
        'hp',
        'alamat',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'pegawai_id');
    }

    public function staffPuskesmas()
    {
        return $this->hasOne(StaffPuskesmas::class, 'pegawai_id');
    }
}
