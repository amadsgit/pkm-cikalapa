<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;

class DashboardAuthorController extends Controller
{
    public function index()
    {
        // jumlah pegawai
        $jumlahPegawai = Pegawai::count();

        // tenaga medis aktif (dokter, bidan, perawat)
        $tenagaMedisAktif = Pegawai::where(function ($query) {
            $query->where('jabatan', 'like', '%dokter%')
                ->orWhere('jabatan', 'like', '%bidan%')
                ->orWhere('jabatan', 'like', '%perawat%');
        })->count();

        // jumlah informasi publik
        $jumlahInformasi = Informasi::count();

        // jumlah layanan kesehatan
        $jumlahKegiatan = Kegiatan::count();

        return view('dashboard.administrator.author', compact(
            'jumlahInformasi',
            'jumlahKegiatan'
        ));
    }
}
