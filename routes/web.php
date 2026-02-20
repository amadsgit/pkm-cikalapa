<?php

use App\Http\Controllers\Administrator\AgendaController;
use App\Http\Controllers\Administrator\DashboardAdminController;
// Landing
use App\Http\Controllers\Administrator\GeografisController;
use App\Http\Controllers\Administrator\InformasiController;
use App\Http\Controllers\Administrator\PegawaiController;
use App\Http\Controllers\Administrator\PegawaiFileController;
use App\Http\Controllers\Administrator\ProfileController;
// Admin
use App\Http\Controllers\Administrator\RoleController;
use App\Http\Controllers\Administrator\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Author\DashboardAuthorController;
use App\Http\Controllers\Landing\AgendaLandingController;
use App\Http\Controllers\Landing\BerandaController;
use App\Http\Controllers\Landing\InformasiLandingController;
use App\Http\Controllers\Landing\LayananController;
use App\Http\Controllers\Landing\ProfilLandingController;
use App\Http\Controllers\Landing\RegisterController;
use App\Http\Controllers\PdfDukController;
use App\Http\Controllers\PdfNominatifController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/login/pegawai', [AuthController::class, 'loginPegawai'])->name('login.pegawai');
    Route::post('/login/pengunjung', [AuthController::class, 'loginPengunjung'])->name('login.pengunjung');

    // landing
    Route::get('/', [BerandaController::class, 'index']);
    Route::get('/profil', [ProfilLandingController::class, 'index'])->name('profil');

    Route::get('/informasi', [InformasiLandingController::class, 'index'])->name('informasi');
    Route::get('/informasi/{id}', [InformasiLandingController::class, 'show'])->name('informasi.show');

    Route::get('/agenda', [AgendaLandingController::class, 'index'])->name('agenda');
    Route::get('/agenda/{id}', [AgendaLandingController::class, 'show'])->name('agenda.show');

    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
    Route::get('/layanan/{id}', [LayananController::class, 'show'])->name('layanan.show');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/
