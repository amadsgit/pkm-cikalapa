<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\InfoWilayah;
use App\Models\ProfilePuskesmas;
use App\Models\WilayahKerja;
use Illuminate\Http\Request;

class GeografisController extends Controller
{
    public function wilayahKerjaPuskesmas()
    {
        // ambil satu record (jika ada)
        $profile = ProfilePuskesmas::first();

        // kembalikan model (bisa null jika belum ada)
        return view('dashboard.administrator.geografisWilayah.geografisWilayah', compact('profile'));
    }

    public function storeWilayahKerja(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jenis' => 'required|string',
            'kode_wilayah' => 'required|string|max:50',
        ]);

        $profile = ProfilePuskesmas::firstOrFail();

        WilayahKerja::create([
            'profile_puskesmas_id' => $profile->id,
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'kode_wilayah' => $request->kode_wilayah,
        ]);

        return back()->with('success', 'Data wilayah berhasil ditambahkan.');
    }

    public function updateWilayahKerja(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jenis' => 'required|string',
            'kode_wilayah' => 'required|string|max:50',
        ]);

        $wilayah = WilayahKerja::findOrFail($id);
        $wilayah->update($request->only('nama', 'jenis', 'kode_wilayah'));

        return back()->with('success', 'Data wilayah berhasil diperbarui.');
    }

    public function deleteWilayahKerja($id)
    {
        $wilayah = WilayahKerja::findOrFail($id);
        $wilayah->delete();

        return back()->with('success', 'Data wilayah berhasil dihapus.');
    }

    public function storeLuasWilayah(Request $request)
    {
        $request->validate([
            'luas_m2' => 'required|numeric',
            'luas_hektar' => 'required|numeric',
            'map_embed' => 'nullable|string',
        ]);

        $profile = ProfilePuskesmas::firstOrFail();

        InfoWilayah::create([
            'profile_puskesmas_id' => $profile->id,
            'luas_m2' => $request->luas_m2,
            'luas_hektar' => $request->luas_hektar,
            'map_embed' => $request->map_embed,
        ]);

        return back()->with('success', 'Data luas wilayah berhasil ditambahkan.');
    }

    public function updateLuasWilayah(Request $request, $id)
    {
        $request->validate([
            'luas_m2' => 'required|numeric',
            'luas_hektar' => 'required|numeric',
            'map_embed' => 'nullable|string',
        ]);

        $info = InfoWilayah::findOrFail($id);
        $info->update($request->only('luas_m2', 'luas_hektar', 'map_embed'));

        return back()->with('success', 'Data luas wilayah berhasil diperbarui.');
    }

    public function deleteLuasWilayah($id)
    {
        $info = InfoWilayah::findOrFail($id);
        $info->delete();

        return back()->with('success', 'Data luas wilayah berhasil dihapus.');
    }
}
