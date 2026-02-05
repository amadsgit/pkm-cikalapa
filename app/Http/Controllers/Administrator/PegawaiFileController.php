<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PegawaiFileController extends Controller
{
    public function preview($type, $filename)
    {
        $path = "private/{$type}/{$filename}";

        if (!Storage::exists($path)) {
            abort(404, 'File tidak ditemukan.');
        }

        try {
            // Ambil konten terenkripsi
            $encryptedContent = Storage::get($path);

            // Dekripsi isi file
            $decryptedContent = decrypt($encryptedContent);

            // Tentukan MIME type dari ekstensi (atau pakai default pdf)
            $mimeType = File::mimeType(storage_path("app/{$path}")) ?? 'application/pdf';

            // Kembalikan response
            return response($decryptedContent, 200)->header('Content-Type', $mimeType);

        } catch (\Exception $e) {
            return response("Gagal menampilkan file: " . $e->getMessage(), 500);
        }
    }

    public function showFoto($filename)
    {
        $path = 'foto/' . $filename;

        if (!Storage::exists($path)) {
            abort(404);
        }

        $file = Storage::get($path);
        $mime = Storage::mimeType($path);

        return response($file, 200)->header('Content-Type', $mime);
    }
}

