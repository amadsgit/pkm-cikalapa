<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // =======================
    // LOGIN PEGAWAI (NIP)
    // =======================
    public function loginPegawai(Request $request)
    {
        $request->validate(
            [
                'nip' => 'required|string',
                'password' => 'required|string|min:6',
            ],
            [
                'nip.required' => 'NIP wajib diisi',
                'password.required' => 'Password wajib diisi',
                'password.min' => 'Password minimal 6 karakter',
            ]
        );

        // cek NIP ada atau tidak
        $user = User::where('nip', $request->nip)->first();

        if (! $user) {
            return back()->withErrors([
                'nip' => 'NIP tidak terdaftar',
            ])->withInput();
        }

        // attempt login
        if (! Auth::attempt([
            'nip' => $request->nip,
            'password' => $request->password,
        ])) {
            return back()->withErrors([
                'password' => 'Password salah',
            ])->withInput();
        }

        // login berhasil
        $request->session()->regenerate();

        // redirect berdasarkan role
        if ($user->hasRole('administrator')) {
            return redirect()->route('dashboard.admin');
        }

        if ($user->hasRole('author')) {
            return redirect()->route('dashboard.author');
        }

        if ($user->hasRole('pegawai')) {
            return redirect('/dashboard/pegawai');
        }

        Auth::logout();

        return redirect('/login')->withErrors([
            'nip' => 'Role akun belum ditentukan',
        ]);
    }

    // =======================
    // LOGIN PENGUNJUNG
    // =======================
    public function loginPengunjung(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ],
            [
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'password.required' => 'Password wajib diisi',
            ]
        );

        if (! Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors([
                'email' => 'Email atau password salah',
            ])->withInput();
        }

        $request->session()->regenerate();

        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Berhasil logout');
    }
}
