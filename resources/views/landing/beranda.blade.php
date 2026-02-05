@extends('layouts.landing')

@section('title', 'Beranda')

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
    
    
    <!-- Page Specific Styles -->
    <style>
        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }
    
        /* Hero pattern yang lebih halus */
        .hero-pattern {
            position: relative;
            background: linear-gradient(to right, rgba(6, 95, 70, 0.9), rgba(6, 95, 70, 0.7));
        }
    
        /* Efek hover pada dots vertikal */
        .dots-vertical button:hover span {
            height: 8px;
            opacity: 0.9;
        }
    
        /* Efek animasi untuk teks */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
    
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    
        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease forwards;
        }
    
        .animate-slight-zoom {
            animation: slightZoom 10s ease-out forwards;
        }
    
        @keyframes slightZoom {
            0% {
                transform: scale(1);
            }
    
            100% {
                transform: scale(1.05);
            }
        }
    </style>
@endpush

@section('content')
    <div>
        {{-- hero --}}
        @include('landing.components.hero')

        <!-- Statistics Puskesmas -->
        @include('landing.components.beranda.statistik')

        <!-- Sambutan & Program Section with Interactive 3D Elements -->
        @include('landing.components.beranda.sambutan')

        <!-- Berita Terbaru - Modern Slider Layout with Enhanced Cards -->
        @include('landing.components.beranda.berita')

        <!-- Agenda & Kegiatan - Modern Slider Layout Matched with Berita Style -->
        @include('landing.components.beranda.kegiatan')

        <!-- Modern CTA Section -->
        <section class="pt-12 pb-20 bg-gradient-to-br from-emerald-600 via-teal-600 to-sky-700 relative overflow-hidden">
            <!-- Subtle Background Elements -->
            <div class="absolute -top-20 -left-20 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-0 right-0 w-[30rem] h-[30rem] bg-sky-400/20 rounded-full blur-3xl"></div>
        
            <!-- Decorative Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/10 via-transparent to-white/5 mix-blend-overlay"></div>
        
            <!-- Content Container -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center">
                    <!-- Badge -->
                    <div class="relative inline-flex items-center px-4 py-2 rounded-full 
                                bg-gradient-to-r from-emerald-500/40 via-teal-500/40 to-sky-500/40 
                                backdrop-blur-lg border border-white/30 shadow-xl group overflow-hidden" data-aos="fade-down">
                        <!-- Moving Light Effect -->
                        <span
                            class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/10 to-transparent 
                                    -translate-x-full group-hover:translate-x-full transition-all duration-1000 ease-in-out"></span>
        
                        <!-- Badge Content -->
                        <div class="relative z-10 flex items-center">
                            <div class="w-2 h-2 bg-emerald-300 rounded-full mr-2.5 animate-ping"></div>
                            <span class="text-white font-semibold text-sm tracking-wider">PUSKESMAS DIGITAL</span>
                        </div>
                    </div>
        
                    <!-- Title -->
                    <h2 class="mt-4 text-3xl md:text-4xl font-bold text-white drop-shadow-lg">
                        Layanan & Informasi Puskesmas Cikalapa
                    </h2>
        
                    <!-- Description -->
                    <p class="mt-3 text-base md:text-lg text-emerald-50 max-w-3xl mx-auto leading-relaxed">
                        Temukan informasi seputar layanan kesehatan, agenda kegiatan, serta program promotif dan preventif
                        yang diselenggarakan oleh <span class="font-semibold text-white">Puskesmas Cikalapa</span> untuk
                        meningkatkan kualitas hidup masyarakat.
                    </p>
        
                    <!-- Buttons -->
                    <div class="mt-8 flex flex-col px-12 sm:flex-row gap-4 justify-center">
                        <a href="{{ route('layanan') }}" class="inline-flex items-center justify-center px-4 py-3 text-base font-medium rounded-lg 
                                    bg-white text-emerald-700 hover:bg-gray-100 
                                    shadow-lg hover:shadow-2xl transition-all duration-300">
                            <i class="fas fa-hospital-user mr-2"></i> Lihat Layanan Puskesmas
                        </a>
        
                        <a href="{{ route('profil') }}" class="inline-flex items-center justify-center px-4 py-3 text-base font-medium rounded-lg 
                                    bg-gradient-to-r from-emerald-500 to-teal-600 text-white 
                                    hover:from-emerald-600 hover:to-sky-600 
                                    shadow-lg hover:shadow-2xl transition-all duration-300">
                            <i class="fas fa-info-circle mr-2"></i> Tentang Puskesmas
                        </a>
                    </div>
                </div>
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

        <!-- Modern Maps & Contact Section with Enhanced Layout -->
        @include('landing.components.beranda.kontak')
    </div>

    <!-- Enhanced Footer -->
    @include('landing.components.footer')
