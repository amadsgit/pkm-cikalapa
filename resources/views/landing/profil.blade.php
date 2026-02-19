@extends('layouts.landing')

@section('title', 'Profil Puskesmas')

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

    <style>
        /* Hide scrollbar for clean look */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
    
        .scrollbar-hide {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    
        /* Add touch scroll momentum for mobile */
        #tabPills {
            -webkit-overflow-scrolling: touch;
        }
    </style>
@endpush()

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
                                        Profil Puskesmas
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
                                backdrop-blur-lg border border-white/30 shadow-xl group overflow-hidden mb-4" data-aos="fade-down">
                        <!-- Moving Light Effect -->
                        <span
                            class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/10 to-transparent 
                                    -translate-x-full group-hover:translate-x-full transition-all duration-1000 ease-in-out"></span>
            
                        <!-- Badge Content -->
                        <div class="relative z-10 flex items-center">
                            <div class="w-2 h-2 bg-emerald-300 rounded-full mr-2.5 animate-ping"></div>
                            <span class="text-white font-semibold text-sm tracking-wider">PROFILE PUSKESMAS</span>
                        </div>
                    </div>
            
                    <!-- Title -->
                    <h2 class="mt-4 text-3xl md:text-4xl lg:text-5xl font-bold text-white drop-shadow-lg" data-aos="fade-up">
                        UPTD {{ $profile->nama_puskesmas }}
                    </h2>
            
                    <!-- Description -->
                    <p class="mt-3 text-base md:text-lg text-emerald-50 max-w-3xl mx-auto leading-relaxed" data-aos="fade-up"
                        data-aos-delay="100">
                        Informasi umum, visi misi, sejarah, struktur organisasi puskemas dan wilayah kerja puskesmas.
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

            <div x-data="tabNavigation">
                <!-- Tabs Section - Modern Mobile Slider -->
                <section class="py-4 bg-white sticky top-0 z-30 shadow-sm">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="relative">

                            <!-- Tab Pills Container -->
                            <div id="tabPills"
                                class="flex items-center gap-3 overflow-x-auto pb-2 pt-1 scrollbar-hide scroll-smooth px-2">
                                <button @click="activeTab = 'tentang-puskesmas'; $nextTick(() => scrollToActiveTab())"
                                    id="tab-tentang-puskesmas" :class="{
                            'bg-emerald-500 text-white ring-2 ring-emerald-500/20 shadow-lg shadow-emerald-500/20': activeTab === 'tentang-puskesmas',
                            'bg-gray-100/80 text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:shadow-md': activeTab !== 'tentang-puskesmas'
                        }" class="shrink-0 inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-full whitespace-nowrap transition-all duration-300">
                                    <i class="fas fa-info-circle text-[12px]"></i>
                                    <span class="hidden sm:inline">Informasi</span>Umum
                                </button>
                                <button @click="activeTab = 'visi-misi'; $nextTick(() => scrollToActiveTab())"
                                    id="tab-visi-misi" :class="{
                            'bg-emerald-500 text-white ring-2 ring-emerald-500/20 shadow-lg shadow-emerald-500/20': activeTab === 'visi-misi',
                            'bg-gray-100/80 text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:shadow-md': activeTab !== 'visi-misi'
                        }" class="shrink-0 inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-full whitespace-nowrap transition-all duration-300">
                                    <i class="fas fa-bullseye text-[12px]"></i>
                                    Visi & Misi
                                </button>
                                <button @click="activeTab = 'sejarah'; $nextTick(() => scrollToActiveTab())"
                                    id="tab-sejarah" :class="{
                            'bg-emerald-500 text-white ring-2 ring-emerald-500/20 shadow-lg shadow-emerald-500/20': activeTab === 'sejarah',
                            'bg-gray-100/80 text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:shadow-md': activeTab !== 'sejarah'
                        }" class="shrink-0 inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-full whitespace-nowrap transition-all duration-300">
                                    <i class="fas fa-history text-[12px]"></i>
                                    Sejarah
                                </button>
                                <button @click="activeTab = 'struktur-organisasi'; $nextTick(() => scrollToActiveTab())"
                                    id="tab-struktur-organisasi" :class="{
                            'bg-emerald-500 text-white ring-2 ring-emerald-500/20 shadow-lg shadow-emerald-500/20': activeTab === 'struktur-organisasi',
                            'bg-gray-100/80 text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:shadow-md': activeTab !== 'struktur-organisasi'
                        }" class="shrink-0 inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-full whitespace-nowrap transition-all duration-300">
                                    <i class="fas fa-sitemap text-[12px]"></i>
                                    <span class="hidden sm:inline">Struktur Organisasi</span><span
                                        class="sm:hidden">Struktur</span>
                                </button>
                                <button @click="activeTab = 'geografis-wilayah-kerja'; $nextTick(() => scrollToActiveTab())"
                                    id="tab-geografis-wilayah-kerja" :class="{
                            'bg-emerald-500 text-white ring-2 ring-emerald-500/20 shadow-lg shadow-emerald-500/20': activeTab === 'geografis-wilayah-kerja',
                            'bg-gray-100/80 text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:shadow-md': activeTab !== 'geografis-wilayah-kerja'
                        }" class="shrink-0 inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-full whitespace-nowrap transition-all duration-300">
                                    <i class="fas fa-map-marked-alt text-[12px]"></i>
                                    <span class="hidden sm:inline">Geografis Wilayah Kerja</span><span
                                        class="sm:hidden">Geografis</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Tab Contents -->
                <section class="py-8 bg-white">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <!-- Informasi Umum Tab - Clean Modern Design with Enhanced Icons -->
                        <div x-show="activeTab === 'tentang-puskesmas'" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                            <div class="bg-white">
                                <!-- Modern Header - Matched with UMKM Style -->
                                <div class="mb-5">
                                    <!-- Title and Button in One Row -->
                                    <div class="flex items-center justify-between mb-3">
                                        <!-- Left: Title Badge with Icon -->
                                        <div class="flex items-center">
                                            <div class="h-6 w-1 bg-emerald-500 rounded-full mr-2"></div>
                                            <span
                                                class="bg-emerald-50 px-2.5 py-1 rounded-full text-emerald-800 text-sm font-semibold flex items-center">
                                                <i class="fas fa-home-alt text-emerald-600 mr-1.5"></i>
                                                TENTANG PUSKESMAS
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Main Content with Clean Layout -->
                                @include('landing.components.profile.informasiUmum')
                            </div>
                        </div>

                        <!-- Visi & Misi Tab -->
                        @include('landing.components.profile.visiMisi')

                        <!-- Sejarah Puskesmas Tab -->
                        @include('landing.components.profile.sejarah')

                        <!-- Struktur Organisasi Tab -->
                        @include('landing.components.profile.strukturOrganisasi')

                        <!-- Geografis Puskesmas Tab - Enhanced Modern Design -->
                        @include('landing.components.profile.geografis')
                    </div>
                </section>
            </div>
        </main>
    </div>

    <!-- Enhanced Footer -->
    @include('landing.components.footer')
