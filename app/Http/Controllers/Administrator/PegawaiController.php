<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index()
    {
        $listpegawai = Pegawai::latest()->paginate(10);
        return view('dashboard.administrator.kepegawaian.index', compact('listpegawai'));
    }

    public function create()
    {
        return view('dashboard.administrator.kepegawaian.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2000',
            'nama_pegawai' => 'required|string|max:100',
            'nip' => 'required|string|max:18|unique:pegawai,nip',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'jabatan' => 'required|string|max:50',
            'pangkat' => 'required|string|max:50',
            'golongan' => 'required|string|max:10',
            'tmt_sk_jabatan' => 'nullable|date',
            'sk_jabatan' => 'nullable|file|mimes:pdf|max:2000',
            'tmt_sk_pangkat_golongan' => 'nullable|date',
            'sk_pangkat_golongan' => 'nullable|file|mimes:pdf|max:2000',
            'status_kepegawaian' => 'required|string|max:50',
            'tgl_mulai_kerja' => 'required|date',
            'str' => 'nullable|file|mimes:pdf|max:2000',
            'tgl_akhir_str' => 'nullable|date',
            'sip' => 'nullable|file|mimes:pdf|max:2000',
            'tgl_akhir_sip' => 'nullable|date',
            'pendidikan_terakhir' => 'required|string|max:100',
            'jurusan' => 'required|string|max:100',
            'hp' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ]);

        // Handle upload foto (jika ada)
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pegawai/foto', 'public');
        }

        // 🔐 Enkripsi dan simpan file PDF ke storage/app/private/...
        if ($request->hasFile('sk_jabatan')) {
            $validated['sk_jabatan'] = $this->encryptAndStoreFile($request->file('sk_jabatan'), 'sk_jabatan');
        }

        if ($request->hasFile('sk_pangkat_golongan')) {
            $validated['sk_pangkat_golongan'] = $this->encryptAndStoreFile($request->file('sk_pangkat_golongan'), 'sk_pangkat_golongan');
        }

        if ($request->hasFile('str')) {
            $validated['str'] = $this->encryptAndStoreFile($request->file('str'), 'str');
        }

        if ($request->hasFile('sip')) {
            $validated['sip'] = $this->encryptAndStoreFile($request->file('sip'), 'sip');
        }

        Pegawai::create($validated);

        return redirect()->route('admin.ketatausahaan.pegawai')->with('success', 'Pegawai berhasil ditambahkan. ✅');
    }


    public function edit(Pegawai $pegawai)
    {
        return view('dashboard.administrator.kepegawaian.edit', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $validated = $request->validate([
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2000',
            'nama_pegawai' => 'required|string|max:100',
            'nip' => 'required|string|max:18|unique:pegawai,nip,' . $pegawai->id,
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'jabatan' => 'required|string|max:50',
            'pangkat' => 'required|string|max:50',
            'golongan' => 'required|string|max:10',
            'tmt_sk_jabatan' => 'nullable|date',
            'sk_jabatan' => 'nullable|file|mimes:pdf|max:2000',
            'tmt_sk_pangkat_golongan' => 'nullable|date',
            'sk_pangkat_golongan' => 'nullable|file|mimes:pdf|max:2000',
            'status_kepegawaian' => 'required|string|max:50',
            'tgl_mulai_kerja' => 'required|date',
            'str' => 'nullable|file|mimes:pdf|max:2000',
            'tgl_akhir_str' => 'nullable|date',
            'sip' => 'nullable|file|mimes:pdf|max:2000',
            'tgl_akhir_sip' => 'nullable|date',
            'pendidikan_terakhir' => 'required|string|max:100',
            'jurusan' => 'required|string|max:100',
            'hp' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ]);


        if ($request->hasFile('foto')) {
            if ($pegawai->foto && Storage::disk('public')->exists($pegawai->foto)) {
                Storage::disk('public')->delete($pegawai->foto);
            }
            $validated['foto'] = $request->file('foto')->store('pegawai/foto', 'public');
        }

        if ($request->hasFile('sk_jabatan')) {
            if ($pegawai->sk_jabatan && Storage::disk('local')->exists($pegawai->sk_jabatan)) {
                Storage::disk('local')->delete($pegawai->sk_jabatan);
            }
            $validated['sk_jabatan'] = $this->encryptAndStoreFile($request->file('sk_jabatan'), 'sk_jabatan');
        }

        if ($request->hasFile('sk_pangkat_golongan')) {
            if ($pegawai->sk_pangkat_golongan && Storage::disk('local')->exists($pegawai->sk_pangkat_golongan)) {
                Storage::disk('local')->delete($pegawai->sk_pangkat_golongan);
            }
            $validated['sk_pangkat_golongan'] = $this->encryptAndStoreFile($request->file('sk_pangkat_golongan'), 'sk_pangkat_golongan');
        }

        if ($request->hasFile('str')) {
            if ($pegawai->str && Storage::disk('local')->exists($pegawai->str)) {
                Storage::disk('local')->delete($pegawai->str);
            }
            $validated['str'] = $this->encryptAndStoreFile($request->file('str'), 'str');
        }

        if ($request->hasFile('sip')) {
            if ($pegawai->sip && Storage::disk('local')->exists($pegawai->sip)) {
                Storage::disk('local')->delete($pegawai->sip);
            }
            $validated['sip'] = $this->encryptAndStoreFile($request->file('sip'), 'sip');
        }

        $pegawai->update($validated);

        return redirect()->route('admin.ketatausahaan.pegawai')
            ->with('success', 'Data pegawai berhasil diupdate. ✅');
    }


    private function encryptAndStoreFile($file, $folder)
    {
        // Ambil isi file
        $contents = file_get_contents($file->getRealPath());

        // Enkripsi
        $encrypted = encrypt($contents);

        // Buat nama file unik
        $fileName = uniqid() . '_' . $file->getClientOriginalName();

        // Simpan ke storage/app/private/{folder}
        Storage::disk('local')->put("private/{$folder}/{$fileName}", $encrypted);

        return "private/{$folder}/{$fileName}";
    }


    public function destroy(Pegawai $pegawai)
    {
        // Hapus foto (kalau ada)
        if ($pegawai->foto && Storage::disk('public')->exists($pegawai->foto)) {
            Storage::disk('public')->delete($pegawai->foto);
        }

        // Hapus file PDF terenkripsi (sk_jabatan, sk_pangkat_golongan, str, sip)
        $fileFields = ['sk_jabatan', 'sk_pangkat_golongan', 'str', 'sip'];
        foreach ($fileFields as $field) {
            if ($pegawai->$field && Storage::disk('local')->exists($pegawai->$field)) {
                Storage::disk('local')->delete($pegawai->$field);
            }
        }

        // Hapus data pegawai
        $pegawai->delete();

        return redirect()->route('admin.ketatausahaan.pegawai')
            ->with('success', 'Data pegawai berhasil dihapus. ✅');
    }

}
