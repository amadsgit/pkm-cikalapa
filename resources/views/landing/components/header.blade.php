
<header class="fixed top-0 z-50 w-full header-nav">
    <nav x-data="{ mobileMenuOpen: false, scrolled: false,
      toggleMobileMenu() { this.mobileMenuOpen = !this.mobileMenuOpen } }"
        @scroll.window="scrolled = window.pageYOffset > 20"
        class="sticky top-0 z-50 bg-white shadow-sm py-2 transition-all duration-200"
        :class="{ 'py-1 shadow-md': scrolled }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <!-- Logo dengan efek hover -->
                <div class="flex items-center">
                    <a href="#" class="flex items-center transition-transform hover:-translate-y-0.5 duration-200">
                        <img src="{{ asset('storage/' . $profile->logo) }}" alt="UPTD Puskesmas Cikalapa" class="h-10 w-auto object-contain">
                    </a>
                    <h3>Puskesmas Cikalapa</h3>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden lg:flex lg:items-center">
                    <div class="flex items-center space-x-6 mr-8">
                        <a href="/" class="flex items-center space-x-1.5 text-sm font-medium group">
                            <span class="text-emerald-500">
                                <!-- Home Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </span>
                            <span
                                class="py-2 px-1 border-b-2 {{ request()->is('/') ? 'border-emerald-500 text-emerald-600 font-semibold' : 'border-transparent text-gray-600 group-hover:text-emerald-500 group-hover:border-emerald-300' }} transition duration-200">
                                Beranda
                            </span>
                        </a>
                        
                        <a href="{{ route('profil') }}" class="flex items-center space-x-1.5 text-sm font-medium group">
                            <span class="text-emerald-500">
                                <!-- Info Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            <span
                                class="py-2 px-1 border-b-2 {{ request()->is('profil') ? 'border-emerald-500 text-emerald-600 font-semibold' : 'border-transparent text-gray-600 group-hover:text-emerald-500 group-hover:border-emerald-300' }} transition duration-200">
                                Profil
                            </span>
                        </a>

                        <a href="{{ route('layanan') }}" class="flex items-center space-x-1.5 text-sm font-medium group">
                            <span class="text-emerald-500">
                                <!-- Document Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </span>
                            <span
                                class="py-2 px-1 border-b-2 border-transparent text-gray-600 group-hover:text-emerald-500 group-hover:border-emerald-300 transition duration-200">
                                Layanan
                            </span>
                        </a>

                        <a href="{{ route('informasi') }}" class="flex items-center space-x-1.5 text-sm font-medium group">
                            <span class="text-emerald-500">
                                <!-- News Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                            </span>
                            <span
                                class="py-2 px-1 border-b-2 border-transparent text-gray-600 group-hover:text-emerald-500 group-hover:border-emerald-300 transition duration-200">
                                Informasi
                            </span>
                        </a>

                        <a href="{{ route('agenda') }}" class="flex items-center space-x-1.5 text-sm font-medium group">
                            <span class="text-emerald-500">
                                <!-- Icon Kalender (Agenda) -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200 group-hover:scale-110"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <span class="py-2 px-1 border-b-2 border-transparent text-gray-600 
                                group-hover:text-emerald-600 group-hover:border-emerald-400 transition duration-200">
                                Agenda
                            </span>
                        </a>

                        <a href="https://simaducikalapa.vercel.app" target="_blank" class="flex items-center space-x-1.5 text-sm font-medium group">
                            <span class="text-emerald-500">
                                <!-- Stats Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </span>
                            <span
                                class="py-2 px-1 border-b-2 border-transparent text-gray-600 group-hover:text-emerald-500 group-hover:border-emerald-300 transition duration-200">
                                SATU DATA PUSKESMAS
                            </span>
                        </a>
                    </div>

                    <!-- Authentication Links -->
                    <div class="flex items-center border-l border-gray-200 pl-6 ml-6 space-x-4">
                        <a href="/login"
                            class="text-sm font-medium px-5 py-2 text-emerald-600 hover:text-emerald-700 hover:bg-emerald-50 border border-emerald-200 rounded-lg transition-colors duration-200">
                            Masuk
                        </a>
                        {{-- <a href="/register"
                            class="text-sm font-medium px-5 py-2 text-white bg-emerald-600 hover:bg-emerald-700 rounded-lg shadow-sm hover:shadow transition-all duration-200">
                            Daftar
                        </a> --}}
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="lg:hidden">
                    <button @click="toggleMobileMenu"
                        class="inline-flex items-center justify-center p-2 rounded-lg text-emerald-600 hover:text-emerald-700 hover:bg-emerald-50 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-emerald-500 transition duration-150">
                        <span class="sr-only">Buka menu</span>
                        <svg class="h-6 w-6" x-bind:class="{'hidden': mobileMenuOpen, 'block': !mobileMenuOpen}"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="h-6 w-6" x-bind:class="{'block': mobileMenuOpen, 'hidden': !mobileMenuOpen}"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div class="lg:hidden fixed inset-x-0 z-40" x-show="mobileMenuOpen"
            x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" x-cloak>
            <div class="pt-2 pb-3 space-y-1 bg-white border-t border-gray-200 mt-2 shadow-lg">
                <!-- Beranda -->
                <a href="/"
                    class="flex items-center pl-3 pr-4 py-3 bg-emerald-50 text-emerald-700 transition-colors rounded-lg mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-3" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="text-base font-medium">Beranda</span>
                </a>

                <!-- Profil -->
                <a href="/profil"
                    class="flex items-center pl-3 pr-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-emerald-600 transition-colors rounded-lg mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-3" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A10.966 10.966 0 0112 15c2.485 0 4.77.805 6.879 2.157M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="text-base font-medium">Profil</span>
                </a>

                <!-- Layanan -->
                <a href="/layanan"
                    class="flex items-center pl-3 pr-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-emerald-600 transition-colors rounded-lg mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-3" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7V4a1 1 0 011-1h6a1 1 0 011 1v3m-8 0h8m-8 0v10a1 1 0 001 1h6a1 1 0 001-1V7m-8 0H5a1 1 0 00-1 1v12a1 1 0 001 1h14a1 1 0 001-1V8a1 1 0 00-1-1h-2" />
                    </svg>
                    <span class="text-base font-medium">Layanan</span>
                </a>

                <!-- Berita & Artikel -->
                <a href="/berita"
                    class="flex items-center pl-3 pr-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-emerald-600 transition-colors rounded-lg mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-3" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <span class="text-base font-medium">Berita & Artikel</span>
                </a>

                <!-- Pengaduan -->
                <a href="/pengaduan"
                    class="flex items-center pl-3 pr-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-emerald-600 transition-colors rounded-lg mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-3" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 8h10M7 12h8m-8 4h6M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-base font-medium">Pengaduan</span>
                </a>

                <!-- Statistik -->
                <a href="/statistik"
                    class="flex items-center pl-3 pr-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-emerald-600 transition-colors rounded-lg mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-3" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 10h10M4 14h4m12 0h-2m-2 0h-2m2 4H4" />
                    </svg>
                    <span class="text-base font-medium">Statistik</span>
                </a>

                <!-- Mobile Authentication Links dengan Style yang Diperbarui -->
                <div class="pt-4 pb-3 border-t border-gray-200 mt-2">
                    <!-- Tombol Login/Register yang Diperbarui -->
                    <div class="grid grid-cols-1 gap-3 px-3 mt-3">
                        <a href="/login"
                            class="flex justify-center items-center px-4 py-3 border-2 border-emerald-200 text-base font-medium rounded-lg text-emerald-600 bg-white hover:bg-emerald-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg> Masuk
                        </a>
                        <a href="/register"
                            class="flex justify-center items-center px-4 py-3 border border-transparent shadow-sm text-base font-medium rounded-lg text-white bg-emerald-600 hover:bg-emerald-700 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg> Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>