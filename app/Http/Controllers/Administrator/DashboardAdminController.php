<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use App\Models\Layanan;
use App\Models\Pegawai;

class DashboardAdminController extends Controller
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
        $jumlahLayanan = Layanan::count();

        return view('dashboard.administrator.home', compact(
            'jumlahPegawai',
            'tenagaMedisAktif',
            'jumlahInformasi',
            'jumlahLayanan'
        ));
    }
}
