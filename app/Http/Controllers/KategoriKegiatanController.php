<?php

namespace App\Http\Controllers;

use App\Models\KategoriKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriKegiatanController extends Controller
{
    public function index()
    {
        $kategori = KategoriKegiatan::latest()->get();

        return view(
            'dashboard.administrator.agendaKegiatan.kategoriKegiatan',
            compact('kategori')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'nullable',
        ]);

        KategoriKegiatan::create([
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

        $kategori = KategoriKegiatan::findOrFail($id);

        $kategori->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
        ]);

        return back()->with('success', 'Kategori berhasil diperbarui ✅');
    }

    public function destroy($id)
    {
        $kategori = KategoriKegiatan::findOrFail($id);
        $kategori->delete();

        return back()->with('success', 'Kategori berhasil dihapus ✅');
    }
}
