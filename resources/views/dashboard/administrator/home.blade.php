@extends('layouts.dashboard')
@section('title', 'Dashboard Admin')

@section('content')
<div class="p-6 space-y-8">

    <!-- HEADER -->
    <div class="flex items-center justify-between bg-white p-6 rounded-xl shadow">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-800">
                Selamat Datang 👋
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                Anda masuk sebagai
                <span class="font-semibold text-emerald-600">
                    {{ Auth::user()->role ?? 'Administrator' }}
                </span>
            </p>
        </div>

        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nama) }}&background=10B981&color=fff"
            class="w-12 h-12 rounded-full border-2 border-emerald-500 object-cover shadow">
    </div>

    <!-- STATISTIK UTAMA -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        <div class="bg-emerald-50 border border-emerald-200 p-5 rounded-xl shadow">
            <p class="text-sm text-gray-600">Jumlah Pegawai</p>
            <h2 class="text-3xl font-bold text-emerald-600 mt-2">-</h2>
        </div>

        <div class="bg-sky-50 border border-sky-200 p-5 rounded-xl shadow">
            <p class="text-sm text-gray-600">Tenaga Medis Aktif</p>
            <h2 class="text-3xl font-bold text-sky-600 mt-2">-</h2>
        </div>

        <div class="bg-yellow-50 border border-yellow-200 p-5 rounded-xl shadow">
            <p class="text-sm text-gray-600">Jumlah Informasi Publik</p>
            <h2 class="text-3xl font-bold text-yellow-600 mt-2">-</h2>
        </div>

        <div class="bg-red-50 border border-red-200 p-5 rounded-xl shadow">
            <p class="text-sm text-gray-600">Jumlah Layanan Kesehatan Publik</p>
            <h2 class="text-3xl font-bold text-red-600 mt-2">-</h2>
        </div>
    </div>

</div>
@endsection