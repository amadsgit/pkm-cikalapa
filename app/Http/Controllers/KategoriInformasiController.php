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
            'nama' => 'required|string|max:255',
        ]);

        // NORMALISASI INPUT
        $nama = trim($request->nama);
        $slug = Str::slug($nama);

        // RATE LIMIT
        $ip = $request->ip();
        $key = 'rate_limit_kategori_informasi_'.$ip;

        $maxRequest = 30;
        $decay = 60;

        $current = Cache::get($key, 0);

        if ($current >= $maxRequest) {
            return back()->with('error', 'Terlalu banyak request, coba lagi nanti!');
        }

        Cache::put($key, $current + 1, $decay);

        try {

            // CEK DUPLIKAT (lebih ketat)
            $exists = KategoriInformasi::whereRaw('LOWER(nama) = ?', [strtolower($nama)])
                ->orWhere('slug', $slug)
                ->exists();

            if ($exists) {
                return back()->with('error', 'Kategori informasi sudah terdaftar!');
            }

            KategoriInformasi::create([
                'nama' => $nama,
                'slug' => $slug,
            ]);

            Log::info('Create kategori informasi', [
                'ip' => $ip,
                'nama' => $nama,
            ]);

            return back()->with('success', 'Kategori berhasil ditambahkan ✅');

        } catch (\Throwable $e) {

            Log::error('Gagal create kategori informasi', [
                'error' => $e->getMessage(),
                'ip' => $ip,
            ]);

            return back()->with('error', 'Terjadi kesalahan pada sistem.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori = KategoriInformasi::findOrFail($id);

        // NORMALISASI INPUT
        $nama = trim($request->nama);
        $slug = Str::slug($nama);

        try {

            // CEK TIDAK ADA PERUBAHAN
            if (
                strtolower($kategori->nama) === strtolower($nama)
            ) {
                return back()->with('info', 'Tidak ada perubahan data.');
            }

            // CEK DUPLIKAT (kecuali dirinya sendiri)
            $exists = KategoriInformasi::where(function ($query) use ($nama, $slug) {
                $query->whereRaw('LOWER(nama) = ?', [strtolower($nama)])
                    ->orWhere('slug', $slug);
            })
                ->where('id', '!=', $id)
                ->exists();

            if ($exists) {
                return back()->with('error', 'Kategori sudah digunakan!');
            }

            $kategori->update([
                'nama' => $nama,
                'slug' => $slug,
            ]);

            return back()->with('success', 'Kategori berhasil diperbarui ✅');

        } catch (\Throwable $e) {

            Log::error('Gagal update kategori informasi', [
                'error' => $e->getMessage(),
                'id' => $id,
            ]);

            return back()->with('error', 'Terjadi kesalahan pada sistem.');
        }
    }

    public function destroy($id)
    {
        try {

            $kategori = KategoriInformasi::findOrFail($id);
            $kategori->delete();

            return back()->with('success', 'Kategori berhasil dihapus ✅');

        } catch (\Throwable $e) {

            Log::error('Gagal delete kategori informasi', [
                'error' => $e->getMessage(),
                'id' => $id,
            ]);

            return back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
