<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pegawai;

class PdfNominatifController extends Controller
{
    public function index() {
        $nominatifPegawai = Pegawai::all();
        $kepalaPuskesmas = Pegawai::where('jabatan', 'Kepala Puskesmas')->first();
        return view('dashboard.administrator.kepegawaian.nominatif', compact('nominatifPegawai', 'kepalaPuskesmas'));
    }

    public function preview()
    {
        $nominatifPegawai = Pegawai::orderBy('id')->get();
        $kepalaPuskesmas = Pegawai::where('jabatan', 'Kepala Puskesmas')->first();

        $pdf = PDF::loadView('exports.nominatif-pdf', [
                    'nominatifPegawai' => $nominatifPegawai,
                    'kepalaPuskesmas' => $kepalaPuskesmas,
                ])->setPaper([0, 0, 595.276, 935.433], 'landscape');

        return $pdf->stream('nominatif.pdf'); // stream = embed di browser
    }
}