Route::prefix('dashboard/admin')
    ->middleware(['auth', 'role:administrator'])
    ->group(function () {

        // Dashboard
        Route::get('/', [DashboardAdminController::class, 'index'])
            ->name('dashboard.admin');

        /*
        |--------------------------------------------------------------------------
        | SETTING
        |--------------------------------------------------------------------------
        */
        Route::prefix('setting')->group(function () {
            Route::resource('roles', RoleController::class);
            Route::resource('users', UserController::class);
        });

        /*
        |--------------------------------------------------------------------------
        | KEPEGAWAIAN
        |--------------------------------------------------------------------------
        */
        Route::prefix('ketatausahaan/kepegawaian')->group(function () {

            Route::get('/', [PegawaiController::class, 'index'])
                ->name('admin.ketatausahaan.pegawai');

            Route::get('/create', [PegawaiController::class, 'create'])
                ->name('admin.ketatausahaan.pegawai.create');

            Route::post('/store', [PegawaiController::class, 'store'])
                ->name('admin.ketatausahaan.pegawai.store');

            Route::get('/{pegawai}/edit', [PegawaiController::class, 'edit'])
                ->name('admin.ketatausahaan.pegawai.edit');

            Route::put('/{pegawai}/update', [PegawaiController::class, 'update'])
                ->name('admin.ketatausahaan.pegawai.update');

            Route::delete('/{pegawai}/delete', [PegawaiController::class, 'destroy'])
                ->name('admin.ketatausahaan.pegawai.destroy');

            // PDF
            Route::get('/nominatif', [PdfNominatifController::class, 'index'])
                ->name('ketatausahaan.pegawai.nominatif');

            Route::get('/duk', [PdfDukController::class, 'index'])
                ->name('ketatausahaan.pegawai.duk');
        });

        /*
        |--------------------------------------------------------------------------
        | FILE & PDF PREVIEW
        |--------------------------------------------------------------------------
        */
        Route::get('/pegawai/file-preview/{type}/{filename}', [PegawaiFileController::class, 'preview'])
            ->name('pegawai.file-preview');

        Route::get('/pegawai/foto/{filename}', [PegawaiFileController::class, 'showFoto'])
            ->name('pegawai.foto-preview');

        Route::get('/nominatif-pdf-preview', [PdfNominatifController::class, 'preview'])
            ->name('nominatif.preview');

        Route::get('/duk-pdf-preview', [PdfDukController::class, 'preview'])
            ->name('duk.preview');

        /*
        |--------------------------------------------------------------------------
        | PROFILE PUSKESMAS
        |--------------------------------------------------------------------------
        */
        Route::prefix('profile-puskesmas')->group(function () {

            Route::get('/', [ProfileController::class, 'profilePuskesmas'])
                ->name('admin.profilePuskesmas');

            Route::put('/{id}/update', [ProfileController::class, 'update'])
                ->name('admin.profilePuskesmas.update');

            Route::post('/image/store', [ProfileController::class, 'storeImage'])
                ->name('admin.imagePuskesmas.store');

            Route::delete('/image/delete', [ProfileController::class, 'deleteImage'])
                ->name('admin.imagePuskesmas.delete');

            // Route::put('/visi/update', [ProfileController::class, 'updateVisi'])
            //     ->name('visi.update');
            Route::post('/visi/update', [ProfileController::class, 'updateVisi'])
                ->name('visi.update');

            Route::post('/misi/store', [ProfileController::class, 'storeMisi'])
                ->name('misi.store');

            // Route::put('/misi/update/{id}', [ProfileController::class, 'updateMisi'])
            //     ->name('misi.update');
            Route::post('/misi/update/{id}', [ProfileController::class, 'updateMisi'])
                ->name('misi.update');

            Route::delete('/misi/destroy/{id}', [ProfileController::class, 'destroyMisi'])
                ->name('misi.destroy');

            // Route::put('/sejarah/update', [ProfileController::class, 'updateSejarah'])
            //     ->name('sejarah.update');
            Route::post('/sejarah/update', [ProfileController::class, 'updateSejarah'])
                ->name('sejarah.update');

            Route::post('/struktur-organisasi/store', [ProfileController::class, 'storeStruktur'])
                ->name('strukturOrganisasi.store');

            Route::delete('/struktur-organisasi/delete', [ProfileController::class, 'deleteStruktur'])
                ->name('strukturOrganisasi.delete');
        });

        /*
        |--------------------------------------------------------------------------
        | GEOGRAFIS
        |--------------------------------------------------------------------------
        */
        Route::prefix('geografis-puskesmas')->group(function () {

            Route::get('/', [GeografisController::class, 'wilayahKerjaPuskesmas'])
                ->name('admin.geografisPuskesmas');

            Route::post('/wilayah/store', [GeografisController::class, 'storeWilayahKerja'])
                ->name('wilayahKerja.store');

            Route::put('/wilayah/update/{id}', [GeografisController::class, 'updateWilayahKerja'])
                ->name('wilayahKerja.update');

            Route::delete('/wilayah/delete/{id}', [GeografisController::class, 'deleteWilayahKerja'])
                ->name('wilayahKerja.delete');

            Route::post('/luas/store', [GeografisController::class, 'storeLuasWilayah'])
                ->name('luasWilayah.store');

            Route::put('/luas/update/{id}', [GeografisController::class, 'updateLuasWilayah'])
                ->name('luasWilayah.update');

            Route::delete('/luas/delete/{id}', [GeografisController::class, 'deleteLuasWilayah'])
                ->name('luasWilayah.delete');
        });
    });

/*
|--------------------------------------------------------------------------
| INFORMASI PUBLIK (ADMIN & AUTHOR)
|--------------------------------------------------------------------------
*/
Route::prefix('dashboard')
    ->middleware(['auth', 'role:administrator,author'])
    ->group(function () {

        Route::get('/informasi-publik', [InformasiController::class, 'index'])
            ->name('informasiPublik.index');

        Route::post('/informasi-publik/store', [InformasiController::class, 'store'])
            ->name('informasiPublik.store');

        Route::delete('/informasi-publik/delete/{id}', [InformasiController::class, 'destroy'])
            ->name('informasiPublik.destroy');

        Route::get('/agenda-kegiatan', [AgendaController::class, 'index'])
            ->name('agendaKegiatan.index');

        Route::post('/agenda-kegiatan/store', [AgendaController::class, 'store'])
            ->name('agendaKegiatan.store');

        Route::delete('/agenda-kegiatan/delete/{id}', [AgendaController::class, 'destroy'])
            ->name('agendaKegiatan.destroy');
    });

Route::prefix('dashboard')
    ->middleware(['auth', 'role:author'])
    ->group(function () {

        // Dashboard
        Route::get('/', [DashboardAuthorController::class, 'index'])
            ->name('dashboard.author');

    });
