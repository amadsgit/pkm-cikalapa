<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\ImagePuskesmas;
use App\Models\Misi;
use App\Models\ProfilePuskesmas;
use App\Models\SejarahPuskesmas;
use App\Models\StrukturOrganisasiPuskesmas;
use App\Models\Visi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profilePuskesmas()
    {
        // ambil satu record (jika ada)
        $profile = ProfilePuskesmas::first();
        $imagePuskesmas = ImagePuskesmas::first();

        // kembalikan model (bisa null jika belum ada)
        return view('dashboard.administrator.tentangPuskesmas.profilePuskesmas', compact('profile', 'imagePuskesmas'));
    }

    public function update(Request $request, $id)
    {
        $profile = ProfilePuskesmas::findOrFail($id);

        $validated = $request->validate([
            'nama_puskesmas' => 'required|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'kabupaten' => 'nullable|string|max:255',
            'provinsi' => 'nullable|string|max:255',
            'kode_pos' => 'nullable|string|max:10',
            'telepon' => 'nullable|string|max:50',
            'whatsapp' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Cek apakah ada file logo baru
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($profile->logo && \Storage::disk('public')->exists($profile->logo)) {
                \Storage::disk('public')->delete($profile->logo);
            }

            // Simpan logo baru
            $path = $request->file('logo')->store('logos', 'public');
            $validated['logo'] = $path;
        }

        // Update data profile
        $profile->update($validated);

        return back()->with('success', 'Informasi Puskesmas berhasil diperbarui!');
    }

    public function storeImage(Request $request)
    {
        $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'caption' => 'nullable|string|max:255',
        ]);

        $profile = ProfilePuskesmas::first();

        if (! $profile) {
            return back()->with('error', 'Data profil puskesmas belum ada.');
        }

        // Simpan file gambar ke storage
        $path = $request->file('image_path')->store('image_puskesmas', 'public');

        ImagePuskesmas::create([
            'profile_puskesmas_id' => $profile->id,
            'image_path' => $path,
            'caption' => $request->caption,
        ]);

        return back()->with('success', 'Gambar berhasil diunggah.');
    }

    public function deleteImage(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:image_puskesmas,id',
        ]);

        $image = ImagePuskesmas::findOrFail($request->id);

        // Hapus file dari storage
        if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        $image->delete();

        return back()->with('success', 'Gambar berhasil dihapus.');
    }

    public function updateVisi(Request $request)
    {
        $request->validate(['content' => 'required|string']);
        $visi = Visi::firstOrNew(['profile_puskesmas_id' => 1]);
        $visi->content = $request->content;
        $visi->save();

        return back()->with('success', 'Visi berhasil diperbarui.');
    }

    public function storeMisi(Request $request)
    {
        $request->validate(['content' => 'required|string']);
        Misi::create([
            'profile_puskesmas_id' => 1,
            'content' => $request->content,
            'order' => Misi::where('profile_puskesmas_id', 1)->count() + 1,
        ]);

        return back()->with('success', 'Misi berhasil ditambahkan.');
    }

    public function updateMisi(Request $request, $id)
    {
        $request->validate(['content' => 'required|string']);
        $misi = Misi::findOrFail($id);
        $misi->update(['content' => $request->content]);

        return back()->with('success', 'Misi berhasil diperbarui.');
    }

    public function destroyMisi($id)
    {
        $misi = Misi::findOrFail($id);
        $misi->delete();

        return back()->with('success', 'Misi berhasil dihapus.');
    }

    public function updateSejarah(Request $request)
    {
        $request->validate(['content' => 'required|string']);

        $sejarah = SejarahPuskesmas::firstOrNew(['profile_puskesmas_id' => 1]);
        $sejarah->content = $request->content;
        $sejarah->save();

        return back()->with('success', 'Sejarah Puskesmas berhasil diperbarui.');
    }

    public function storeStruktur(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $profile = ProfilePuskesmas::firstOrFail();

        // hapus gambar lama jika ada
        if ($profile->struktur && $profile->struktur->image) {
            Storage::delete('public/'.$profile->struktur->image);
            $profile->struktur->delete();
        }

        $path = $request->file('image')->store('struktur_organisasi', 'public');

        StrukturOrganisasiPuskesmas::create([
            'profile_puskesmas_id' => $profile->id,
            'image' => $path,
        ]);

        return back()->with('success', 'Gambar struktur organisasi berhasil diperbarui.');
    }

    public function deleteStruktur(Request $request)
    {
        $struktur = StrukturOrganisasiPuskesmas::findOrFail($request->id);

        if ($struktur->image) {
            Storage::delete('public/'.$struktur->image);
        }

        $struktur->delete();

        return back()->with('success', 'Gambar struktur organisasi berhasil dihapus.');
    }
}
