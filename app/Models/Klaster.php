<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klaster extends Model
{
    use HasFactory;

    protected $table = 'layanan_klaster';
    protected $fillable = ['nama', 'deskripsi', 'slug'];
}
