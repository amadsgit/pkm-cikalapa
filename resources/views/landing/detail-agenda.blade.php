@extends('layouts.landing')

@section('title', 'Agenda Kegiatan')

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
@endpush


@section('content')
<div class="min-h-screen flex flex-col">
    <!-- Modernized Breadcrumbs -->
    <div class="bg-white border-b border-gray-100 pb-1" style="padding-top: 4rem;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="py-2" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ url('/') }}"
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
                        <a href="{{ route('agenda') }}"
                            class="flex items-center text-gray-500 hover:text-emerald-600 transition-colors duration-200">
                            {{ $kegiatan->kategori->nama }}
                        </a>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-emerald-600 font-medium line-clamp-1 max-w-[280px] sm:max-w-md">
                            {{ $kegiatan->judul }}
                        </span>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main Content Area -->
    <main class="flex-grow bg-gradient-to-b from-white to-gray-50">
        @php
        $categorySlug = strtolower($kegiatan->kategori->slug ?? 'lainnya');
        $categoryStyles = [
        'berita' => ['color' => 'bg-indigo-500 border-indigo-600', 'icon' => 'fas fa-globe'],
        'pengumuman' => ['color' => 'bg-amber-500 border-amber-600', 'icon' => 'fas fa-bullhorn'],
        'artikel' => ['color' => 'bg-emerald-500 border-emerald-600', 'icon' => 'fas fa-calendar-check'],
        'edukasi-tips-sehat' => ['color' => 'bg-rose-500 border-rose-600', 'icon' => 'fas fa-road'],
        'rekrutmen' => ['color' => 'bg-sky-500 border-sky-600', 'icon' => 'fas fa-heartbeat'],
        ];
        $style = $categoryStyles[$categorySlug] ?? ['color' => 'bg-gray-500 border-gray-600', 'icon' => 'fas
        fa-info-circle'];
        @endphp
    
        <!-- Header Gambar -->
        <div class="relative w-full h-[260px] md:h-[380px] lg:h-[420px] overflow-hidden rounded-b-3xl shadow-sm">
            <img src="{{ $kegiatan->gambar ? asset('storage/' . $kegiatan->gambar) : '/storage/uploads/berita/default-announcement.jpg' }}"
                alt="{{ $kegiatan->judul }}"
                class="w-full h-full object-cover brightness-[0.9] hover:brightness-100 transition-all duration-700 ease-out">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
    
            <div class="absolute bottom-6 left-6 md:left-10 text-white space-y-3">
                <a href="{{ route('agenda', ['kategori' => $kegiatan->kategori->slug ?? 'semua']) }}"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-md text-xs font-medium border-l-4 shadow-sm transition-all duration-300 {{ $style['color'] }}">
                    <i class="{{ $style['icon'] }} text-[11px]"></i>
                    <span>{{ $kegiatan->kategori->nama ?? 'Lainnya' }}</span>
                </a>
    
                <h1 class="text-2xl md:text-4xl font-extrabold leading-tight drop-shadow-sm max-w-3xl">
                    {{ $kegiatan->judul }}
                </h1>
    
                <div
                    class="flex flex-col sm:flex-row sm:items-center sm:gap-6 text-sm text-gray-100/90 space-y-1 sm:space-y-0">
                    <div class="flex items-center gap-2">
                        <i class="far fa-calendar text-emerald-400"></i>
                        {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}
                    </div>
    
                    @if($kegiatan->waktu)
                    <div class="flex items-center gap-2">
                        <i class="fas fa-clock text-emerald-400"></i>
                        {{ $kegiatan->waktu }}
                    </div>
                    @endif
    
                    @if($kegiatan->lokasi)
                    <div class="flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-emerald-400"></i>
                        {{ $kegiatan->lokasi }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    
        <!-- Konten Utama -->
        <section class="py-10 md:py-14">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                    <!-- Artikel -->
                    <article class="lg:col-span-2">
                        <!-- Tombol Share -->
                        <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
                            <span class="text-sm text-gray-500">Bagikan ke teman Anda:</span>
                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = !open"
                                    class="flex items-center gap-2 bg-emerald-50 hover:bg-emerald-100 text-emerald-600 px-4 py-1.5 rounded-full font-medium text-sm transition-colors">
                                    <i class="fas fa-share-alt"></i> Bagikan
                                </button>
    
                                <div x-show="open" x-transition
                                    class="absolute right-0 mt-2 w-52 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden z-50"
                                    @click.away="open = false">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}"
                                        target="_blank"
                                        class="flex items-center gap-3 px-4 py-2 text-gray-600 hover:bg-gray-50 text-sm transition">
                                        <i class="fab fa-facebook text-blue-500"></i> Facebook
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}&text={{ urlencode($kegiatan->judul) }}"
                                        target="_blank"
                                        class="flex items-center gap-3 px-4 py-2 text-gray-600 hover:bg-gray-50 text-sm transition">
                                        <i class="fab fa-twitter text-sky-500"></i> Twitter
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($kegiatan->judul . ' - ' . Request::url()) }}"
                                        target="_blank"
                                        class="flex items-center gap-3 px-4 py-2 text-gray-600 hover:bg-gray-50 text-sm transition">
                                        <i class="fab fa-whatsapp text-green-500"></i> WhatsApp
                                    </a>
                                    <button onclick="navigator.clipboard.writeText('{{ Request::url() }}')"
                                        class="flex items-center gap-3 px-4 py-2 w-full text-gray-600 hover:bg-gray-50 text-sm transition">
                                        <i class="far fa-copy text-gray-500"></i> Salin Tautan
                                    </button>
                                </div>
                            </div>
                        </div>
    
                        <!-- Isi Artikel -->
                        <div class="prose prose-emerald lg:prose-lg max-w-none mb-12 leading-relaxed tracking-wide">
                            {!! nl2br(e($kegiatan->deskripsi)) !!}
                        </div>
    
                        <!-- Penulis -->
                        <div
                            class="border-t border-gray-100 pt-6 mt-10 flex items-center gap-4 bg-white/50 rounded-xl p-5 shadow-sm backdrop-blur-sm">
                            <div
                                class="relative flex-shrink-0 w-14 h-14 rounded-full bg-gradient-to-br from-emerald-500 to-emerald-600 text-white flex items-center justify-center ring-4 ring-emerald-100 shadow-md">
                                <i class="fas fa-user text-lg"></i>
                                <div
                                    class="absolute bottom-0 right-0 h-4 w-4 bg-green-500 border-[3px] border-white rounded-full shadow-sm">
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">
                                    {{ $kegiatan->author->pegawai->nama_pegawai ?? 'Admin Puskesmas' }}
                                </h3>
                                <p class="text-sm text-gray-500">Penulis Agenda</p>
                            </div>
                        </div>
                    </article>
    
                    <!-- Sidebar -->
                    <aside class="lg:col-span-1">
                        @include('landing.components.sidebar-agenda')
                    </aside>
                </div>
            </div>
        </section>
    </main>

    @include('landing.components.footer')
</div>
@endsection

@push('script')
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

    document.addEventListener('DOMContentLoaded', function() {
        // Enhance all images in the content
        const contentImages = document.querySelectorAll('.prose img');
        contentImages.forEach(img => {
            img.classList.add('rounded-lg', 'shadow-sm', 'hover:shadow-md', 'transition-shadow');
            img.style.maxWidth = '100%';
            img.style.height = 'auto';
        });
    });
    </script>

    <!-- Include Lottie Animation Library -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@endpush