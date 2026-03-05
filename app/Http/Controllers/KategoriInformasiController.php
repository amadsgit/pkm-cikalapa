<?php

namespace App\Http\Controllers;

use App\Models\KategoriInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriInformasiController extends Controller
{
    public function index()
    {
        $kategori = KategoriInformasi::latest()->get();

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

        KategoriInformasi::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
        ]);

        return back()->with('success', 'Kategori berhasil ditambahkan ✅');
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
