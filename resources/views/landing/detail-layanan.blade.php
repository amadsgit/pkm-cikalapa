@extends('layouts.landing')

@section('title', 'Informasi Publik')

@push('style')
<style>
    .prose {
        text-align: justify;
    }

    .prose ol,
    .prose ul {
        text-align: left;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }

        to {
            opacity: 0;
            transform: translateY(10px);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.2s ease-out forwards;
    }

    .animate-fade-out {
        animation: fadeOut 0.2s ease-out forwards;
    }
</style>
<style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: translateY(0);
            }

            to {
                opacity: 0;
                transform: translateY(10px);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.2s ease-out forwards;
        }

        .animate-fade-out {
            animation: fadeOut 0.2s ease-out forwards;
        }
    </style>
@endpush


@section('content')
<div class="min-h-screen flex flex-col">
    <!-- Modernized Breadcrumbs -->
    <div class="bg-white border-b border-gray-100 pb-1" style="padding-top: 4rem;">
        <div class="w-full">
            <div class="border-gray-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <nav class="py-2" aria-label="Breadcrumb">
                        <ol class="flex items-center space-x-2 text-sm">
                            <li>
                                <a href="https://desa.lokerciayumajakuning.com"
                                    class="flex items-center text-gray-500 hover:text-emerald-600 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    Beranda
                                </a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <a href="{{ route('layanan') }}"
                                    class="text-gray-500 hover:text-emerald-600 transition-colors duration-200">
                                    {{ $layananDetail->kategori->nama_kategori ?? 'Kategori Lainnya' }}
                                </a>
                            </li>
                            
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-emerald-600 font-medium line-clamp-1 max-w-[280px] sm:max-w-md">
                                    {{ $layananDetail->nama_layanan ?? 'Nama Layanan' }}
                                </span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Area with improved spacing -->
    <main class="flex-grow bg-white">
        <!-- Main Content -->
        <div class="bg-white py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Header Section -->
                <div class="mb-6">
                    <div class="flex flex-wrap items-center justify-between gap-4 mb-3">
                        <h1 class="text-2xl font-bold text-gray-900">{{ $layananDetail->nama_layanan }}</h1>
                    
                        <!-- Kategori + Pembayaran -->
                        <div class="flex items-center gap-5">
                            <!-- Kategori -->
                            <span class="px-3 py-1.5 text-sm font-semibold rounded-full
                                bg-blue-100 text-blue-800 border border-blue-200">
                                <i class="fas fa-file-alt mr-1"></i>
                                {{ $layananDetail->kategori->nama_kategori ?? 'Tanpa Kategori' }}
                            </span>
                    
                            <!-- Pembayaran Dropdown & Tarif -->
                            @if ($layananDetail->pembayaran->count() > 0)
                            <div class="text-right space-y-1">
                                <!-- Dropdown jenis pembayaran -->
                                <div class="relative inline-block text-left">
                                    <div class="relative">
                                        <select
                                            class="w-40 appearance-none text-xs font-semibold text-gray-700 bg-white border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition duration-200 cursor-pointer pl-3 pr-8 py-2 pembayaranSelect">
                                            @foreach ($layananDetail->pembayaran as $p)
                                            <option value="{{ $p->tarif }}">
                                                💳 {{ strtoupper($p->jenisPembayaran->nama ?? 'TUNAI') }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <!-- Ikon dropdown -->
                                        <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center text-emerald-500">
                                            <i class="fas fa-chevron-down text-xs"></i>
                                        </div>
                                    </div>
                                </div>
                    
                                <!-- Label harga -->
                                @php
                                $tarifPertama = $layananDetail->pembayaran->first()->tarif ?? 0;
                                @endphp
                                <div
                                    class="inline-flex items-center text-xs font-bold text-emerald-700 bg-emerald-50 border border-emerald-100 rounded-full px-3 py-1.5 shadow-sm priceLabel transition-all duration-200 hover:bg-emerald-100 hover:scale-105">
                                    <i class="fas fa-money-bill-wave text-emerald-500 mr-1.5"></i>
                                    {{ $tarifPertama == 0 ? 'Gratis' : 'Rp ' . number_format($tarifPertama, 0, ',', '.') }}
                                </div>
                    
                                <!-- Tarif Info -->
                                <p class="text-[11px] text-orange-500 italic mt-0.5 leading-tight flex items-center gap-1">
                                    <i class="fas fa-info-circle text-orange-500"></i>
                                    Tarif dapat berubah sewaktu-waktu sesuai ketentuan Peraturan Daerah (Perda) yang berlaku.
                                </p>
                            </div>
                            @endif
                        </div>
                    </div>
                
                    <!-- Meta Info -->
                    <div class="flex items-center justify-between border-b border-gray-200 pb-5">
                        <div class="flex flex-wrap gap-4">
                            <div class="flex items-center gap-2 text-gray-500">
                                <i class="far fa-calendar text-emerald-600"></i>
                                <span class="text-sm">
                                    Diperbarui: {{ $layananDetail->updated_at ? $layananDetail->updated_at->translatedFormat('d F Y') : '-' }}
                                </span>
                            </div>
                        </div>
                
                        <!-- Share Button -->
                        <div x-data="{ shareOpen: false }" class="relative">
                            <button @click="shareOpen = !shareOpen"
                                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gray-50 hover:bg-emerald-50 text-gray-500 hover:text-emerald-500 transition-colors">
                                <i class="fas fa-share-alt text-[14px]"></i>
                                <span class="text-sm font-medium">Bagikan</span>
                            </button>
                
                            <div x-show="shareOpen" x-transition @click.away="shareOpen = false"
                                class="absolute z-50 right-0 mt-2 bg-white rounded-xl shadow-lg border border-gray-100 w-48 p-1.5">
                
                                @php
                                $url = urlencode(request()->fullUrl());
                                $title = urlencode($layananDetail->nama_layanan);
                                @endphp
                
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}" target="_blank" rel="noopener"
                                    class="flex items-center gap-3 p-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg transition-colors group">
                                    <span
                                        class="w-8 h-8 flex items-center justify-center bg-blue-500/10 text-blue-500 rounded-full group-hover:scale-110 transition-transform">
                                        <i class="fab fa-facebook-f text-[16px]"></i>
                                    </span>
                                    <span class="font-medium">Facebook</span>
                                </a>
                
                                <a href="https://twitter.com/intent/tweet?url={{ $url }}&text={{ $title }}" target="_blank"
                                    rel="noopener"
                                    class="flex items-center gap-3 p-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg transition-colors group">
                                    <span
                                        class="w-8 h-8 flex items-center justify-center bg-sky-500/10 text-sky-500 rounded-full group-hover:scale-110 transition-transform">
                                        <i class="fab fa-twitter text-[16px]"></i>
                                    </span>
                                    <span class="font-medium">Twitter</span>
                                </a>
                
                                <a href="https://wa.me/?text={{ $title }}+-+{{ $url }}" target="_blank" rel="noopener"
                                    class="flex items-center gap-3 p-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg transition-colors group">
                                    <span
                                        class="w-8 h-8 flex items-center justify-center bg-green-500/10 text-green-500 rounded-full group-hover:scale-110 transition-transform">
                                        <i class="fab fa-whatsapp text-[16px]"></i>
                                    </span>
                                    <span class="font-medium">WhatsApp</span>
                                </a>
                
                                <button onclick="copyToClipboard('{{ request()->fullUrl() }}')"
                                    class="flex items-center gap-3 p-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg transition-colors w-full group">
                                    <span
                                        class="w-8 h-8 flex items-center justify-center bg-gray-500/10 text-gray-500 rounded-full group-hover:scale-110 transition-transform">
                                        <i class="far fa-copy text-[16px]"></i>
                                    </span>
                                    <span class="font-medium">Salin Link</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Deskripsi -->
                <div class="bg-gray-50 p-6 rounded-lg mb-4">
                    <div class="prose prose-emerald max-w-none">
                        {!! nl2br(e($layananDetail->deskripsi)) !!}
                    </div>
                </div>
                
                <!-- Informasi Layanan -->
                <div class="bg-gray-50 p-6 rounded-lg mb-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Lokasi -->
                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-sm font-medium text-gray-900">Lokasi Layanan</h3>
                                <p class="text-sm text-gray-600 mt-1">{{ $layananDetail->lokasi ?? '-' }}</p>
                            </div>
                        </div>
                
                        <!-- Jadwal -->
                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-sm font-medium text-gray-900">Jadwal Pelayanan</h3>
                                <p class="text-sm text-gray-600 mt-1">{{ $layananDetail->jadwal ?? '-' }}</p>
                            </div>
                        </div>
                
                        <!-- Kontak -->
                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-sm font-medium text-gray-900">Kontak Layanan</h3>
                                @if ($layananDetail->kontak)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $layananDetail->kontak) }}"
                                    class="mt-1 text-gray-600 hover:text-emerald-600 transition-colors inline-flex items-center text-sm group">
                                    <span>{{ $layananDetail->kontak }}</span>
                                    <span
                                        class="ml-2 bg-emerald-50 text-emerald-500 px-2 py-0.5 rounded text-xs font-medium flex items-center group-hover:bg-emerald-100 transition-colors">
                                        <i class="fab fa-whatsapp mr-1"></i> Chat
                                    </span>
                                </a>
                                @else
                                <p class="text-sm text-gray-600 mt-1">Tidak tersedia</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Persyaratan & Prosedur Tab Section -->
                <div x-data="{ activeTab: 'persyaratan' }" class="mb-4">
                    <!-- Tab Navigation -->
                    <div class="flex justify-center mb-6">
                        <div class="inline-flex bg-white backdrop-blur-sm rounded-full p-1 shadow-md">
                            <button @click="activeTab = 'persyaratan'" :class="{
                                    'bg-gradient-to-r from-emerald-500 to-emerald-600 text-white shadow-md': activeTab === 'persyaratan',
                                    'bg-transparent text-gray-600 hover:text-gray-800': activeTab !== 'persyaratan'
                                }" class="px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 flex items-center">
                                <i class="fas fa-check-circle mr-1.5 text-sm"></i>
                                Persyaratan
                            </button>
                
                            <button @click="activeTab = 'prosedur'" :class="{
                                    'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-md': activeTab === 'prosedur',
                                    'bg-transparent text-gray-600 hover:text-gray-800': activeTab !== 'prosedur'
                                }" class="px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 flex items-center">
                                <i class="fas fa-stream mr-1.5 text-sm"></i>
                                Alur Pelayanan
                            </button>
                        </div>
                    </div>
                
                    <!-- Content Container -->
                    <div class="mt-4 relative">
                        <!-- Persyaratan Tab Panel -->
                        <div x-show="activeTab === 'persyaratan'" x-transition:enter="transition-all duration-500 ease-out"
                            x-transition:enter-start="opacity-0 transform translate-y-4"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition-all duration-300 ease-in"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-4" class="bg-gray-50 rounded-lg p-6 shadow-sm">
                
                            @if ($layananDetail->persyaratan->count() > 0)
                            <ul class="space-y-4 text-gray-600">
                                @foreach ($layananDetail->persyaratan as $item)
                                <li class="flex items-start">
                                    <span
                                        class="flex-shrink-0 h-5 w-5 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 mr-3 mt-0.5">
                                        <i class="fas fa-check text-xs"></i>
                                    </span>
                                    <div>
                                        <span class="font-medium text-gray-900">{{ $item->nama_persyaratan }}</span>
                                        @if ($item->keterangan)
                                        <p class="text-sm text-gray-500 mt-1">{{ $item->keterangan }}</p>
                                        @endif
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            @else
                            <p class="text-gray-500 text-center italic">Belum ada data persyaratan.</p>
                            @endif
                        </div>
                
                        <!-- Prosedur Tab Panel -->
                        <div x-show="activeTab === 'prosedur'" x-transition:enter="transition-all duration-500 ease-out"
                            x-transition:enter-start="opacity-0 transform translate-y-4"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition-all duration-300 ease-in"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-4" class="bg-gray-50 rounded-lg p-6 shadow-sm">
                
                            @if ($layananDetail->prosedur->count() > 0)
                            <ol class="relative space-y-6 text-gray-600 ml-6 border-l-2 border-blue-200">
                                @foreach ($layananDetail->prosedur as $index => $item)
                                <li class="pl-8 relative">
                                    <!-- Circle with number -->
                                    <div
                                        class="absolute -left-4 h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold text-sm shadow-md">
                                        {{ $index + 1 }}
                                    </div>
                
                                    <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-100">
                                        <span class="font-medium text-gray-900">{{ $item->judul ?? 'Langkah ' . ($index + 1) }}</span>
                
                                        @if ($item->deskripsi)
                                        <p class="text-sm text-gray-500 mt-2">{{ $item->deskripsi }}</p>
                                        @endif
                
                                        @if ($item->gambar)
                                        <div class="mt-3">
                                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Prosedur Gambar"
                                                class="rounded-lg border border-gray-200 shadow-sm max-h-64 object-contain mx-auto">
                                        </div>
                                        @endif
                                    </div>
                                </li>
                                @endforeach
                            </ol>
                            @else
                            <p class="text-gray-500 text-center italic">Belum ada data prosedur.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Layanan Terkait -->
        <section class="py-12 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Modern Header -->
                <div class="mb-8">
                    <!-- Title Row -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="h-6 w-1 bg-emerald-500 rounded-full mr-2"></div>
                            <span
                                class="bg-emerald-50 px-2.5 py-1 rounded-full text-emerald-800 text-sm font-semibold flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                LAYANAN LAINNYA
                            </span>
                        </div>
                        <a href="{{ route('layanan') }}"
                            class="flex-shrink-0 inline-flex items-center text-sm font-medium text-emerald-600 border border-emerald-200 rounded-lg px-3 py-1.5 hover:bg-emerald-50 transition-colors">
                            <span>Lihat Semua</span>
                            <svg class="ml-1.5 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>

                    <!-- Description on Full Row -->
                    <p class="text-gray-600 text-sm md:text-base w-full mt-3">
                        Layanan Kesehatan yang mungkin Anda butuhkan
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($layanan as $item)
                    <div class="group bg-gradient-to-br from-gray-50 to-white/80 backdrop-blur-lg rounded-2xl shadow-lg overflow-hidden h-full flex flex-col transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 border border-gray-100/60 relative"
                        data-aos="fade-up">
                        <div class="p-6 flex flex-col flex-grow relative z-10">
                    
                            <!-- Header: Kategori + Pembayaran -->
                            <div class="flex justify-between items-start mb-4">
                                <!-- Badge kategori -->
                                <span
                                    class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold text-emerald-700 bg-gradient-to-r from-emerald-100 to-emerald-50 border border-emerald-200 shadow-sm">
                                    <i class="fas fa-heartbeat text-emerald-500 mr-1.5"></i>
                                    {{ $item->kategori->nama_kategori ?? 'Tanpa Kategori' }}
                                </span>
                    
                                <!-- Pembayaran Dropdown & Tarif -->
                                <div class="text-right space-y-1">
                                    <div class="relative inline-block text-left">
                                        <div class="relative">
                                            <select
                                                class="w-36 appearance-none text-xs font-semibold text-gray-700 bg-white border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition duration-200 cursor-pointer pl-3 pr-8 py-2 pembayaranSelect">
                                                @foreach ($item->pembayaran as $p)
                                                <option value="{{ $p->tarif }}">
                                                    💳 {{ strtoupper($p->jenisPembayaran->nama) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <!-- Ikon dropdown -->
                                            <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center text-emerald-500">
                                                <i class="fas fa-chevron-down text-xs"></i>
                                            </div>
                                        </div>
                                    </div>
                    
                                    <!-- Label harga -->
                                    <div
                                        class="inline-flex items-center text-xs font-bold text-emerald-700 bg-emerald-50 border border-emerald-100 rounded-full px-3 py-1.5 shadow-sm priceLabel transition-all duration-200 hover:bg-emerald-100 hover:scale-105">
                                        <i class="fas fa-money-bill-wave text-emerald-500 mr-1.5"></i>
                                        {{ $item->pembayaran->first()->tarif == 0 ? 'Gratis' : 'Rp ' .
                                        number_format($item->pembayaran->first()->tarif, 0, ',', '.') }}
                                    </div>
                    
                                    <!-- Tarif Info -->
                                    <p class="text-[11px] text-orange-500 italic mt-0.5 leading-tight flex items-center gap-1">
                                        <i class="fas fa-info-circle text-orange-500"></i>
                                        Tarif sesuai Perda Kabupaten Subang Nomor 12 Tahun 2023
                                    </p>
                                </div>
                            </div>
                    
                            <!-- Judul -->
                            <a href="#" class="block group">
                                <div
                                    class="relative h-0.5 w-12 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-full mb-3 transition-all duration-300 group-hover:w-24">
                                </div>
                                <h3
                                    class="text-lg sm:text-xl font-bold text-gray-900 leading-tight mb-2 line-clamp-2 group-hover:text-emerald-600 transition-colors">
                                    {{ $item->nama }}
                                </h3>
                            </a>
                    
                            <!-- Deskripsi -->
                            <p
                                class="text-gray-600 text-sm leading-relaxed mb-5 pl-3 border-l-2 border-emerald-200 line-clamp-3 tracking-wide">
                                {{ $item->deskripsi }}
                            </p>
                    
                            <!-- Lokasi & Jadwal -->
                            <div class="space-y-2 mb-5">
                                <!-- Lokasi -->
                                <div class="flex items-start bg-gray-50/50 rounded-lg px-2 py-1">
                                    <span class="text-emerald-500 mr-2 mt-0.5 group-hover:text-emerald-600 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0z" />
                                        </svg>
                                    </span>
                                    <p class="text-gray-600 text-sm line-clamp-1">
                                        {{ $item->lokasi ?? 'UPTD Puskesmas Cikalapa' }}
                                    </p>
                                </div>
                    
                                <!-- Jadwal -->
                                <div class="flex items-start bg-gray-50/50 rounded-lg px-2 py-1">
                                    <span class="text-emerald-500 mr-2 mt-0.5 group-hover:text-emerald-600 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                    <p class="text-gray-600 text-sm line-clamp-2">
                                        {{ $item->jadwal ?? 'Senin - Jumat: 08.00 - 15.00' }}
                                    </p>
                                </div>
                            </div>
                    
                            <!-- Tombol Aksi -->
                            <div class="mt-auto flex justify-between items-center">
                                <a href="{{ route('layanan.show', $item->id) }}"
                                    class="inline-flex items-center bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-medium text-sm rounded-lg px-4 py-2 shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300">
                                    <i class="fas fa-info-circle mr-1.5 text-white"></i>
                                    <span>Detail Layanan</span>
                                </a>
                                <a href="tel:{{ $profile->kontak ?? '08123456789' }}"
                                    class="inline-flex items-center px-3.5 py-1.5 bg-white text-emerald-600 rounded-full shadow-sm text-sm font-medium border border-emerald-100 hover:bg-emerald-50 hover:scale-105 transition-all duration-300 hover:shadow-md">
                                    <i class="fas fa-phone-alt mr-1.5"></i>
                                    Hubungi
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="col-span-3 text-center text-gray-500">Belum ada layanan.</p>
                    @endforelse
                </div>
            </div>
        </section>
    </main>

    @include('landing.components.footer')
</div>
@endsection

@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".pembayaranSelect").forEach(select => {
                const label = select.closest(".text-right").querySelector(".priceLabel");
        
                select.addEventListener("change", e => {
                    const tarif = parseFloat(e.target.value);
                    label.innerHTML = `<i class="fas fa-money-bill-wave text-emerald-500 mr-1.5"></i> ${
                        tarif === 0 ? 'Gratis' : 'Rp ' + new Intl.NumberFormat('id-ID').format(tarif)
                    }`;
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const backToTopButton = document.getElementById('back-to-top');

            // Show/hide button based on scroll position
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopButton.classList.remove('opacity-0');
                    backToTopButton.classList.add('opacity-100');
                } else {
                    backToTopButton.classList.remove('opacity-100');
                    backToTopButton.classList.add('opacity-0');
                }
            });

            // Scroll to top when button is clicked
            backToTopButton.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>

    <!-- Enhanced Initialization Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                // Initialize AOS with better settings
                AOS.init({
                    duration: 800,
                    once: true,
                    offset: 100,
                    easing: 'ease-in-out',
                });

                // Add smooth scrolling to all links
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function (e) {
                        e.preventDefault();

                        const target = document.querySelector(this.getAttribute('href'));
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    });
                });
            });

            // Alpine.js Data
            document.addEventListener('alpine:init', () => {
                Alpine.data('navigation', () => ({
                    mobileMenuOpen: false,
                    scrolled: false,

                    init() {
                        window.addEventListener('scroll', () => {
                            this.scrolled = window.scrollY > 20;
                        });
                    },

                    toggleMobileMenu() {
                        this.mobileMenuOpen = !this.mobileMenuOpen;

                        if (this.mobileMenuOpen) {
                            document.body.classList.add('overflow-hidden');
                        } else {
                            document.body.classList.remove('overflow-hidden');
                        }
                    }
                }))
            });
    </script>

    <!-- Additional Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function copyToClipboard(text) {
        navigator.clipboard.writeText(text)
            .then(() => {
                // Show success toast
                const toast = document.createElement('div');
                toast.className = 'fixed bottom-4 right-4 bg-gray-900 text-white px-4 py-2 rounded-lg shadow-lg flex items-center gap-2 animate-fade-in z-50';
                toast.innerHTML = `
                    <i class="fas fa-check text-emerald-400"></i>
                    <span>Link berhasil disalin!</span>
                `;
                document.body.appendChild(toast);

                // Remove toast after 2 seconds
                setTimeout(() => {
                    toast.classList.add('animate-fade-out');
                    setTimeout(() => toast.remove(), 300);
                }, 2000);
            })
            .catch(console.error);
    }
    </script>

    <!-- Include Lottie Animation Library -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@endpush