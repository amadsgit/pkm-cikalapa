<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use App\Models\Kegiatan;
use App\Models\Klaster;
use App\Models\Pegawai;
use App\Models\PPN;
use App\Models\ProfilePuskesmas;
use App\Models\SPM;

class BerandaController extends Controller
{
    public function index()
    {
        // ambil data kepala puskesmas
        $kepalaPuskesmas = Pegawai::where('jabatan', 'Kepala Puskesmas')->first();
        $spm = SPM::all();
        $ppn = PPN::all();
        $klaster = Klaster::all();
        $kegiatan = Kegiatan::with(['kategori', 'author'])
            ->orderBy('tanggal', 'desc')
            ->take(10)
            ->get();

        $informasi = Informasi::with(['kategori', 'author'])
            ->orderBy('tanggal', 'desc')
            ->take(10)
            ->get();

        $profile = ProfilePuskesmas::first();

        return view('landing.beranda', compact('kepalaPuskesmas', 'spm', 'ppn', 'kegiatan', 'informasi', 'klaster', 'profile'));
    }
}
