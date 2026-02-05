<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfDukController extends Controller
{
    public function index() {
        $dukPegawai = Pegawai::all();
        $kepalaPuskesmas = Pegawai::where('jabatan', 'Kepala Puskesmas')->first();
        return view('dashboard.administrator.kepegawaian.duk', compact('dukPegawai', 'kepalaPuskesmas'));
    }

    public function preview()
    {
        $dukPegawai = Pegawai::orderBy('pangkat')->get();
        $kepalaPuskesmas = Pegawai::where('jabatan', 'Kepala Puskesmas')->first();

        $pdf = PDF::loadView('exports.duk-pdf', [
                    'dukPegawai' => $dukPegawai,
                    'kepalaPuskesmas' => $kepalaPuskesmas,
                ])
                  ->setPaper([0, 0, 595.276, 935.433], 'landscape');

        return $pdf->stream('duk.pdf'); // stream = embed di browser
    }
}
