<section class="py-12 bg-gray-50 relative overflow-hidden">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Modern Header - Matched with kegiatan Style -->
        <div class="mb-0">
            <!-- Title and Button in One Row -->
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center">
                    <div class="h-6 w-1 bg-emerald-500 rounded-full mr-2"></div>
                    <span
                        class="bg-gradient-to-r from-green-50 to-teal-50 px-3 py-1 rounded-full text-blue-800 text-sm font-semibold flex items-center shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-emerald-700" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        AGENDA & KEGIATAN PUSKESMAS
                    </span>
                </div>

                <!-- Right: Simplified Button -->
                <a href="https://desa.lokerciayumajakuning.com/kegiatan"
                    class="flex-shrink-0 inline-flex items-center text-sm font-medium text-emerald-600 border border-emerald-200 rounded-lg px-3 py-1.5 hover:bg-emerald-50 transition-colors">
                    <span>Lihat Semua</span>
                    <svg class="ml-1.5 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>

            <!-- Description on Full Row -->
            <p class="text-gray-600 text-sm md:text-base w-full">
                Informasi mengenai agenda dan kegiatan terbaru yang diselenggarakan oleh Puskesmas Cikalapa,
                sebagai bagian dari upaya meningkatkan mutu pelayanan kesehatan serta mendukung program promotif
                dan preventif bagi masyarakat.
            </p>
        </div>

        <!-- Swiper Slider Container -->
        <div class="relative mt-6">
            <!-- Main Swiper -->
            <div class="swiper-container kegiatan-slider">
                <div class="swiper-wrapper">
                    @foreach ($kegiatan as $item)
                    <div class="swiper-slide p-3">
                        <div
                            class="group bg-white rounded-2xl shadow-sm overflow-hidden h-full flex flex-col transition-all duration-300 hover:shadow-lg relative border border-gray-100">
                
                            <!-- Gambar -->
                            <div class="relative aspect-w-16 aspect-h-9 overflow-hidden">
                                <img class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-105"
                                    src="{{ asset('storage/' . $item->gambar) }}" alt="Kegiatan: {{ $item->judul }}" loading="lazy">
                
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                            </div>
                
                            <!-- Konten -->
                            <div class="p-6 flex flex-col flex-grow relative bg-gray-50">
                                <!-- Tanggal & Kategori -->
                                <div class="flex items-center justify-between mb-4 relative z-10">
                                    <div class="flex items-center">
                                        <div
                                            class="flex flex-col items-center mr-3 bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-lg shadow-sm overflow-hidden border border-emerald-100 transition-all duration-300 group-hover:shadow-md">
                                            <div class="bg-emerald-500 text-white text-xs font-bold w-full text-center py-0.5 px-2">
                                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('M') }}
                                            </div>
                                            <div class="text-emerald-700 text-base font-bold py-0.5 px-3">
                                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d') }}
                                            </div>
                                        </div>
                                        <div class="flex flex-col text-xs">
                                            <span class="text-gray-500 font-medium">
                                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('Y') }}
                                            </span>
                                            <span class="text-gray-400">
                                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l') }}
                                            </span>
                                        </div>
                                    </div>
                
                                    <span
                                        class="inline-flex items-center px-2.5 py-1.5 rounded-md text-xs font-medium text-white bg-emerald-500 border-emerald-600 shadow-md border-l-4">
                                        <i class="fas fa-calendar-check mr-1"></i>
                                        {{ $item->kategori->nama ?? 'Kegiatan' }}
                                    </span>
                                </div>
                
                                <!-- Judul -->
                                <a href="#" class="block group relative z-10">
                                <a href="{{ route('agenda.show', $item->id) }}" class="block group relative z-10">
                                    <div
                                        class="relative h-0.5 w-12 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-full mb-3 transition-all duration-300 group-hover:w-24">
                                    </div>
                                    <h3
                                        class="text-xl font-bold text-gray-900 leading-tight mb-3 line-clamp-2 group-hover:text-emerald-600 transition-colors">
                                        {{ $item->judul }}
                                    </h3>
                                </a>
                
                                <!-- Deskripsi singkat -->
                                <div class="mt-1 relative z-10">
                                    <p
                                        class="text-gray-600 text-sm leading-relaxed mb-5 pl-3 border-l-2 border-emerald-200 line-clamp-2 after:content-['...']">
                                        {{ $item->deskripsi }}
                                    </p>
                                </div>
                
                                <!-- Penulis & Link -->
                                <div
                                    class="mt-auto pt-4 border-t border-dashed border-gray-200 flex justify-between items-center relative z-10">
                                    <div class="flex items-center text-sm text-gray-500">
                                        <i class="fas fa-user text-emerald-500 mr-2"></i>
                                        {{ $item->author->pegawai->nama_pegawai ?? 'Admin' }}
                                    </div>
                
                                    {{-- <a href="#" --}}
                                    <a href="{{ route('agenda.show', $item->id) }}"
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
                <div class="swiper-pagination kegiatan-pagination"></div>
            </div>
        </div>
    </div>

    <!-- Initialize Swiper -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                var kegiatanSwiper = new Swiper('.kegiatan-slider', {
                    slidesPerView: 1,
                    spaceBetween: 24,
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.kegiatan-pagination',
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