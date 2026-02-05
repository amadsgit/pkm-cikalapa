<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\ImagePuskesmas;
use App\Models\Klaster;
use App\Models\ProfilePuskesmas;

class ProfilLandingController extends Controller
{
    public function index()
    {
        $klaster = Klaster::all();
        $imagePuskesmas = ImagePuskesmas::all();
        $profile = ProfilePuskesmas::with(['staff.pegawai', 'infoWilayah.batasWilayah', 'struktur', 'wilayahKerja', 'visi', 'misi', 'infoWilayah'])->first();

        return view('landing.profil', [
            'klaster' => $klaster,
            'profile' => $profile,
            'imagePuskesmas' => $imagePuskesmas,
        ]);
    }
}
