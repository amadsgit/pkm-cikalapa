<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\KategoriKegiatan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AgendaController extends Controller
{
    /**
     * Tampilkan daftar agenda kegiatan
     */
    public function index()
    {
        $agenda = Kegiatan::with(['kategori', 'author'])
            ->orderBy('tanggal', 'desc')
            ->get();

        $kategori = KategoriKegiatan::orderBy('nama')->get();

        return view(
            'dashboard.administrator.agendaKegiatan.agendaKegiatan',
            compact('agenda', 'kategori')
        );
    }

    /**
     * Simpan agenda kegiatan
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori_kegiatan,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'waktu' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // upload thumbnail ke folder kegiatan
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')
                ->store('kegiatan', 'public');
        }

        // author (admin / author sama-sama masuk users)
        $validated['user_id'] = Auth::id();

        // slug aman & unik
        $validated['slug'] = Str::slug($validated['judul']).'-'.time();

        Kegiatan::create($validated);

        return redirect()
            ->route('agendaKegiatan.index')
            ->with('success', 'Agenda kegiatan berhasil ditambahkan.');
    }

    /**
     * Hapus agenda kegiatan
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        // hapus thumbnail jika ada
        if ($kegiatan->gambar && Storage::disk('public')->exists($kegiatan->gambar)) {
            Storage::disk('public')->delete($kegiatan->gambar);
        }

        $kegiatan->delete();

        return back()->with('success', 'Agenda kegiatan berhasil dihapus.');
    }
}
