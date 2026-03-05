@extends('layouts.dashboard')
@section('title','Profile Saya')

@section('content')

<div class="p-6 space-y-8">

    <!-- HEADER -->
    <div class="bg-white p-6 rounded-xl shadow flex items-center gap-6">

        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nama) }}&background=10B981&color=fff"
            class="w-24 h-24 rounded-full border-4 border-emerald-500 shadow">

        <div>
            <h2 class="text-2xl font-bold text-gray-800">
                {{ $user->nama }}
            </h2>

            <p class="text-gray-500">
                {{ $user->email }}
            </p>

            <span class="inline-block mt-2 px-3 py-1 text-sm bg-emerald-100 text-emerald-700 rounded-full">
                {{ $user->role }}
            </span>
        </div>

    </div>

    <!-- PERINGATAN -->
    @if($peringatanSTR || $peringatanSIP)
    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">

        <h3 class="font-semibold text-yellow-700 mb-2">
            ⚠️ Peringatan Dokumen
        </h3>

        <ul class="text-sm text-gray-700 space-y-1">

            @if($peringatanSTR)
            <li>STR Anda akan segera berakhir. Segera lakukan perpanjangan.</li>
            @endif

            @if($peringatanSIP)
            <li>SIP Anda akan segera berakhir. Segera lakukan perpanjangan.</li>
            @endif

        </ul>

    </div>
    @endif

    <!-- DATA PEGAWAI -->
    <div class="bg-white p-6 rounded-xl shadow">

        <h3 class="text-lg font-semibold text-gray-700 mb-4">
            Informasi Pegawai
        </h3>

        @if($pegawai)

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">

            <div>
                <p class="text-gray-500">Nama Pegawai</p>
                <p class="font-semibold">{{ $pegawai->nama_pegawai }}</p>
            </div>

            <div>
                <p class="text-gray-500">NIP</p>
                <p class="font-semibold">{{ $pegawai->nip }}</p>
            </div>

            <div>
                <p class="text-gray-500">Jabatan</p>
                <p class="font-semibold">{{ $pegawai->jabatan }}</p>
            </div>

            <div>
                <p class="text-gray-500">Pangkat / Golongan</p>
                <p class="font-semibold">{{ $pegawai->pangkat }} - {{ $pegawai->golongan }}</p>
            </div>

            <div>
                <p class="text-gray-500">Pendidikan Terakhir</p>
                <p class="font-semibold">
                    {{ $pegawai->pendidikan_terakhir }} - {{ $pegawai->jurusan }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Nomor HP</p>
                <p class="font-semibold">{{ $pegawai->hp }}</p>
            </div>

            <div>
                <p class="text-gray-500">STR</p>
                <p class="font-semibold">
                    {{ $pegawai->str ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Masa Berlaku STR</p>
                <p class="font-semibold">
                    {{ $pegawai->tgl_akhir_str ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">SIP</p>
                <p class="font-semibold">
                    {{ $pegawai->sip ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Masa Berlaku SIP</p>
                <p class="font-semibold">
                    {{ $pegawai->tgl_akhir_sip ?? '-' }}
                </p>
            </div>

            <div class="md:col-span-2">
                <p class="text-gray-500">Alamat</p>
                <p class="font-semibold">{{ $pegawai->alamat }}</p>
            </div>

        </div>

        @else

        <div class="text-gray-500">
            Data pegawai belum tersedia.
        </div>

        @endif

    </div>

</div>

@endsection