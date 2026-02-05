@extends('layouts.dashboard')

@section('title', 'Data Kepegawaian')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
    {{-- navbar --}}
    <div class="flex space-x-4 bg-white rounded-2xl shadow-sm p-2 mb-6">
        <a href="{{ route('admin.ketatausahaan.pegawai') }}"
            class="px-4 py-2 rounded-xl font-semibold flex items-center space-x-2 transition
                  {{ request()->routeIs('admin.ketatausahaan.pegawai') ? 'bg-blue-600 text-white' : 'text-gray-600 hover:bg-gray-100' }}">
            <i class="ph ph-users text-lg"></i><span>Data Pegawai</span>
        </a>
    
        <a href="{{ route('ketatausahaan.pegawai.nominatif') }}" class="px-4 py-2 rounded-xl font-semibold flex items-center space-x-2 transition
                  {{ request()->routeIs('ketatausahaan.pegawai.nominatif') ? 'bg-blue-600 text-white' : 'text-gray-600 hover:bg-gray-100' }}">
            <i class="ph ph-identification-card text-lg"></i><span>Nominatif Pegawai</span>
        </a>
    
        <a href="{{ route('ketatausahaan.pegawai.duk') }}" class="px-4 py-2 rounded-xl font-semibold flex items-center space-x-2 transition
                  {{ request()->routeIs('ketatausahaan.pegawai.duk') ? 'bg-blue-600 text-white' : 'text-gray-600 hover:bg-gray-100' }}">
            <i class="ph ph-tree-structure text-lg"></i><span>Daftar Urut Kepangkatan (DUK)</span>
        </a>
    </div>

    {{-- Header --}}
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-bold text-gray-700">
            <i class="ph ph-users text-lg"></i> Data pegawai UPTD Puskesmas Cikalapa
        </h2>
    
        <div class="flex items-center space-x-3">
            {{-- Tombol Tambah Pegawai --}}
            <a href="{{ route('admin.ketatausahaan.pegawai.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-1 transition">
                <i class="ph ph-plus mr-2 text-lg"></i>
                Tambah Pegawai
            </a>
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-white shadow-md rounded-2xl overflow-hidden">
        @if ($listpegawai->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-blue-600 text-white text-xs uppercase">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Foto</th>
                        <th class="px-4 py-3">Nama Pegawai</th>
                        <th class="px-4 py-3">NIP</th>
                        <th class="px-4 py-3">TTL</th>
                        <th class="px-4 py-3">Jenis Kelamin</th>
                        <th class="px-4 py-3">Jabatan</th>
                        <th class="px-4 py-3">Pangkat/Gol</th>
                        <th class="px-4 py-3">SK Jabatan</th>
                        <th class="px-4 py-3">SK Pangkat/Gol</th>
                        <th class="px-4 py-3">Status Kepegawaian</th>
                        <th class="px-4 py-3">Masa Kerja</th>
                        <th class="px-4 py-3">STR</th>
                        <th class="px-4 py-3">SIP</th>
                        <th class="px-4 py-3">Pendidikan Terakhir</th>
                        <th class="px-4 py-3">HP</th>
                        <th class="px-4 py-3">Alamat</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($listpegawai as $index => $pegawai)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-center font-medium">
                            {{ $listpegawai->firstItem() + $index }}
                        </td>
                        <td class="px-4 py-3">
                            @if ($pegawai->foto)
                            <img src="{{ asset('storage/'.$pegawai->foto) }}" alt="Foto {{ $pegawai->nama_pegawai }}"
                                class="w-12 h-12 object-cover rounded-full border">
                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 font-semibold text-gray-800 whitespace-nowrap">
                            {{ $pegawai->nama_pegawai }}
                        </td>
                        <td class="px-4 py-3">{{ $pegawai->nip }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            {{ $pegawai->tempat_lahir }},
                            {{ \Carbon\Carbon::parse($pegawai->tanggal_lahir)->translatedFormat('d F Y') }}
                        </td>
                        <td class="px-4 py-3">{{ $pegawai->jenis_kelamin }}</td>
                        <td class="px-4 py-3">{{ $pegawai->jabatan }}</td>
                        <td class="px-4 py-3">{{ $pegawai->pangkat }} / {{ $pegawai->golongan }}</td>
                        <td class="px-4 py-2 text-center">
                            @if ($pegawai->sk_jabatan)
                            <a href="#"
                                onclick="window.open('{{ route('pegawai.file-preview', ['type' => 'sk_jabatan', 'filename' => basename($pegawai->sk_jabatan)]) }}', 'Preview SK Jabatan', 'width=800,height=600,resizable=yes,scrollbars=yes'); return false;"
                                title="Lihat SK Jabatan"
                                class="inline-flex items-center gap-1 px-3 bg-emerald-400 text-white text-sm font-medium rounded-lg shadow hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-400">
                                <i class="ph ph-eye text-lg"></i> Lihat
                            </a>
                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                        
                            @if ($pegawai->tmt_sk_jabatan)
                            <div class="mt-2">
                                <span class="text-gray-700 text-sm font-medium">TMT Jabatan:</span>
                                <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded">
                                    {{ \Carbon\Carbon::parse($pegawai->tmt_sk_jabatan)->format('d/m/Y') }}
                                </span>
                            </div>
                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                        </td>  
                        <td class="px-4 py-2 text-center">
                            @if ($pegawai->sk_pangkat_golongan)
                            <a href="#"
                                onclick="window.open('{{ route('pegawai.file-preview', ['type' => 'sk_pangkat_golongan', 'filename' => basename($pegawai->sk_pangkat_golongan)]) }}', 'Preview SK Pangkat/Golongan', 'width=800,height=600,resizable=yes,scrollbars=yes'); return false;"
                                title="Lihat SK Pangkat/Golongan"
                                class="inline-flex items-center gap-1 px-3 bg-emerald-400 text-white text-sm font-medium rounded-lg shadow hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-400">
                                <i class="ph ph-eye text-lg"></i> Lihat
                            </a>
                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                        
                            @if ($pegawai->tmt_sk_pangkat_golongan)
                            <div class="mt-2">
                                <span class="text-gray-700 text-sm font-medium">TMT Pangkat/Gol:</span>
                                <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded">
                                    {{ \Carbon\Carbon::parse($pegawai->tmt_sk_pangkat_golongan)->format('d/m/Y') }}
                                </span>
                            </div>
                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $pegawai->status_kepegawaian }}</td>
                        <td>
                            @if ($pegawai->tgl_mulai_kerja)
                            @php
                            $awal = \Carbon\Carbon::parse($pegawai->tgl_mulai_kerja);
                            $sekarang = \Carbon\Carbon::now();
                        
                            $tahun = $awal->diffInYears($sekarang);
                            $bulan = $awal->copy()->addYears($tahun)->diffInMonths($sekarang);
                            @endphp
                        
                            {{ $tahun }} thn {{ $bulan }} bln
                            @else
                            <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-center relative">
                            @if ($pegawai->str)
                            <a href="#"
                                onclick="window.open('{{ route('pegawai.file-preview', ['type' => 'str', 'filename' => basename($pegawai->str)]) }}', 'Preview STR', 'width=800,height=600,resizable=yes,scrollbars=yes'); return false;"
                                title="Lihat STR" class="inline-flex items-center gap-1 px-3 bg-emerald-400 text-white text-sm font-medium rounded-lg shadow hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-400">
                                <i class="ph ph-eye text-lg"></i> Lihat
                            </a>
                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                        
                            @if ($pegawai->str)
                            <div class="mt-2">
                                <span class="text-gray-700 text-sm font-medium">Berlaku s.d:</span>
                                <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded">
                                    {{ \Carbon\Carbon::parse($pegawai->tgl_akhir_str)->format('d/m/Y') }}
                                </span>
                            </div>
                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                            {{-- Badge peringatan floating --}}
                            @if (\Carbon\Carbon::parse($pegawai->tgl_akhir_str)->lessThanOrEqualTo(\Carbon\Carbon::now()->addMonth()))
                            <span
                                class="absolute -top-1 -left-8 bg-yellow-400 text-yellow-900 text-[10px] font-bold px-2 py-0.5 rounded-full shadow-lg animate-pulse">
                                ⚠ Segera perbarui STR
                            </span>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-center relative">
                            @if ($pegawai->sip)
                            <a href="#"
                                onclick="window.open('{{ route('pegawai.file-preview', ['type' => 'sip', 'filename' => basename($pegawai->sip)]) }}', 'Preview SIP', 'width=800,height=600,resizable=yes,scrollbars=yes'); return false;"
                                title="Lihat SIP"
                                class="inline-flex items-center gap-1 px-3 bg-emerald-400 text-white text-sm font-medium rounded-lg shadow hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-400">
                                <i class="ph ph-eye text-lg"></i> Lihat
                            </a>
                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                        
                            @if ($pegawai->sip)
                            <div class="mt-2">Berlaku s.d:</span>
                                <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded">
                                    {{ \Carbon\Carbon::parse($pegawai->tgl_akhir_sip)->format('d/m/Y') }}
                                </span>
                            </div>
                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                            {{-- Badge peringatan floating --}}
                            @if (\Carbon\Carbon::parse($pegawai->tgl_akhir_sip)->lessThanOrEqualTo(\Carbon\Carbon::now()->addMonth()))
                            <span
                                class="absolute -top-1 -right-8 bg-yellow-400 text-yellow-900 text-[10px] font-bold px-2 py-0.5 rounded-full shadow-lg animate-pulse">
                                ⚠ Segera perbarui SIP
                            </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            {{ $pegawai->pendidikan_terakhir }} - {{ $pegawai->jurusan }}
                        </td>
                        <td class="px-4 py-3">{{ $pegawai->hp ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $pegawai->alamat ?? '-' }}</td>
                        <td class="px-4 py-3 text-center space-x-2 flex">
                            <a href="{{ route('admin.ketatausahaan.pegawai.edit', $pegawai->id) }}"
                                class="inline-flex items-center px-2 py-1 text-xs bg-sky-400 text-white rounded-lg hover:bg-sky-500 transition" title="edit data">
                                <i class="ph ph-pencil-simple text-lg"></i>
                            </a>
                            <form action="{{ route('admin.ketatausahaan.pegawai.destroy', $pegawai->id) }}" method="POST"
                                class="inline-block" onsubmit="return confirm('Yakin hapus pegawai ini?')" title="Hapus data">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center px-2 py-1 text-xs bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                    <i class="ph ph-trash text-lg"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="p-4">
            {{ $listpegawai->links('pagination::tailwind') }}
        </div>
        @else
        <div class="p-6 text-center text-gray-500">
            <i class="ph ph-exclamation-circle text-2xl mb-2"></i>
            <p>Tidak ada data pegawai ditemukan.</p>
        </div>
        @endif
    </div>
</div>
@endsection