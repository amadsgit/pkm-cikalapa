<div x-show="activeTab === 'geografis-wilayah-kerja'" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
    <div class="bg-white overflow-hidden">
        <!-- Modern Header with Subtitle -->
        <div class="mb-3">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center">
                    <div class="h-6 w-1 bg-emerald-500 rounded-full mr-2"></div>
                    <span
                        class="bg-emerald-50 px-2.5 py-1 rounded-full text-emerald-800 text-sm font-semibold flex items-center">
                        <i class="fas fa-map-marked-alt text-emerald-600 mr-1.5"></i>
                        GEOGRAFIS WILAYAH KERJA PUSKESMAS
                    </span>
                </div>
            </div>
            @if($profile)
                <p class="text-gray-600 ml-3">Informasi mengenai lokasi dan kondisi geografis wilayah kerja {{
                    $profile->nama_puskesmas }}</p>
            @else
                <p class="py-20 text-center">
                Data profil puskesmas sedang dalam proses pembaharuan.
                </p>
            @endif
        </div>

        <!-- Map and Info Section - Side by Side on Desktop -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-8">
            <!-- Interactive Map (Larger on Desktop) -->
            <div class="lg:col-span-7 order-2 lg:order-1">
                <div class="bg-gray-50 rounded-lg overflow-hidden shadow-sm border border-gray-100">
                    <div class="aspect-w-16 aspect-h-9 md:aspect-h-7">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.5430319237307!2d107.7631300737872!3d-6.579205393414267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e693b58c635ac47%3A0x47d8e5b8a0c57b99!2sUPTD%20Puskesmas%20Cikalapa%20Kecamatan%20Subang%20Subang!5e0!3m2!1sid!2sid!4v1756728632619!5m2!1sid!2sid"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            onload="this.parentNode.querySelector('.map-loader') && (this.parentNode.querySelector('.map-loader').style.display = 'none')"></iframe>
                    </div>
                </div>
            </div>

            <!-- Information Cards with Tabs - Using Only Available Data Fields -->
            <div class="lg:col-span-5 order-1 lg:order-2">
                <div class="bg-gray-50 rounded-lg shadow-sm border border-gray-100 overflow-hidden"
                    x-data="{ activeInfoTab: 'wilayah' }">
                    <!-- Tab Navigation -->
                    <div class="flex border-b border-gray-200">
                        <button @click="activeInfoTab = 'wilayah'"
                            :class="{'bg-white text-emerald-600 border-b-2 border-emerald-500': activeInfoTab === 'wilayah', 'text-gray-500 hover:text-gray-700': activeInfoTab !== 'wilayah'}"
                            class="flex-1 py-3 px-4 text-sm font-medium text-center transition-colors duration-200 focus:outline-none">
                            <i class="fas fa-ruler-combined mr-1.5"></i>
                            Informasi Wilayah
                        </button>
                        <button @click="activeInfoTab = 'batas'"
                            :class="{'bg-white text-emerald-600 border-b-2 border-emerald-500': activeInfoTab === 'batas', 'text-gray-500 hover:text-gray-700': activeInfoTab !== 'batas'}"
                            class="flex-1 py-3 px-4 text-sm font-medium text-center transition-colors duration-200 focus:outline-none">
                            <i class="fas fa-compass mr-1.5"></i>
                            Batas Wilayah
                        </button>
                    </div>

                    <!-- Area Information Tab - Only Using Available Data -->
                    <div x-show="activeInfoTab === 'wilayah'" class="p-5">
                        <div class="flex items-center justify-center">
                            <div
                                class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-500 mb-4">
                                <i class="fas fa-ruler-combined text-xl"></i>
                            </div>
                        </div>

                        <h3 class="text-center text-lg font-medium text-gray-800 mb-4">Luas
                            Wilayah</h3>

                        <div class="text-center">
                            @if($profile)
                                <div class="text-2xl font-bold text-emerald-600 mb-1">
                                    {{ number_format($profile->infoWilayah->luas_m2, 0, ',', '.') }} m²
                                </div>
                                <div class="text-gray-500">
                                    ({{ number_format($profile->infoWilayah->luas_hektar, 2, ',', '.') }} hektar)
                                </div>
                            @else
                            <div class="py-20 text-center">
                                <p>Data profil puskesmas sedang dalam proses pembaharuan.</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Boundaries Tab - Layout Alternatif -->
                    <div x-show="activeInfoTab === 'batas'" class="p-5">
                        <!-- Lingkaran Kompas Style Modern -->
                        <div class="relative w-full max-w-[300px] mx-auto mb-6" x-data="{ focus: null }">
                            <!-- Background lingkaran pusat -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="w-24 h-24 bg-emerald-50 rounded-full border border-emerald-100 flex items-center justify-center z-10">
                                    <div class="text-center">
                                        <i class="fas fa-home-alt text-emerald-600 text-xl mb-1"></i>
                                        <p class="text-xs font-medium text-emerald-800 line-clamp-1">
                                            @if($profile)
                                                {{ $profile->nama_puskesmas }}</p>
                                            @else
                                            <div class="py-20 text-center">
                                                <p>Data profil puskesmas sedang dalam proses pembaharuan.</p>
                                            </div>
                                            @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Garis dan label arah mata angin -->
                            <svg class="w-full h-[300px]" viewBox="0 0 200 200">
                                <g transform="translate(100, 100)">
                                    <!-- Garis kompas -->
                                    <line x1="0" y1="-80" x2="0" y2="-40" stroke="#10b981" stroke-width="2" />
                                    <line x1="0" y1="40" x2="0" y2="80" stroke="#10b981" stroke-width="2" />
                                    <line x1="-80" y1="0" x2="-40" y2="0" stroke="#10b981" stroke-width="2" />
                                    <line x1="40" y1="0" x2="80" y2="0" stroke="#10b981" stroke-width="2" />

                                    <!-- Lingkaran di ujung tiap arah -->
                                    <circle cx="0" cy="-80" r="12" fill="white" stroke="#d1d5db" />
                                    <circle cx="0" cy="80" r="12" fill="white" stroke="#d1d5db" />
                                    <circle cx="-80" cy="0" r="12" fill="white" stroke="#d1d5db" />
                                    <circle cx="80" cy="0" r="12" fill="white" stroke="#d1d5db" />

                                    <!-- Label arah mata angin -->
                                    <text x="0" y="-80" text-anchor="middle" dominant-baseline="middle"
                                        class="text-xs font-bold" fill="#047857">U</text>
                                    <text x="0" y="80" text-anchor="middle" dominant-baseline="middle"
                                        class="text-xs font-bold" fill="#047857">S</text>
                                    <text x="-80" y="0" text-anchor="middle" dominant-baseline="middle"
                                        class="text-xs font-bold" fill="#047857">B</text>
                                    <text x="80" y="0" text-anchor="middle" dominant-baseline="middle"
                                        class="text-xs font-bold" fill="#047857">T</text>
                                </g>
                            </svg>
                        </div>

                        <!-- Tabel Batas Wilayah -->
                        <div class="max-w-md mx-auto mt-6">
                            <table class="w-full border-collapse">
                                <thead class="bg-emerald-50">
                                    <tr>
                                        <th
                                            class="px-4 py-2 text-left text-xs font-medium text-emerald-800 border border-gray-200 rounded-tl-lg">
                                            Arah</th>
                                        <th
                                            class="px-4 py-2 text-left text-xs font-medium text-emerald-800 border border-gray-200 rounded-tr-lg">
                                            Berbatasan Dengan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($profile)
                                        @forelse(optional($profile->infoWilayah)->batasWilayah ?? [] as $batas)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-3 border border-gray-200 font-medium text-xs flex items-center">
                                                @switch($batas->arah)
                                                @case('Utara') <i class="fas fa-arrow-up text-emerald-500 mr-2"></i> Utara @break
                                                @case('Timur') <i class="fas fa-arrow-right text-emerald-500 mr-2"></i> Timur @break
                                                @case('Selatan') <i class="fas fa-arrow-down text-emerald-500 mr-2"></i> Selatan @break
                                                @case('Barat') <i class="fas fa-arrow-left text-emerald-500 mr-2"></i> Barat @break
                                                @default {{ $batas->arah }}
                                                @endswitch
                                            </td>
                                            <td class="px-4 py-3 border border-gray-200 text-sm">
                                                {{ $batas->berbatasan_dengan }}
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="2" class="text-center text-gray-500 py-3">Belum ada data batas wilayah</td>
                                        </tr>
                                        @endforelse
                                    @else
                                    <div class="py-20 text-center">
                                        <p>Data profil puskesmas sedang dalam proses pembaharuan.</p>
                                    </div>
                                    @endif
                                </tbody>
                            </table>

                            <div class="mt-4 bg-gray-50 p-3 rounded-md text-sm text-gray-600 border border-gray-100">
                                <p class="font-medium text-gray-700 mb-1">Keterangan:
                                </p>
                                @if($profile)
                                    <p>Batas-batas wilayah sesuai dengan peta wilayah kerja {{ $profile->nama_puskesmas }}</p>
                                @else
                                <div class="py-20 text-center">
                                    <p>Data profil puskesmas sedang dalam proses pembaharuan.</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Potensi risiko & Masalah Kesehatan Section -->
        <div class="mt-12 mb-10" x-data="{ activeKategori: 'semua' }">
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center">
                    <div class="h-6 w-1 bg-amber-500 rounded-full mr-2"></div>
                    <span class="bg-red-50 px-2.5 py-1 rounded-full text-amber-800 text-sm font-semibold flex items-center">
                        <i class="fas fa-exclamation-triangle text-amber-600 mr-1.5"></i>
                        POTENSI RISIKO & MASALAH KESEHATAN MASYARAKAT
                    </span>
                </div>
            </div>
        
            <!-- Filter Categories -->
            <div class="relative mb-6" x-data="{
                    isDragging: false,
                    startX: 0,
                    scrollLeft: 0,
                    handleMouseDown(e) {
                        const slider = $refs.potensiSlider;
                        this.isDragging = true;
                        this.startX = e.pageX - slider.offsetLeft;
                        this.scrollLeft = slider.scrollLeft;
                        slider.classList.add('cursor-grabbing');
                    },
                    handleMouseMove(e) {
                        if(!this.isDragging) return;
                        e.preventDefault();
                        const slider = $refs.potensiSlider;
                        const x = e.pageX - slider.offsetLeft;
                        const walk = (x - this.startX) * 2;
                        slider.scrollLeft = this.scrollLeft - walk;
                    },
                    handleMouseUp() {
                        this.isDragging = false;
                        $refs.potensiSlider.classList.remove('cursor-grabbing');
                    }
                }">
        
                <div x-ref="potensiSlider" class="overflow-x-auto py-2 scrollbar-hide cursor-grab active:cursor-grabbing"
                    style="-webkit-overflow-scrolling: touch;" @mousedown="handleMouseDown" @mousemove="handleMouseMove"
                    @mouseup="handleMouseUp" @mouseleave="handleMouseUp">
        
                    <div class="inline-flex gap-2 min-w-full px-1 py-1">
                        <!-- Tombol Semua -->
                        <button @click="activeKategori = 'semua'"
                            :class="{ 'bg-amber-500 text-white shadow-md': activeKategori === 'semua', 'bg-white text-gray-700 hover:bg-gray-100': activeKategori !== 'semua' }"
                            class="shrink-0 px-4 py-2 rounded-full text-sm font-medium transition-colors border border-gray-200 flex items-center">
                            <i class="fas fa-th-large mr-1.5 text-xs"></i>
                            Semua Kelurahan
                        </button>
        
                        <!-- Looping dari DB -->
                        @if($profile)
                            @foreach($profile->wilayahKerja as $wilayah)
                            @php $slug = Str::slug($wilayah->nama, '-'); @endphp
                            <button @click="activeKategori = '{{ $slug }}'"
                                :class="{ 'bg-amber-500 text-white shadow-md': activeKategori === '{{ $slug }}', 'bg-white text-gray-700 hover:bg-gray-100': activeKategori !== '{{ $slug }}' }"
                                class="shrink-0 px-4 py-2 rounded-full text-sm font-medium transition-colors border border-gray-200 flex items-center">
                                <i class="fas fa-tree-city mr-1.5 text-xs"></i>
                                {{ $wilayah->nama }}
                            </button>
                            @endforeach
                        @else
                        <div class="py-20 text-center">
                            <p>Data profil puskesmas sedang dalam proses pembaharuan.</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        
            <!-- Cards (sementara contoh statis dulu, nanti bisa dihubungkan ke tabel potensi_risiko) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @if($profile)
                    @foreach($profile->wilayahKerja as $wilayah)
                    @php $slug = Str::slug($wilayah->nama, '-'); @endphp
                    <div x-show="activeKategori === 'semua' || activeKategori === '{{ $slug }}'"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        class="bg-gray-50 rounded-lg overflow-hidden shadow-sm border border-gray-100 group hover:shadow-md transition-all duration-300">
            
                        <!-- Header -->
                        <div class="p-4 border-l-4 border-amber-500 text-amber-600 bg-white flex items-center">
                            <i class="fas fa-notes-medical mr-3 text-lg"></i>
                            <h4 class="text-lg font-medium text-gray-800 line-clamp-1">Potensi Risiko</h4>
                        </div>
            
                        <!-- Content -->
                        <div class="p-4">
                            <div class="mb-3">
                                <span
                                    class="text-xs font-medium bg-white px-2.5 py-1 rounded-full border border-amber-500 text-amber-600">
                                    {{ $wilayah->nama }}
                                </span>
                            </div>
                            <p class="text-gray-600 text-sm mb-3">Deskripsi potensi & masalah kesehatan masyarakat di {{
                                $wilayah->nama }}.</p>
                            <div class="flex items-start text-xs text-gray-500 pt-2 mt-2 border-t border-gray-100">
                                <i class="fas fa-map-marker-alt mt-0.5 mr-2"></i>
                                <span class="flex-1">Lokasi: {{ $wilayah->nama }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="py-20 text-center">
                        <p>Data profil puskesmas sedang dalam proses pembaharuan.</p>
                    </div>
                @endif
            </div>
        
            <!-- Empty State -->
            <div x-show="false" x-cloak class="bg-gray-50 p-6 rounded-lg text-center border border-gray-100 mt-4">
                <div class="inline-flex items-center justify-center p-3 bg-gray-100 rounded-full mb-3">
                    <i class="fas fa-seedling text-gray-300"></i>
                </div>
                <p class="text-gray-500 text-sm">Tidak ada potensi & risiko kesehatan dalam kategori ini</p>
            </div>
        </div>
    </div>
</div>