@endsection

@push('script')
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
    <script src="{{ asset('js/landing/sweetalert2@11.js') }}"></script>
    <script>
        function modernCarousel() {
        return {
            currentSlide: 0,
            totalSlides: 3,
            autoplaySpeed: 7000, // Time between slides (ms) - 7 seconds
            transitionDuration: 800, // Duration of transition animation (ms) - 0.8 seconds
            autoplayTimeout: null,

            init() {
                if (this.totalSlides > 1) {
                    this.startAutoplay();

                    // Stop autoplay when user interacts with the carousel
                    document.querySelector('section').addEventListener('mouseenter', () => {
                        this.stopAutoplay();
                    });

                    document.querySelector('section').addEventListener('touchstart', () => {
                        this.stopAutoplay();
                    }, {passive: true});

                    // Resume autoplay when user leaves
                    document.querySelector('section').addEventListener('mouseleave', () => {
                        this.startAutoplay();
                    });

                    document.querySelector('section').addEventListener('touchend', () => {
                        this.startAutoplay();
                    }, {passive: true});
                }
            },

            nextSlide() {
                this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
            },

            prevSlide() {
                this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
            },

            startAutoplay() {
                this.stopAutoplay();
                this.autoplayTimeout = setTimeout(() => {
                    this.nextSlide();
                    this.startAutoplay();
                }, this.autoplaySpeed);
            },

            stopAutoplay() {
                clearTimeout(this.autoplayTimeout);
            }
        };
    }

    // Observer for lazy loading additional content
    document.addEventListener('DOMContentLoaded', () => {
        // Create an intersection observer for any additional content
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // If the element has data-src, replace src with it
                    const img = entry.target.querySelector('img[data-src]');
                    if (img) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                    }
                    observer.unobserve(entry.target);
                }
            });
        }, {
            rootMargin: '0px 0px 200px 0px' // Load when within 200px of viewport
        });

        // Observe sections with images
        document.querySelectorAll('.lazy-section').forEach(section => {
            observer.observe(section);
        });
    });

    // Intersection Observer for counting animation when scrolled into view
    document.addEventListener('DOMContentLoaded', () => {
        // Setup the intersection observer
        const counterObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Check if we've already triggered the animation
                    if (!entry.target._x_isShown) {
                        entry.target._x_isShown = true;

                        // Get the Alpine component instance
                        const component = Alpine.$data(entry.target);

                        // Set up the animation
                        const duration = 1000;
                        let startTime = null;

                        function step(timestamp) {
                            if (!startTime) startTime = timestamp;
                            const progress = Math.min((timestamp - startTime) / duration, 1);
                            component.value = Math.floor(progress * component.target);

                            if (progress < 1) {
                                window.requestAnimationFrame(step);
                            } else {
                                component.value = component.target; // Ensure we end at exactly the target
                            }
                        }

                        // Start the animation
                        window.requestAnimationFrame(step);

                        // Unobserve after animation starts
                        observer.unobserve(entry.target);
                    }
                }
            });
        }, {
            threshold: 0.1, // Trigger when at least 10% of the element is visible
            rootMargin: '0px 0px -50px 0px' // Adjust the trigger point (starts animation a bit before the element is fully in view)
        });

        // Observe all counter elements
        document.querySelectorAll('.counter-item').forEach(counter => {
            counterObserver.observe(counter);
        });
    });
    </script>
    <!-- Include Lottie Animation Library -->
    <script src="{{ asset('js/landing/lottie-player.js') }}"></script>
@endpush
