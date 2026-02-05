<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\KategoriLayanan;
use App\Models\Klaster;
use App\Models\Layanan;
use App\Models\ProfilePuskesmas;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        $klaster = Klaster::all();
        $kategori = KategoriLayanan::all();

        $kategoriSlug = $request->query('kategori');

        $query = Layanan::with(['kategori', 'pembayaran.jenisPembayaran']);

        if ($kategoriSlug && $kategoriSlug !== 'semua') {
            $query->whereHas('kategori', function ($q) use ($kategoriSlug) {
                $q->where('slug', $kategoriSlug);
            });
        }

        $layanan = $query->paginate(6)->withQueryString();
        $profile = ProfilePuskesmas::first();

        return view('landing.layanan', compact('klaster', 'kategori', 'layanan', 'profile'));
    }

    public function show($id)
    {
        $klaster = Klaster::all();
        $kategori = KategoriLayanan::all();
        $profile = ProfilePuskesmas::first();
        // Ambil data informasi berdasarkan ID
        $layananDetail = Layanan::with(['kategori', 'persyaratan', 'prosedur'])->findOrFail($id);

        // Ambil semua layanan lain (tanpa filter kategori), kecuali layanan yang sedang dibuka
        $layanan = Layanan::with(['kategori', 'pembayaran.jenisPembayaran'])
            ->where('id', '!=', $layananDetail->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('landing.detail-layanan', [
            'klaster' => $klaster,
            'layanan' => $layanan,
            'layananDetail' => $layananDetail,
            'kategori' => $kategori,
            'profile' => $profile,
        ]);
    }
}