@endsection()

@push('script')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('tabNavigation', () => ({
                activeTab: 'tentang-puskesmas',
                init() {
                    // Set active tab from URL hash if available
                    const hash = window.location.hash.substring(1);
                    if (['tentang-puskesmas', 'visi-misi', 'sejarah', 'struktur-organisasi', 'geografis-wilayah-kerja'].includes(hash)) {
                        this.activeTab = hash;
                        this.$nextTick(() => this.scrollToActiveTab());
                    }

                    // Update URL when tab changes
                    this.$watch('activeTab', value => {
                        history.replaceState(null, null, value ? `#${value}` : window.location.pathname);
                        this.scrollToActiveTab();
                    });
                },
                scrollToActiveTab() {
                    setTimeout(() => {
                        const activeTabEl = document.getElementById('tab-' + this.activeTab);
                        if (activeTabEl) {
                            // Scroll the tab into center view
                            const container = document.getElementById('tabPills');
                            const containerWidth = container.offsetWidth;
                            const tabWidth = activeTabEl.offsetWidth;
                            const tabLeft = activeTabEl.offsetLeft;

                            container.scrollTo({
                                left: tabLeft - (containerWidth / 2) + (tabWidth / 2),
                                behavior: 'smooth'
                            });
                        }
                    }, 50);
                }
            }));

            Alpine.data('imageSlider', () => ({
                currentIndex: 0,
                totalImages: 3,
                touchStartX: 0,
                touchEndX: 0,

                init() {
                    // Auto-advance slides every 5 seconds if there are multiple images
                    if (this.totalImages > 1) {
                        this.startAutoSlide();
                    }
                },

                startAutoSlide() {
                    this.autoSlideInterval = setInterval(() => {
                        this.next();
                    }, 5000);
                },

                stopAutoSlide() {
                    if (this.autoSlideInterval) {
                        clearInterval(this.autoSlideInterval);
                    }
                },

                next() {
                    this.stopAutoSlide();
                    this.currentIndex = (this.currentIndex + 1) % this.totalImages;
                    this.startAutoSlide();
                },

                prev() {
                    this.stopAutoSlide();
                    this.currentIndex = (this.currentIndex - 1 + this.totalImages) % this.totalImages;
                    this.startAutoSlide();
                },

                touchStart(e) {
                    this.touchStartX = e.changedTouches[0].screenX;
                },

                touchEnd(e) {
                    this.touchEndX = e.changedTouches[0].screenX;
                    this.handleSwipe();
                },

                handleSwipe() {
                    const threshold = 50;
                    const swipeDistance = this.touchEndX - this.touchStartX;

                    if (swipeDistance > threshold) {
                        // Swiped right, go to previous
                        this.prev();
                    } else if (swipeDistance < -threshold) {
                        // Swiped left, go to next
                        this.next();
                    }
                }
            }));
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

    <!-- Include Lottie Animation Library -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@endpush()