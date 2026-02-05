@extends('layouts.dashboard')

@section('title', 'DUK Kepegawaian')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
    {{-- navbar --}}
    <div class="flex flex-wrap gap-2 bg-white rounded-2xl shadow-sm p-2 mb-6">
        <a href="{{ route('admin.ketatausahaan.pegawai') }}" class="px-4 py-2 rounded-xl font-semibold flex items-center gap-2 transition
                  {{ request()->routeIs('admin.ketatausahaan.pegawai') 
                        ? 'bg-blue-600 text-white shadow-md' 
                        : 'text-gray-600 hover:bg-gray-100' }}">
            <i class="ph ph-users text-lg"></i><span>Data Pegawai</span>
        </a>

        <a href="{{ route('ketatausahaan.pegawai.nominatif') }}" class="px-4 py-2 rounded-xl font-semibold flex items-center gap-2 transition
                  {{ request()->routeIs('ketatausahaan.pegawai.nominatif') 
                        ? 'bg-blue-600 text-white shadow-md' 
                        : 'text-gray-600 hover:bg-gray-100' }}">
            <i class="ph ph-identification-card text-lg"></i><span>Nominatif Pegawai</span>
        </a>

        <a href="{{ route('ketatausahaan.pegawai.duk') }}" class="px-4 py-2 rounded-xl font-semibold flex items-center gap-2 transition
                  {{ request()->routeIs('ketatausahaan.pegawai.duk') 
                        ? 'bg-blue-600 text-white shadow-md' 
                        : 'text-gray-600 hover:bg-gray-100' }}">
            <i class="ph ph-tree-structure text-lg"></i><span>Daftar Urut Kepangkatan (DUK)</span>
        </a>
    </div>

    {{-- content --}}
    <div class="bg-white rounded-2xl shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-700"><i class="ph ph-tree-structure text-lg"></i> Daftar Urut Kepangkatan (DUK) Pegawai</h2>
            <a href="#"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-green-600 text-white text-sm font-medium shadow-sm hover:bg-green-700 transition">
                <i class="ph ph-file-xls text-lg"></i>
                Export Excel
            </a>
        </div>

        {{-- preview --}}
        @if ($dukPegawai->count() > 0)
        <div class="w-full h-[800px] sm:h-[1000px] border rounded-lg overflow-hidden">
            <iframe src="{{ route('duk.preview') }}" class="w-full h-full" frameborder="0"></iframe>
        </div>
        @else
        <p class="text-gray-500 text-sm italic">Tidak ada pegawai yang ditemukan.</p>
        @endif
    </div>
</div>
@endsection