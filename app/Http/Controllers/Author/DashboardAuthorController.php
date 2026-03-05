<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use App\Models\Kegiatan;

class DashboardAuthorController extends Controller
{
    public function index()
    {
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
