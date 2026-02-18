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
                                    Layanan Publik
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
            <section
                class="relative overflow-hidden bg-gradient-to-br from-emerald-600 via-teal-600 to-sky-700 py-12 md:py-16 text-center">
            
                <!-- === Decorative Background Layers === -->
                <!-- Subtle Grid Pattern -->
                <div
                    class="absolute inset-0 opacity-[0.07] bg-[radial-gradient(circle_at_1px_1px,white_1px,transparent_0)] bg-[size:24px_24px]">
                </div>
            
                <!-- Floating Orbs -->
                <div class="absolute -top-32 -left-32 w-[28rem] h-[28rem] bg-white/10 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-0 right-0 w-[22rem] h-[22rem] bg-sky-400/20 rounded-full blur-3xl"></div>
            
                <!-- Floating Light Particles (Bigger & Glowing) -->
                <div class="absolute inset-0 overflow-hidden pointer-events-none">
                    <div
                        class="absolute top-[15%] left-[20%] w-4 h-4 bg-white/50 rounded-full blur-[2px] shadow-[0_0_12px_2px_rgba(255,255,255,0.4)] animate-[float_6s_ease-in-out_infinite]">
                    </div>
                    <div
                        class="absolute top-[40%] left-[75%] w-3 h-3 bg-emerald-300/70 rounded-full blur-[2px] shadow-[0_0_10px_2px_rgba(52,211,153,0.5)] animate-[float_8s_ease-in-out_infinite_reverse]">
                    </div>
                    <div
                        class="absolute top-[65%] left-[35%] w-5 h-5 bg-sky-300/60 rounded-full blur-[3px] shadow-[0_0_16px_3px_rgba(125,211,252,0.6)] animate-[float_7s_ease-in-out_infinite]">
                    </div>
                    <div
                        class="absolute top-[80%] left-[80%] w-3.5 h-3.5 bg-teal-200/70 rounded-full blur-[3px] shadow-[0_0_14px_3px_rgba(94,234,212,0.5)] animate-[float_9s_ease-in-out_infinite_reverse]">
                    </div>
                </div>
            
                <!-- Floating Animation -->
                <style>
                    @keyframes float {
            
                        0%,
                        100% {
                            transform: translateY(0) translateX(0);
                            opacity: 0.85;
                        }
            
                        50% {
                            transform: translateY(-18px) translateX(12px);
                            opacity: 1;
                        }
                    }
                </style>
            
                <!-- === Content === -->
                <div class="relative z-10 max-w-6xl mx-auto px-6">
                    <!-- Animated Badge -->
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 shadow-lg overflow-hidden mb-4 group"
                        data-aos="fade-down">
                        <span
                            class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/15 to-transparent -translate-x-full group-hover:translate-x-full transition-all duration-[1800ms] ease-out"></span>
                        <div class="relative z-10 flex items-center gap-2">
                            <span class="w-2.5 h-2.5 bg-emerald-300 rounded-full animate-ping"></span>
                            <span class="text-emerald-50 font-semibold text-sm tracking-wider">LAYANAN KESEHATAN MASYARAKAT</span>
                        </div>
                    </div>
            
                    <!-- Title -->
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight drop-shadow-md"
                        data-aos="fade-up">
                        UPTD {{ $profile->nama_puskesmas }}
                    </h2>
            
                    <!-- Description -->
                    <p class="mt-3 text-emerald-50/90 text-base md:text-lg max-w-2xl mx-auto leading-relaxed" data-aos="fade-up"
                        data-aos-delay="100">
                        Informasi seputar pelayanan kesehatan masyarakat yang ada di puskesmas kami.
                    </p>
                </div>
            
                <!-- === Decorative Wave === -->
                <div class="absolute bottom-0 left-0 right-0 overflow-hidden h-[45px]">
                    <svg viewBox="0 0 1440 120" preserveAspectRatio="none" class="absolute bottom-0 w-full h-full fill-white">
                        <path
                            d="M0,96L60,85.3C120,75,240,53,360,48C480,43,600,53,720,69.3C840,85,960,107,1080,101.3C1200,96,1320,64,1380,48L1440,32L1440,120L1380,120C1320,120,1200,120,1080,120C960,120,840,120,720,120C600,120,480,120,360,120C240,120,120,120,60,120L0,120Z">
                        </path>
                    </svg>
                </div>
            </section>

            <!-- Kategori Filter with Smooth Drag -->
            <section class="pb-3 bg-white shadow-sm" id="layanan-list" x-data="{
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
                        if (!this.isDragging) return;
                        e.preventDefault();
                        const slider = $refs.categorySlider;
                        const x = e.pageX - slider.offsetLeft;
                        const walk = (x - this.startX) * 2;
                        this.moveDistance += Math.abs(walk);
                        slider.scrollLeft = this.scrollLeft - walk;
                    },
            
                    handleMouseUp(e) {
                        if (this.isDragging) {
                            if (this.moveDistance > 10 && e.target.tagName === 'A') {
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
                }" x-init="scrollToActiveCategory()">
                <div class="max-w-7xl pt-4 mx-auto px-4 sm:px-6 lg:px-8">
                    <div
                        class="mb-8 relative overflow-hidden rounded-2xl bg-gradient-to-r from-emerald-50 to-white/80 border border-emerald-100 shadow-sm hover:shadow-md transition-all duration-500 backdrop-blur-sm">
                        <!-- Accent gradient strip -->
                        <div
                            class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-emerald-400 via-emerald-500 to-emerald-600 rounded-l-2xl">
                        </div>
                    
                        <!-- Header content -->
                        <div class="pl-5 pr-6 py-5 relative z-10">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center space-x-2">
                                    <span
                                        class="inline-flex items-center bg-gradient-to-r from-emerald-500 to-teal-500 text-white text-xs sm:text-sm font-semibold px-3 py-1.5 rounded-full shadow-md">
                                        <i class="fas fa-stethoscope mr-1.5 text-white/90"></i>
                                        LAYANAN KESEHATAN PUSKESMAS
                                    </span>
                                </div>
                    
                                <!-- Optional: icon decoration on right side -->
                                <div class="hidden sm:block text-emerald-400/70">
                                    <i class="fas fa-heartbeat text-lg animate-pulse"></i>
                                </div>
                            </div>
                    
                            <p class="text-gray-700 text-sm md:text-base leading-relaxed pl-1">
                                Temukan berbagai layanan kesehatan Puskesmas sesuai kebutuhan Anda — dari pemeriksaan umum hingga layanan
                                penunjang medis.
                            </p>
                    
                            <!-- Small underline effect -->
                            <div class="mt-3 h-0.5 w-20 bg-gradient-to-r from-emerald-400 to-teal-500 rounded-full"></div>
                        </div>
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
                                <!-- Tombol Semua -->
                                <a href="{{ url('layanan') }}"
                                    @click="if(moveDistance > 10) $event.preventDefault(); else { activeCategory = 'semua'; scrollToActiveCategory(); }"
                                    :class="{
                                        'bg-emerald-600 text-white shadow-md active-category': activeCategory === 'semua',
                                        'bg-gray-50 text-gray-700 hover:bg-gray-100 hover:text-gray-800': activeCategory !== 'semua'
                                    }"
                                    class="shrink-0 px-4 py-2.5 rounded-full text-sm font-medium transition-colors border border-gray-200 flex items-center">
                                    <i class="fas fa-th-large mr-1.5 text-xs"></i>
                                    Semua Kategori
                                </a>
            
                                <!-- Loop kategori dari DB -->
                                @foreach($kategori as $k)
                                <a href="{{ url('layanan?kategori='.$k->slug) }}"
                                    @click="if(moveDistance > 10) $event.preventDefault(); else { activeCategory = '{{ $k->slug }}'; scrollToActiveCategory(); }"
                                    :class="{
                                        'bg-emerald-600 text-white shadow-md active-category': activeCategory === '{{ $k->slug }}',
                                        'bg-gray-50 text-gray-700 hover:bg-gray-100 hover:text-gray-800': activeCategory !== '{{ $k->slug }}'
                                    }"
                                    class="shrink-0 px-4 py-2.5 rounded-full text-sm font-medium transition-colors border border-gray-200 flex items-center">
                                    <i class="fas fa-tag mr-1.5 text-xs"></i>
                                    {{ $k->nama_kategori }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Layanan Puskesmas --> 
            <section class="bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
                                        <p
                                            class="text-[11px] text-orange-500 italic mt-0.5 leading-tight flex items-center gap-1">
                                            <i class="fas fa-info-circle text-orange-500"></i>
                                            Tarif dapat berubah sewaktu-waktu sesuai ketentuan Peraturan Daerah (Perda) yang berlaku.
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

                    <!-- Pagination -->
                    <div class="mt-6 mb-6 flex justify-center">
                        {{ $layanan->links() }}
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