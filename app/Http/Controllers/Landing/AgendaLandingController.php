<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\KategoriKegiatan;
use App\Models\Kegiatan;
use App\Models\Klaster;
use App\Models\ProfilePuskesmas;
use Illuminate\Http\Request;

class AgendaLandingController extends Controller
{
    public function index(Request $request)
    {
        $klaster = Klaster::all();
        $kategori = KategoriKegiatan::all();

        // Ambil parameter kategori dari URL (?kategori=slug)
        $kategoriSlug = $request->query('kategori');

        $query = Kegiatan::with(['kategori', 'author'])->latest();

        if ($kategoriSlug && $kategoriSlug !== 'semua') {
            $query->whereHas('kategori', function ($q) use ($kategoriSlug) {
                $q->where('slug', $kategoriSlug);
            });
        }

        $agenda = $query->paginate(6)->withQueryString();

        $profile = ProfilePuskesmas::first();

        return view('landing.agenda', [
            'klaster' => $klaster,
            'categories' => $kategori,
            'agenda' => $agenda,
            'profile' => $profile,
        ]);
    }

    public function show($id)
    {
        $klaster = Klaster::all();
        // Ambil data informasi berdasarkan ID
        $kegiatan = Kegiatan::with(['kategori', 'author'])->findOrFail($id);
        $kategori = KategoriKegiatan::all();

        $profile = ProfilePuskesmas::first();

        return view('landing.detail-agenda', [
            'klaster' => $klaster,
            'kegiatan' => $kegiatan,
            'kategori' => $kategori,
            'profile' => $profile,
        ]);
    }
}
