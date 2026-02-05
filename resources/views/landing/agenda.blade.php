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
    </style>
@endpush


@section('content')
    <div class="min-h-screen flex flex-col">
        <!-- Modernized Breadcrumbs -->
        <div class="bg-white border-b border-gray-100 pb-1" style="padding-top: 4rem;">
            <div class="w-full">
                <div class=" border-gray-100">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <nav class="py-2" aria-label="Breadcrumb">
                            <ol class="flex items-center space-x-2 text-sm">
                                <li>
                                    <a href="/"
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
                                    <div class="flex items-center text-emerald-600 font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Agenda Kegiatan
                                    </div>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area with improved spacing -->
        <main class="flex-grow bg-white">
            <!-- Interactive CTA-Style Header Section for Puskesmas -->
            <section class="pt-12 pb-16 bg-gradient-to-br from-emerald-600 via-teal-600 to-sky-700 relative overflow-hidden">
                <!-- Subtle Background Elements -->
                <div class="absolute -top-20 -left-20 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-0 right-0 w-[30rem] h-[30rem] bg-sky-400/20 rounded-full blur-3xl"></div>
            
                <!-- Content Container -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                    <!-- Badge -->
                    <div class="relative inline-flex items-center px-4 py-2 rounded-full 
                                            bg-gradient-to-r from-emerald-500/40 via-teal-500/40 to-sky-500/40 
                                            backdrop-blur-lg border border-white/30 shadow-xl group overflow-hidden mb-4"
                        data-aos="fade-down">
                        <!-- Moving Light Effect -->
                        <span
                            class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/10 to-transparent 
                                                -translate-x-full group-hover:translate-x-full transition-all duration-1000 ease-in-out"></span>
            
                        <!-- Badge Content -->
                        <div class="relative z-10 flex items-center">
                            <div class="w-2 h-2 bg-emerald-300 rounded-full mr-2.5 animate-ping"></div>
                            <span class="text-white font-semibold text-sm tracking-wider">AGENDA KEGIATAN</span>
                        </div>
                    </div>
            
                    <!-- Title -->
                    <h2 class="mt-4 text-3xl md:text-4xl lg:text-5xl font-bold text-white drop-shadow-lg" data-aos="fade-up">
                        UPTD {{ $profile->nama_puskesmas }}
                    </h2>
            
                    <!-- Description -->
                    <p class="mt-3 text-base md:text-lg text-emerald-50 max-w-3xl mx-auto leading-relaxed" data-aos="fade-up"
                        data-aos-delay="100">
                        Informasi terkini seputar agenda kegiatan puskesmas.
                    </p>
                </div>
            
                <!-- Bottom Wave -->
                <div class="absolute bottom-0 left-0 right-0 w-full overflow-hidden" style="height: 60px">
                    <svg class="absolute bottom-0 w-full h-full" viewBox="0 0 1440 120" preserveAspectRatio="none" fill="white">
                        <path
                            d="M0,96L60,85.3C120,75,240,53,360,48C480,43,600,53,720,69.3C840,85,960,107,1080,101.3C1200,96,1320,64,1380,48L1440,32L1440,120L1380,120C1320,120,1200,120,1080,120C960,120,840,120,720,120C600,120,480,120,360,120C240,120,120,120,60,120L0,120Z">
                        </path>
                    </svg>
                </div>
            </section>

            <!-- Kategori Filter with Smooth Drag -->
            <section class="pb-3 bg-white shadow-sm" id="agenda-list" x-data="{
                    activeCategory: '{{ request('kategori') ?? 'semua' }}',
                    isDragging: false,
                    startX: 0,
                    scrollLeft: 0,
                    moveDistance: 0,
            
                    handleMouseDown(e) {
                        const slider = $refs.categorySlider;
                        this.isDragging = true;
                        this.startX = e.pageX - slider.offsetLeft;
                        this.scrollLeft = slider.scrollLeft;
                        this.moveDistance = 0;
                        slider.classList.add('cursor-grabbing');
                    },
            
                    handleMouseMove(e) {
                        if(!this.isDragging) return;
                        e.preventDefault();
                        const slider = $refs.categorySlider;
                        const x = e.pageX - slider.offsetLeft;
                        const walk = (x - this.startX) * 2;
                        this.moveDistance += Math.abs(walk);
                        slider.scrollLeft = this.scrollLeft - walk;
                    },
            
                    handleMouseUp(e) {
                        if(this.isDragging) {
                            if(this.moveDistance > 10 && e.target.tagName === 'A') {
                                e.preventDefault();
                            }
                            this.isDragging = false;
                            $refs.categorySlider.classList.remove('cursor-grabbing');
                        }
                    },
            
                    scrollToActiveCategory() {
                        setTimeout(() => {
                            const activeEl = this.$el.querySelector('.active-category');
                            if (activeEl) {
                                const container = $refs.categorySlider;
                                const containerWidth = container.offsetWidth;
                                const buttonWidth = activeEl.offsetWidth;
                                const buttonLeft = activeEl.offsetLeft;
            
                                container.scrollTo({
                                    left: buttonLeft - (containerWidth / 2) + (buttonWidth / 2),
                                    behavior: 'smooth'
                                });
                            }
                        }, 50);
                    }
                }">
                <div class="max-w-7xl pt-4 mx-auto px-4 sm:px-6 lg:px-8">
                    <!-- Modern Header - Agenda Kegiatan Puskesmas -->
                    <div
                        class="relative mb-6 p-4 rounded-2xl bg-gradient-to-br from-emerald-50 to-white shadow-md border border-emerald-100">
                        <div class="flex items-center mb-3">
                            <div class="flex items-center">
                                <div class="h-6 w-1.5 bg-emerald-500 rounded-full mr-2"></div>
                                <span
                                    class="px-3 py-1.5 rounded-full text-emerald-800 text-sm font-semibold flex items-center bg-gradient-to-r from-emerald-100 to-emerald-50 border border-emerald-200 shadow-sm">
                                    <i class="fas fa-calendar-check text-emerald-600 mr-2"></i>
                                    AGENDA KEGIATAN PUSKESMAS TERKINI
                                </span>
                            </div>
                        </div>
                    
                        <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                            Pilih kategori untuk memfilter agenda kegiatan sesuai topik yang Anda minati.
                        </p>
                    
                        <!-- Decorative accent -->
                        <div class="absolute top-0 right-0 w-20 h-20 bg-emerald-100/40 rounded-bl-3xl blur-2xl"></div>
                    </div>
            
                    <div class="relative">
                        <div x-ref="categorySlider" class="overflow-x-auto py-2 scrollbar-hide cursor-grab active:cursor-grabbing"
                            style="-webkit-overflow-scrolling: touch; -ms-overflow-style: none; scrollbar-width: none;"
                            @mousedown="handleMouseDown" @mousemove="handleMouseMove" @mouseup="handleMouseUp"
                            @mouseleave="handleMouseUp">
                            <style>
                                .scrollbar-hide::-webkit-scrollbar {
                                    display: none;
                                }
                            </style>
            
                            <div class="inline-flex gap-2 min-w-full px-1 py-1">
                                <!-- Semua Kategori -->
                                <a href="{{ url('agenda') }}"
                                    @click="if(moveDistance > 10) $event.preventDefault(); else { activeCategory = 'semua'; scrollToActiveCategory(); }"
                                    :class="{ 'bg-emerald-600 text-white shadow-md active-category': activeCategory === 'semua', 
                                               'bg-gray-100/80 text-gray-600 hover:bg-gray-200 hover:text-gray-700': activeCategory !== 'semua' }"
                                    class="shrink-0 px-4 py-2 rounded-full text-sm font-medium transition-colors border border-gray-200 flex items-center">
                                    <i class="fas fa-th-large mr-1.5 text-xs"></i>
                                    Semua Kategori
                                </a>
            
                                <!-- Loop kategori dari DB -->
                                @foreach($categories as $category)
                                <a href="{{ url('agenda?kategori='.$category->slug) }}"
                                    @click="if(moveDistance > 10) $event.preventDefault(); else { activeCategory = '{{ $category->slug }}'; scrollToActiveCategory(); }"
                                    :class="{ 'bg-emerald-600 text-white shadow-md active-category': activeCategory === '{{ $category->slug }}', 
                                                   'bg-gray-100/80 text-gray-600 hover:bg-gray-200 hover:text-gray-700': activeCategory !== '{{ $category->slug }}' }"
                                    class="shrink-0 px-4 py-2 rounded-full text-sm font-medium transition-colors border border-gray-200 flex items-center">
                                    <i class="fas fa-tag mr-1.5 text-xs"></i>
                                    {{ $category->nama }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Agenda Terbaru with Modern Cards - White Background -->
            <section class="bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <!-- Grid Agenda -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($agenda as $item)
                        <div class="group bg-white rounded-2xl shadow-sm overflow-hidden h-full flex flex-col transition-all duration-300 hover:shadow-lg relative border border-gray-100"
                            data-aos="fade-up">
                    
                            <!-- Gambar -->
                            <div class="relative aspect-w-16 aspect-h-9 overflow-hidden">
                                <img class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-105"
                                    src="{{ $item->gambar ? asset('storage/'.$item->gambar) : asset('storage/uploads/kegiatan/default-announcement.jpg') }}"
                                    alt="{{ $item->judul }}" loading="lazy">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                            </div>
                    
                            <!-- Konten -->
                            <div class="p-6 flex flex-col flex-grow relative bg-gray-50">
                                <!-- Tanggal & Kategori -->
                                <div class="flex items-center justify-between mb-4 relative z-10">
                                    <div class="flex items-center">
                                        @php
                                        $bulan = $item->created_at->translatedFormat('M');
                                        $hari = $item->created_at->format('d');
                                        $tahun = $item->created_at->format('Y');
                                        $hariNama = $item->created_at->translatedFormat('l');
                                        @endphp
                                        <div
                                            class="flex flex-col items-center mr-3 bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-lg shadow-sm overflow-hidden border border-emerald-100">
                                            <div class="bg-emerald-500 text-white text-xs font-bold w-full text-center py-0.5 px-2">
                                                {{ $bulan }}
                                            </div>
                                            <div class="text-emerald-700 text-base font-bold py-0.5 px-3">
                                                {{ $hari }}
                                            </div>
                                        </div>
                                        <div class="flex flex-col text-xs">
                                            <span class="text-gray-500 font-medium">{{ $tahun }}</span>
                                            <span class="text-gray-400">{{ $hariNama }}</span>
                                        </div>
                                    </div>
                    
                                    <!-- Kategori -->
                                    <span
                                        class="inline-flex items-center px-2.5 py-1.5 rounded-md text-xs font-medium text-white {{ $item->kategori->id == 2 ? 'bg-amber-500 border-amber-600' : 'bg-emerald-500 border-emerald-600' }} shadow-md border-l-4">
                                        <i class="fas fa-bullhorn mr-1"></i>
                                        {{ $item->kategori->nama }}
                                    </span>
                                </div>
                    
                                <!-- Judul -->
                                <a href="{{ route('agenda.show', $item->id) }}" class="block group relative z-10">
                                    <div
                                        class="relative h-0.5 w-12 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-full mb-3 group-hover:w-24 transition-all">
                                    </div>
                                    <h3
                                        class="text-xl font-bold text-gray-900 leading-tight mb-3 line-clamp-2 group-hover:text-emerald-600 transition-colors">
                                        {{ $item->judul }}
                                    </h3>
                                </a>
                    
                                <!-- Deskripsi -->
                                <div class="mt-1 relative z-10">
                                    <p class="text-gray-600 text-sm leading-relaxed mb-5 pl-3 border-l-2 border-emerald-200 line-clamp-2">
                                        {{ $item->deskripsi }}
                                    </p>
                                </div>
                    
                                <!-- Lokasi & Waktu -->
                                <div class="text-sm text-gray-600 space-y-1 mb-4 relative z-10">
                                    @if($item->lokasi)
                                    <div class="flex items-start">
                                        <i class="fas fa-map-marker-alt text-emerald-500 mr-2 mt-0.5"></i>
                                        <span>{{ $item->lokasi }}</span>
                                    </div>
                                    @endif
                                    @if($item->waktu)
                                    <div class="flex items-start">
                                        <i class="fas fa-clock text-emerald-500 mr-2 mt-0.5"></i>
                                        <span>{{ $item->waktu }}</span>
                                    </div>
                                    @endif
                                </div>
                    
                                <!-- Author & Link -->
                                <div class="mt-auto pt-4 border-t border-dashed border-gray-200 flex justify-between items-center">
                                    <div class="flex items-center text-sm text-gray-500">
                                        <i class="fas fa-user text-emerald-500 mr-2"></i>
                                        {{ $item->author->pegawai->nama_pegawai ?? 'Admin' }}
                                    </div>
                                    <a href="{{ route('agenda.show', $item->id) }}"
                                        class="inline-flex items-center bg-emerald-50 hover:bg-emerald-100 text-emerald-600 font-medium text-sm rounded-full px-4 py-1.5 transition-colors">
                                        <span>Baca selengkapnya</span>
                                        <svg class="ml-1.5 w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="col-span-3 text-center text-gray-500">Belum ada informasi.</p>
                        @endforelse
                    </div>
            
                    <!-- Pagination -->
                    <div class="mt-6 mb-6 flex justify-center">
                        {{ $agenda->links() }}
                    </div>
                </div>
            </section>
        </main>

        <!-- Enhanced Footer -->
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

    <!-- Scripts -->
    <script src="/livewire/livewire.min.js?id=df3a17f2" data-csrf="xpEHDwP3CiRtk2zuanYt6i2Wr5IzA6YSFSxCcp1Y"
        data-update-uri="/livewire/update" data-navigate-once="true"></script>

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

    <!-- Include Lottie Animation Library -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@endpush