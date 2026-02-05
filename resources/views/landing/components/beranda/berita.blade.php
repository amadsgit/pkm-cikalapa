<section class="py-12 bg-white relative overflow-hidden">
    <!-- Abstract Background Elements -->
    <div
        class="absolute top-0 left-1/3 w-1/2 h-full bg-gradient-to-b from-white via-emerald-50/30 to-transparent -z-10">
    </div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 rounded-full bg-blue-50/40 -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Modern Header -->
        <div class="mb-6">
            <!-- Header Row -->
            <div class="flex items-center justify-between mb-2">
                <!-- Left: Title Badge -->
                <div class="flex items-center space-x-2">
                    <div class="h-7 w-1 bg-emerald-500 rounded-full"></div>
                    <span
                        class="bg-gradient-to-r from-green-50 to-teal-50 px-3 py-1 rounded-full text-blue-800 text-sm font-semibold flex items-center shadow-sm">
                        <i class="fas fa-newspaper text-emerald-500 mr-2"></i>
                        INFORMASI TERKINI
                    </span>
                </div>
        
                <!-- Right: Button -->
                <a href="/berita"
                    class="group flex items-center text-sm font-medium text-emerald-600 border border-emerald-200 rounded-xl px-4 py-1.5 hover:bg-emerald-600 hover:text-white transition-all duration-300 shadow-sm">
                    <span>Lihat Semua</span>
                    <svg class="ml-2 w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        
            <!-- Description -->
            <p class="text-gray-600 text-sm md:text-base mt-1 leading-relaxed">
                Dapatkan berita & informasi terbaru seputar <span class="font-semibold text-emerald-700">kesehatan</span>
                dan berbagai <span class="font-semibold text-emerald-700">program puskesmas</span> untuk masyarakat.
            </p>
        </div>

        <!-- Swiper Slider Container -->
        <div class="relative mt-6">
            <!-- Main Swiper -->
            <div class="swiper-container berita-slider">
                <div class="swiper-wrapper">
                    @foreach ($informasi as $item)
                    <div class="swiper-slide p-3">
                        <div
                            class="group bg-white rounded-2xl shadow-sm overflow-hidden h-full flex flex-col transition-all duration-300 hover:shadow-lg relative border border-gray-100">
                
                            <!-- Image Container -->
                            <div class="relative aspect-w-16 aspect-h-9 overflow-hidden">
                                <img class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-105"
                                    src="{{ asset('storage/' . $item->gambar) }}" alt="Kegiatan: {{ $item->judul }}" loading="lazy">
                
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                            </div>
                
                            <!-- Content -->
                            <div class="p-6 flex flex-col flex-grow relative bg-gray-50">
                                <!-- Date & Category -->
                                <div class="flex items-center justify-between mb-4 relative z-10">
                                    <div class="flex items-center">
                                        <div
                                            class="flex flex-col items-center mr-3 bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-lg shadow-sm overflow-hidden border border-emerald-100 transition-all duration-300 group-hover:shadow-md">
                                            <div class="bg-emerald-500 text-white text-xs font-bold w-full text-center py-0.5 px-2">
                                                {{ \Carbon\Carbon::parse($item->tanggal)->format('M') }}
                                            </div>
                                            <div class="text-emerald-700 text-base font-bold py-0.5 px-3">
                                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d') }}
                                            </div>
                                        </div>
                                        <div class="flex flex-col text-xs">
                                            <span class="text-gray-500 font-medium">
                                                {{ \Carbon\Carbon::parse($item->tanggal)->format('Y') }}
                                            </span>
                                            <span class="text-gray-400">
                                                {{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('dddd') }}
                                            </span>
                                        </div>
                                    </div>
                
                                    <span
                                        class="inline-flex items-center px-2.5 py-1.5 rounded-md text-xs font-medium text-white {{ $item->kategori->id == 2 ? 'bg-amber-500 border-amber-600' : 'bg-emerald-500 border-emerald-600' }} shadow-md border-l-4">
                                        <i class="fas fa-bullhorn mr-1"></i>
                                        {{ $item->kategori->nama }}
                                    </span>
                                </div>
                
                                <!-- Title -->
                                <a href="#" class="block group relative z-10">
                                <a href="{{ route('informasi.show', $item->id) }}" class="block group relative z-10"> 
                                    <div
                                        class="relative h-0.5 w-12 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-full mb-3 transition-all duration-300 group-hover:w-24">
                                    </div>
                                    <h3
                                        class="text-xl font-bold text-gray-900 leading-tight mb-3 line-clamp-2 group-hover:text-emerald-600 transition-colors">
                                        {{ $item->judul }}
                                    </h3>
                                </a>
                
                                <!-- Description -->
                                <div class="mt-1 relative z-10">
                                    <p
                                        class="text-gray-600 text-sm leading-relaxed mb-5 pl-3 border-l-2 border-emerald-200 line-clamp-2 after:content-['...']">
                                        {{ $item->deskripsi }}
                                    </p>
                                </div>
                
                                <!-- Author & Read More -->
                                <div
                                    class="mt-auto pt-4 border-t border-dashed border-gray-200 flex justify-between items-center relative z-10">
                                    <div class="flex items-center text-sm text-gray-500">
                                        <i class="fas fa-user text-emerald-500 mr-2"></i>
                                        {{ $item->author->pegawai->nama_pegawai ?? 'Admin' }}
                                    </div>
                                    <a href="#"
                                        class="inline-flex items-center bg-emerald-50 hover:bg-emerald-100 text-emerald-600 font-medium text-sm rounded-full px-4 py-1.5 transition-colors duration-300 group/link">
                                    <a href="{{ route('informasi.show', $item->id) }}"
                                        class="inline-flex items-center bg-emerald-50 hover:bg-emerald-100 text-emerald-600 font-medium text-sm rounded-full px-4 py-1.5 transition-colors duration-300 group/link">
                                        <span>Baca selengkapnya</span>
                                        <svg class="ml-1.5 w-4 h-4 transform transition-transform duration-300 group-hover/link:translate-x-1"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Modern Pagination Indicators -->
            <div class="flex justify-center mt-10">
                <div class="swiper-pagination berita-pagination"></div>
            </div>
        </div>
    </div>

    <!-- Include Swiper.js -->
    <link rel="stylesheet" href="{{ asset('css/landing/swiper-bundle.min.css') }}" />
    <script src="{{ asset('js/landing/swiper-bundle.min.js') }}"></script>
    <style>
        /* Change pagination bullets to emerald theme */
        .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            background: rgba(16, 185, 129, 0.2);
            /* emerald-500 with opacity */
            opacity: 1;
        }

        .swiper-pagination-bullet-active {
            background: rgb(16, 185, 129);
            /* emerald-500 */
            transform: scale(1.2);
            transition: transform 0.3s;
        }

        /* Dynamic bullets styling */
        .swiper-pagination-bullet-active-main {
            background: rgb(16, 185, 129);
            /* emerald-500 */
            transform: scale(1.4);
        }

        .swiper-pagination-bullet-active-prev,
        .swiper-pagination-bullet-active-next {
            background: rgba(16, 185, 129, 0.6);
            /* emerald-500 with medium opacity */
            transform: scale(1.1);
        }

        .swiper-pagination-bullet-active-prev-prev,
        .swiper-pagination-bullet-active-next-next {
            background: rgba(16, 185, 129, 0.3);
            /* emerald-500 with low opacity */
        }
    </style>
    <!-- Initialize Swiper -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                var swiper = new Swiper('.berita-slider', {
                    slidesPerView: 1,
                    spaceBetween: 24,
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.berita-pagination',
                        clickable: true,
                        dynamicBullets: true,
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                            spaceBetween: 24,
                        },
                        1024: {
                            slidesPerView: 3,
                            spaceBetween: 30,
                        }
                    }
                });
            });
    </script>
</section>