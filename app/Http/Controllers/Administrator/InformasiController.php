<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use App\Models\KategoriInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InformasiController extends Controller
{
    /**
     * Tampilkan daftar informasi
     */
    public function index()
    {
        $informasi = Informasi::with(['kategori', 'author'])
            ->orderBy('tanggal', 'desc')
            ->get();
        $kategori = KategoriInformasi::orderBy('nama')->get();

        return view('dashboard.administrator.informasiPublik.informasiPublik', compact('informasi', 'kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori_informasi,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')
                ->store('informasi', 'public');
        }

        // Ambil user login TANPA peduli role
        $validated['user_id'] = Auth::id();

        // Slug aman
        $validated['slug'] = Str::slug($validated['judul']).'-'.time();

        Informasi::create($validated);

        return redirect()
            ->route('informasiPublik.index')
            ->with('success', 'Informasi berhasil ditambahkan.');
    }

    /**
     * Hapus informasi
     */
    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);

        if ($informasi->gambar && Storage::disk('public')->exists($informasi->gambar)) {
            Storage::disk('public')->delete($informasi->gambar);
        }

        $informasi->delete();

        return back()->with('success', 'Informasi berhasil dihapus.');
    }
}
