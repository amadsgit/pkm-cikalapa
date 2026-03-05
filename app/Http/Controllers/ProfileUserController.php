<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProfileUserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // ambil data pegawai berdasarkan user login
        $pegawai = Pegawai::where('nip', $user->nip ?? null)->first();

        $peringatanSTR = false;
        $peringatanSIP = false;

        if ($pegawai) {

            if ($pegawai->tgl_akhir_str) {
                $sisaSTR = Carbon::parse($pegawai->tgl_akhir_str)->diffInDays(now(), false);
                if ($sisaSTR <= 30) {
                    $peringatanSTR = true;
                }
            }

            if ($pegawai->tgl_akhir_sip) {
                $sisaSIP = Carbon::parse($pegawai->tgl_akhir_sip)->diffInDays(now(), false);
                if ($sisaSIP <= 30) {
                    $peringatanSIP = true;
                }
            }
        }

        return view('dashboard.profile', compact(
            'user',
            'pegawai',
            'peringatanSTR',
            'peringatanSIP'
        ));
    }
}
