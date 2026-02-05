<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use App\Models\KategoriInformasi;
use App\Models\Klaster;
use App\Models\ProfilePuskesmas;
use Illuminate\Http\Request;

class InformasiLandingController extends Controller
{
    public function index(Request $request)
    {
        $klaster = Klaster::all();
        $kategori = KategoriInformasi::all();

        // Ambil parameter kategori dari URL (?kategori=slug)
        $kategoriSlug = $request->query('kategori');

        $query = Informasi::with(['kategori', 'author'])->latest();

        if ($kategoriSlug && $kategoriSlug !== 'semua') {
            $query->whereHas('kategori', function ($q) use ($kategoriSlug) {
                $q->where('slug', $kategoriSlug);
            });
        }

        $informasi = $query->paginate(6)->withQueryString();

        $profile = ProfilePuskesmas::first();

        return view('landing.informasi', [
            'klaster' => $klaster,
            'categories' => $kategori,
            'informasi' => $informasi,
            'profile' => $profile,
        ]);
    }

    public function show($id)
    {
        $klaster = Klaster::all();
        // Ambil data informasi berdasarkan ID
        $informasi = Informasi::with(['kategori', 'author'])->findOrFail($id);
        $kategori = KategoriInformasi::all();

        $profile = ProfilePuskesmas::first();

        return view('landing.detail-informasi', [
            'klaster' => $klaster,
            'informasi' => $informasi,
            'kategori' => $kategori,
            'profile' => $profile,
        ]);
    }
}
