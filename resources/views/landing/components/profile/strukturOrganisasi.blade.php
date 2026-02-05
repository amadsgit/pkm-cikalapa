<div x-show="activeTab === 'struktur-organisasi'" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
    <div class="bg-white">
        <!-- Title Header (Using UMKM/Tentang puskesmas Style) -->
        <div class="flex items-center justify-between mb-5">
            <div class="flex items-center">
                <div class="h-6 w-1 bg-emerald-500 rounded-full mr-2"></div>
                <span
                    class="bg-emerald-50 px-2.5 py-1 rounded-full text-emerald-800 text-sm font-semibold flex items-center">
                    <i class="fas fa-sitemap text-emerald-600 mr-1.5"></i>
                    BAGAN STRUKTUR ORGANISASI PUSKESMAS
                </span>
            </div>
        </div>

        <!-- Bagan Struktur -->
        <div class="mb-8">
            <div class="bg-gray-50 p-3 rounded-lg shadow-sm border border-gray-100">
                @if ($profile->struktur && $profile->struktur->image)
                <img src="{{ asset('storage/' . $profile->struktur->image) }}" alt="Bagan Struktur Organisasi Puskesmas"
                    class="w-full h-auto object-contain rounded-lg">
                @else
                <div class="text-center text-gray-500 py-10">
                    <i class="fas fa-sitemap text-4xl mb-3"></i>
                    <p>Bagan struktur belum tersedia</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Staff Puskesmas Section without search functionality -->
        <div class="mt-12" x-data="{ jabatanAktif: 'semua' }">
            <!-- Header without search input -->
            <div class="flex items-center justify-between mb-5">
                <div class="flex items-center">
                    <div class="h-6 w-1 bg-emerald-500 rounded-full mr-2"></div>
                    <span
                        class="bg-emerald-50 px-2.5 py-1 rounded-full text-emerald-800 text-sm font-semibold flex items-center">
                        <i class="fas fa-users text-emerald-600 mr-1.5"></i>
                        DAFTAR STAFF PUSKESMAS
                    </span>
                </div>
            </div>

            <!-- Filter Kategori Jabatan - keep this part -->
            <!-- Filter Kategori Jabatan -->
            <div class="relative mb-6" x-data="{
                    isDragging: false,
                    startX: 0,
                    scrollLeft: 0,
                    handleMouseDown(e) {
                        const slider = $refs.slider;
                        this.isDragging = true;
                        this.startX = e.pageX - slider.offsetLeft;
                        this.scrollLeft = slider.scrollLeft;
                        slider.classList.add('cursor-grabbing');
                    },
                    handleMouseMove(e) {
                        if(!this.isDragging) return;
                        e.preventDefault();
                        const slider = $refs.slider;
                        const x = e.pageX - slider.offsetLeft;
                        const walk = (x - this.startX) * 2;
                        slider.scrollLeft = this.scrollLeft - walk;
                    },
                    handleMouseUp() {
                        this.isDragging = false;
                        $refs.slider.classList.remove('cursor-grabbing');
                    }
                }">
                <div x-ref="slider" class="overflow-x-auto py-2 scrollbar-hide cursor-grab active:cursor-grabbing"
                    style="-webkit-overflow-scrolling: touch;" @mousedown="handleMouseDown" @mousemove="handleMouseMove"
                    @mouseup="handleMouseUp" @mouseleave="handleMouseUp">
            
                    <div class="inline-flex gap-2 min-w-full px-1 py-1">
                        <!-- Semua -->
                        <button @click="jabatanAktif = 'semua'" :class="{
                                'bg-emerald-600 text-white shadow-md': jabatanAktif === 'semua',
                                'bg-white text-gray-700 hover:bg-gray-100': jabatanAktif !== 'semua'
                            }"
                            class="shrink-0 px-4 py-2 rounded-full text-sm font-medium transition-colors border border-gray-200">
                            <i class="fas fa-users mr-1.5"></i>
                            Semua
                        </button>
            
                        <!-- Kepala Puskesmas -->
                        <button @click="jabatanAktif = 'Kepala Puskesmas'" :class="{
                                'bg-emerald-600 text-white shadow-md': jabatanAktif === 'Kepala Puskesmas',
                                'bg-white text-gray-700 hover:bg-gray-100': jabatanAktif !== 'Kepala Puskesmas'
                            }"
                            class="shrink-0 px-4 py-2 rounded-full text-sm font-medium transition-colors border border-gray-200">
                            Kepala Puskesmas
                        </button>

                        <!-- Kasubag TU -->
                        <button @click="jabatanAktif = 'Kasubag TU'" :class="{
                                'bg-emerald-600 text-white shadow-md': jabatanAktif === 'Kasubag TU',
                                'bg-white text-gray-700 hover:bg-gray-100': jabatanAktif !== 'Kasubag TU'
                            }"
                            class="shrink-0 px-4 py-2 rounded-full text-sm font-medium transition-colors border border-gray-200">
                            Kasubag TU
                        </button>

                        <!-- Bendahara -->
                        <button @click="jabatanAktif = 'Bendahara'" :class="{
                                'bg-emerald-600 text-white shadow-md': jabatanAktif === 'Bendahara',
                                'bg-white text-gray-700 hover:bg-gray-100': jabatanAktif !== 'Bendahara'
                            }"
                            class="shrink-0 px-4 py-2 rounded-full text-sm font-medium transition-colors border border-gray-200">
                            Bendahara
                        </button>
                    </div>
                </div>
            </div>

            <!-- Staff Grid from Database -->
            <div class="relative">
                <div x-ref="staffContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5"
                    x-data="{ hoverStaff: null }">
            
                    @foreach($profile->staff as $index => $item)
                    @php
                    $pegawai = $item->pegawai;
                    $jabatan = $item->jabatan_alias ?? ($pegawai->jabatan ?? '-');
                    @endphp
            
                    @if($pegawai)
                    <div x-show="jabatanAktif === 'semua' || jabatanAktif === '{{ $jabatan }}'"
                        @mouseenter="hoverStaff = {{ $index }}" @mouseleave="hoverStaff = null"
                        class="bg-gray-50 rounded-xl overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-md group hover:-translate-y-1 staff-card">
            
                        <!-- Foto Pegawai -->
                        <div class="relative aspect-w-1 aspect-h-1 bg-gray-200">
                            <img src="{{ $pegawai->foto ? asset('storage/'.$pegawai->foto) : asset('images/default-user.png') }}"
                                alt="{{ $pegawai->nama_pegawai }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            
                            <div :class="{'opacity-70': hoverStaff === {{ $index }}, 'opacity-0': hoverStaff !== {{ $index }}}"
                                class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent transition-opacity duration-300">
                            </div>
            
                            <div :class="{'bottom-0 opacity-100': hoverStaff === {{ $index }}, 'bottom-[-20px] opacity-0': hoverStaff !== {{ $index }}}"
                                class="absolute left-0 right-0 p-3 transition-all duration-300">
                                <span class="inline-block bg-emerald-500 text-white text-xs font-medium px-2.5 py-1 rounded-full">
                                    {{ $jabatan }}
                                </span>
                            </div>
                        </div>
            
                        <!-- Detail Pegawai -->
                        <div class="p-4">
                            <h4 class="text-lg font-semibold text-gray-900 mb-1 group-hover:text-emerald-600 transition-colors">
                                {{ $pegawai->nama_pegawai }}
                            </h4>
                            <p class="text-emerald-600 font-medium mb-3 text-sm">
                                {{ $jabatan }}
                            </p>
            
                            <div class="space-y-2 text-sm text-gray-600">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 mt-0.5">
                                        <i class="fas fa-calendar text-emerald-400 mr-2"></i>
                                    </div>
                                    <div>{{ $pegawai->pangkat ?? '-' }} {{ $pegawai->golongan}}</div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex-shrink-0 mt-0.5">
                                        <i class="fas fa-graduation-cap text-emerald-400 mr-2"></i>
                                    </div>
                                    <div>{{ $pegawai->pendidikan_terakhir ?? '-' }} {{ $pegawai->jurusan }}</div>
                                </div>
            
            
                                {{-- <div class="flex items-start">
                                    <div class="flex-shrink-0 mt-0.5">
                                        <i class="fas fa-phone text-emerald-400 mr-2"></i>
                                    </div>
                                    <div>
                                        @if($pegawai->hp)
                                        <a href="tel:{{ $pegawai->hp }}" class="hover:text-emerald-600 transition-colors">
                                            {{ $pegawai->hp }}
                                        </a>
                                        @else
                                        -
                                        @endif
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
            
                    @if($profile->staff->isEmpty())
                    <div class="col-span-full text-center text-gray-500 py-10">
                        Belum ada data staff puskesmas
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>