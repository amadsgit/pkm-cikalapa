<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Role;
use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['pegawai', 'roles'])->latest()->paginate(5); // eager load relasi

        // Ambil list pegawai yang belum punya user
        $listPegawai = Pegawai::whereNotIn('id', function($query) {
            $query->select('pegawai_id')->from('users');
        })->orderBy('nama_pegawai', 'asc')->get();

        $listRole = Role::orderBy('name', 'asc')->get(); // untuk select role

        return view('dashboard.administrator.users.index', compact('users', 'listPegawai', 'listRole'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawai,id|unique:users,pegawai_id',
            'nip'        => 'required|string|max:18|unique:users,nip',
            'email'      => 'required|email|max:50|unique:users,email',
            'password'   => 'required|string|min:8',
            'roles'      => 'required|array',
            'roles.*'    => 'exists:roles,id',
        ]);

        // Buat user baru
        $user = User::create([
            'pegawai_id' => $request->pegawai_id,
            'nip'        => $request->nip,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ]);

        // Simpan role di pivot table
        $user->roles()->attach($request->roles);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan. ✅');
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi input
        $request->validate([
            'email' => 'required|email|max:50|unique:users,email,' . $user->id,
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        // Update email
        $user->email = $request->email;
        $user->save();

        // Update roles (sync pivot table)
        $user->roles()->sync($request->roles);

        return redirect()->route('users.index')->with('success', 'User berhasil diupdate. ✅');
    }


    public function destroy($id)
    {
        // Cari user
        $user = User::findOrFail($id);

        // Hapus relasi role dulu (opsional jika pivot table cascade)
        $user->roles()->detach();

        // Hapus user
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus. ✅');
    }
}
