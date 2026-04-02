<?php

namespace App\Http\Controllers;

use App\Models\KategoriInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class KategoriInformasiController extends Controller
{
    public function index()
    {
        $kategori = KategoriInformasi::latest()->paginate(5);

        return view(
            'dashboard.administrator.informasiPublik.kategoriInformasi',
            compact('kategori')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'nullable',
        ]);

        // RATE LIMIT MANUAL (per IP)
        $ip = $request->ip();
        $key = 'rate_limit_kategori_informasi_'.$ip;

        $maxRequest = 30; // 30 request
        $decay = 60; // 1 menit

        $current = Cache::get($key, 0);

        if ($current >= $maxRequest) {
            return back()->with('error', 'Terlalu banyak request, coba lagi nanti!');
        }

        Cache::put($key, $current + 1, $decay);

        try {
            $slug = Str::slug($request->nama);

            // CEK DUPLIKAT (nama atau slug)
            $exists = KategoriInformasi::where('slug', $slug)
                ->orWhere('nama', $request->nama)
                ->exists();

            if ($exists) {
                return back()->with('error', 'Kategori informasi sudah terdaftar!');
            }

            KategoriInformasi::create([
                'nama' => $request->nama,
                'slug' => $slug,
            ]);

            // LOGGING
            Log::info('Create kategori informasi', [
                'ip' => $ip,
                'nama' => $request->nama,
            ]);

            return back()->with('success', 'Kategori berhasil ditambahkan ✅');

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan, coba lagi');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'nullable',
        ]);

        $kategori = KategoriInformasi::findOrFail($id);

        $kategori->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
        ]);

        return back()->with('success', 'Kategori berhasil diperbarui ✅');
    }

    public function destroy($id)
    {
        $kategori = KategoriInformasi::findOrFail($id);
        $kategori->delete();

        return back()->with('success', 'Kategori berhasil dihapus ✅');
    }
}
