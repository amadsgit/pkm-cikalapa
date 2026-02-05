<!-- Modern Hero Section with Improved Mobile Responsiveness -->
<section class="relative overflow-hidden min-h-screen" x-data="modernCarousel()">
    <!-- Background Layer - Converting to img elements for lazy loading -->
    <div class="absolute inset-0 w-full h-full">
        <div x-show="currentSlide === 0" x-transition:enter="transition ease-out" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            :style="'transition-duration: ' + transitionDuration + 'ms'"
            class="absolute inset-0 w-full h-full overflow-hidden">
            <img src="/images/background.jpg" alt="Slide 1" loading="lazy"
                class="absolute inset-0 w-full h-full object-cover object-center">
            <!-- Improved overlay for better text visibility -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/40 to-black/10"></div>
        </div>
        <div x-show="currentSlide === 1" x-transition:enter="transition ease-out" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            :style="'transition-duration: ' + transitionDuration + 'ms'"
            class="absolute inset-0 w-full h-full overflow-hidden">
            <img src="/images/background2.jpg" alt="Slide 2" loading="lazy"
                class="absolute inset-0 w-full h-full object-cover object-center">
            <!-- Improved overlay for better text visibility -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/40 to-black/10"></div>
        </div>
        <div x-show="currentSlide === 2" x-transition:enter="transition ease-out" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            :style="'transition-duration: ' + transitionDuration + 'ms'"
            class="absolute inset-0 w-full h-full overflow-hidden">
            <img src="/images/background3.jpg" alt="Slide 3" loading="lazy"
                class="absolute inset-0 w-full h-full object-cover object-center">
            <!-- Improved overlay for better text visibility -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/40 to-black/10"></div>
        </div>
    </div>

    <!-- Mobile Slide Indicators: Top Right Corner -->
    <div class="absolute top-4 right-4 z-30 md:hidden">
        <div class="flex items-center gap-1.5">
            <button @click="currentSlide = 0"
                class="h-1.5 transition-all duration-300 focus:outline-none rounded-full overflow-hidden"
                :class="{'w-6 bg-white': currentSlide === 0, 'w-3 bg-white/30 hover:bg-white/50': currentSlide !== 0}">
            </button>
            <button @click="currentSlide = 1"
                class="h-1.5 transition-all duration-300 focus:outline-none rounded-full overflow-hidden"
                :class="{'w-6 bg-white': currentSlide === 1, 'w-3 bg-white/30 hover:bg-white/50': currentSlide !== 1}">
            </button>
            <button @click="currentSlide = 2"
                class="h-1.5 transition-all duration-300 focus:outline-none rounded-full overflow-hidden"
                :class="{'w-6 bg-white': currentSlide === 2, 'w-3 bg-white/30 hover:bg-white/50': currentSlide !== 2}">
            </button>
        </div>
    </div>

    <!-- DESKTOP LAYOUT (Hidden on mobile) -->
    <div class="absolute inset-0 hidden md:grid md:grid-cols-12 z-10">
        <!-- Main Content Area (8 cols on desktop) -->
        <div class="md:col-span-8 flex items-center">
            <div class="w-full max-w-4xl px-8 py-16">
                <!-- Modern Badge -->
                <div class="relative inline-flex items-center px-5 py-2.5 rounded-lg bg-gradient-to-r from-emerald-500/20 to-emerald-600/20 backdrop-blur-md border border-white/20 shadow-lg group overflow-hidden"
                    data-aos="fade-down" data-aos-duration="800">
                    <!-- Animated Glow Effect -->
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-emerald-400/30 to-emerald-600/30 rounded-lg blur opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                    </div>

                    <!-- Badge Content -->
                    <span
                        class="relative z-10 text-white font-semibold text-sm uppercase tracking-wider flex items-center">
                        <span
                            class="w-3 h-3 bg-emerald-400 rounded-full mr-2.5 animate-pulse shadow-emerald-400 shadow-md ring-2 ring-emerald-300"></span>
                        PUSKESMAS DIGITAL
                    </span>
                </div>

                <!-- Clear, Bold Typography -->
                <h1 class="mt-3 text-6xl md:text-7xl font-bold text-white leading-none" data-aos="fade-up"
                    data-aos-duration="800">
                    Puskesmas Cikalapa </h1>

                <!-- Clear Subtitle with Better Contrast -->
                <p class="mt-5 text-white text-xl font-light max-w-2xl leading-relaxed" data-aos="fade-up"
                    data-aos-delay="100" data-aos-duration="800">
                    Kecamatan Subang, Kabupaten Subang, Provinsi Jawa Barat </p>

                <!-- Modern Action Buttons -->
                <div class="mt-10 flex flex-wrap gap-4" data-aos="fade-up" data-aos-delay="200">
                    <a href="/profil"
                        class="inline-flex items-center justify-center px-6 py-2 border border-white/30 text-base font-medium rounded-md text-white bg-white/10 backdrop-blur-sm hover:bg-white/20 transition">
                        <i class="fas fa-info-circle mr-2"></i> Profil Puskesmas
                    </a>
                    <a href="/layanan"
                        class="inline-flex items-center justify-center px-6 py-2 text-base font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 transition">
                        <i class="fas fa-file-alt mr-2"></i> Layanan Puskesmas
                    </a>
                </div>
            </div>
        </div>

        <!-- Feature Cards Area (4 cols on desktop) -->
        <div class="md:col-span-4 bg-black/50 backdrop-blur-md">
            <div class="h-full flex flex-col justify-center p-8">
                <!-- Heading -->
                <div class="mb-8">
                    <h2 class="text-white text-xl font-bold mb-1">TERPOPULER</h2>
                    <div class="h-1 w-16 bg-emerald-500 rounded-full"></div>
                </div>

                <!-- Fitur Cards -->
                <div class="space-y-4">
                    <!-- Layanan Kesehatan -->
                    <a href="#"
                        class="group block p-4 bg-white/5 hover:bg-white/10 border border-white/10 rounded-lg transition-all duration-300">
                        <div class="flex items-center">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-full bg-emerald-600 flex items-center justify-center">
                                <i class="fas fa-stethoscope text-white text-lg"></i>
                            </div>
                            <div class="ml-4 flex-1">
                                <h3 class="text-white text-lg font-medium mb-0.5">Cek Kesehatan Gratis (CKG) </h3>
                                <p class="text-white/70 text-sm">Pelayanan Cek Kesehatan Gratis bagi Masyarakat</p>
                            </div>
                            <div class="ml-2">
                                <i class="fas fa-chevron-right text-white/40 group-hover:text-white transition-all"></i>
                            </div>
                        </div>
                    </a>

                    <!-- Jadwal Dokter -->
                    <a href="{{ route('layanan') }}"
                        class="group block p-4 bg-white/5 hover:bg-white/10 border border-white/10 rounded-lg transition-all duration-300">
                        <div class="flex items-center">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-full bg-emerald-600 flex items-center justify-center">
                                <i class="fas fa-user-md text-white text-lg"></i>
                            </div>
                            <div class="ml-4 flex-1">
                                <h3 class="text-white text-lg font-medium mb-0.5">Layanan Kesehatan Puskesmas</h3>
                                <p class="text-white/70 text-sm">Layanan Kesehatan Masyarakat</p>
                            </div>
                            <div class="ml-2">
                                <i class="fas fa-chevron-right text-white/40 group-hover:text-white transition-all"></i>
                            </div>
                        </div>
                    </a>

                    <!-- Rekam Medis -->
                    <a href="{{ route('informasi') }}"
                        class="group block p-4 bg-white/5 hover:bg-white/10 border border-white/10 rounded-lg transition-all duration-300">
                        <div class="flex items-center">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-full bg-emerald-600 flex items-center justify-center">
                                <i class="fas fa-notes-medical text-white text-lg"></i>
                            </div>
                            <div class="ml-4 flex-1">
                                <h3 class="text-white text-lg font-medium mb-0.5">Berita Kesehatan</h3>
                                <p class="text-white/70 text-sm">Info & edukasi terkini dari Puskesmas</p>
                            </div>
                            <div class="ml-2">
                                <i class="fas fa-chevron-right text-white/40 group-hover:text-white transition-all"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- MOBILE LAYOUT (Hidden on desktop) -->
    <div class="absolute inset-0 flex flex-col md:hidden z-10">
        <!-- Top Row: Text Content -->
        <div class="flex-1 flex items-center">
            <div class="w-full px-5 py-6">
                <!-- Mobile Badge -->
                <div class="relative inline-flex items-center px-3 py-1.5 rounded-lg bg-gradient-to-r from-emerald-500/20 to-emerald-600/20 backdrop-blur-md border border-white/20 shadow-md group overflow-hidden"
                    data-aos="fade-down" data-aos-duration="800">
                    <!-- Animated Glow Effect -->
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-emerald-400/30 to-emerald-600/30 rounded-lg blur opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                    </div>

                    <span
                        class="relative z-10 text-white font-semibold text-xs uppercase tracking-wider flex items-center">
                        <span class="w-1 h-1 bg-emerald-400 rounded-full mr-2 animate-pulse"></span>
                        PUSKESMAS DIGITAL
                    </span>
                </div>

                <!-- Mobile Typography -->
                <h1 class="mt-3 text-3xl font-bold text-white leading-tight" data-aos="fade-up" data-aos-duration="800">
                    Puskesmas Cikalapa </h1>

                <!-- Mobile Subtitle -->
                <p class="mt-3 text-white text-base font-light leading-relaxed" data-aos="fade-up" data-aos-delay="100"
                    data-aos-duration="800">
                    Kecamatan Subang, Kabupaten Subang </p>

                <!-- Mobile Action Buttons -->
                <div class="mt-6 flex flex-wrap gap-3" data-aos="fade-up" data-aos-delay="200">
                    <a href="/profil"
                        class="inline-flex items-center justify-center px-4 py-2.5 border border-white/30 text-sm font-medium rounded-md text-white bg-white/10 backdrop-blur-sm hover:bg-white/20 transition">
                        <i class="fas fa-info-circle mr-2"></i> Profil Puskesmas
                    </a>
                    <a href="/layanan"
                        class="inline-flex items-center justify-center px-4 py-2.5 text-sm font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 transition">
                        <i class="fas fa-file-alt mr-2"></i> Layanan Puskesmas
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Row: Feature Cards for Mobile (1 per row) -->
        <div class="bg-black/50 backdrop-blur-md py-4 px-4 border-t border-white/10">
            <h2 class="text-white text-sm font-bold uppercase mb-3">FITUR UNGGULAN</h2>

            <div class="space-y-2.5">
                <!-- Jadwal Dokter -->
                <a href="#layanan"
                    class="group block p-3 bg-white/5 hover:bg-white/10 border border-white/10 rounded-lg">
                    <div class="flex items-center">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-emerald-600 flex items-center justify-center">
                            <i class="fas fa-calendar-check text-white"></i>
                        </div>
                        <div class="ml-3 flex-1">
                            <h3 class="text-white text-sm font-medium">Layanan Kesehatan</h3>
                            <p class="text-white/70 text-xs">Informasi lengkap layanan & poli Puskesmas</p>
                        </div>
                        <div class="ml-2">
                            <i
                                class="fas fa-chevron-right text-white/40 group-hover:text-white text-xs transition-all"></i>
                        </div>
                    </div>
                </a>

                <!-- Berita Kesehatan -->
                <a href="#jadwal-dokter"
                    class="group block p-3 bg-white/5 hover:bg-white/10 border border-white/10 rounded-lg">
                    <div class="flex items-center">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-emerald-600 flex items-center justify-center">
                            <i class="fas fa-newspaper text-white"></i>
                        </div>
                        <div class="ml-3 flex-1">
                            <h3 class="text-white text-sm font-medium">Jadwal Dokter</h3>
                            <p class="text-white/70 text-xs">Lihat jadwal praktik harian</p>
                        </div>
                        <div class="ml-2">
                            <i
                                class="fas fa-chevron-right text-white/40 group-hover:text-white text-xs transition-all"></i>
                        </div>
                    </div>
                </a>

                <!-- Berita Kesehatan -->
                <a href="#berita"
                    class="group block p-3 bg-white/5 hover:bg-white/10 border border-white/10 rounded-lg">
                    <div class="flex items-center">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-emerald-600 flex items-center justify-center">
                            <i class="fas fa-newspaper text-white"></i>
                        </div>
                        <div class="ml-3 flex-1">
                            <h3 class="text-white text-sm font-medium">Berita Kesehatan</h3>
                            <p class="text-white/70 text-xs">Info & edukasi terkini dari Puskesmas</p>
                        </div>
                        <div class="ml-2">
                            <i
                                class="fas fa-chevron-right text-white/40 group-hover:text-white text-xs transition-all"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Desktop Slide Indicator (hidden on mobile) -->
    <div class="absolute bottom-8 left-8 right-8 z-20 hidden md:flex">
        <div class="flex items-center gap-2">
            <button @click="currentSlide = 0"
                class="h-1.5 transition-all duration-300 focus:outline-none rounded-full overflow-hidden"
                :class="{'w-8 bg-white': currentSlide === 0, 'w-4 bg-white/30 hover:bg-white/50': currentSlide !== 0}">
            </button>
            <button @click="currentSlide = 1"
                class="h-1.5 transition-all duration-300 focus:outline-none rounded-full overflow-hidden"
                :class="{'w-8 bg-white': currentSlide === 1, 'w-4 bg-white/30 hover:bg-white/50': currentSlide !== 1}">
            </button>
            <button @click="currentSlide = 2"
                class="h-1.5 transition-all duration-300 focus:outline-none rounded-full overflow-hidden"
                :class="{'w-8 bg-white': currentSlide === 2, 'w-4 bg-white/30 hover:bg-white/50': currentSlide !== 2}">
            </button>
        </div>
    </div>
</section>