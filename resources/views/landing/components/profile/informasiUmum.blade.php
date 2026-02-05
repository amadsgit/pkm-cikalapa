<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mt-6">
    <!-- Image Column with Slider Gallery & Header -->
    <div class="lg:col-span-5 xl:col-span-4">
        <!-- Puskesmas Identity at Top -->
        <div class="bg-gray-50 shadow-sm rounded-lg p-5 mb-4 border border-gray-100 text-center">
            <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo Puskesmas"
                class="h-20 w-20 object-contain mx-auto mb-3">
            <h3 class="font-semibold text-xl text-gray-900 mb-1">
                {{ $profile->nama_puskesmas }}
            </h3>
            <p class="text-sm text-gray-500">
                Kecamatan {{ $profile->kecamatan }}, Kabupaten {{ $profile->kabupaten }}
            </p>
        </div>

        <!-- Image Slider for Thumbnails -->
        <div x-data="{
                currentIndex: 0,
                total: {{ count($imagePuskesmas) }},
                next() {
                    this.currentIndex = (this.currentIndex + 1) % this.total;
                },
                prev() {
                    this.currentIndex = (this.currentIndex - 1 + this.total) % this.total;
                },
                touchStartX: 0,
                touchEndX: 0,
                touchStart(e) {
                    this.touchStartX = e.changedTouches[0].screenX;
                },
                touchEnd(e) {
                    this.touchEndX = e.changedTouches[0].screenX;
                    if (this.touchStartX - this.touchEndX > 50) this.next();
                    else if (this.touchEndX - this.touchStartX > 50) this.prev();
                },
                autoplay() {
                    setInterval(() => {
                        this.next();
                    }, 4000); // Ganti 4000 (ms) kalau mau lebih cepat/lambat
                }
            }" x-init="autoplay()" class="relative mb-4 rounded-lg overflow-hidden shadow-sm">
            <!-- Main Slider -->
            <div class="relative aspect-w-16 aspect-h-9 bg-gray-100">
                @foreach($imagePuskesmas as $index => $img)
                <div x-show="currentIndex === {{ $index }}" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100" class="w-full h-full absolute inset-0">
                    <img src="{{ asset('storage/'.$img->image_path) }}" alt="{{ $img->caption ?? 'Foto Puskesmas' }}"
                        class="w-full h-full object-cover">
                    @if($img->caption)
                    <div class="absolute bottom-0 left-0 w-full bg-black/40 text-white text-sm p-2">
                        {{ $img->caption }}
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        
            <!-- Tombol Navigasi -->
            <button @click.stop="prev()"
                class="absolute left-2 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-sm text-white hover:bg-black/60 transition z-20">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button @click.stop="next()"
                class="absolute right-2 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-sm text-white hover:bg-black/60 transition z-20">
                <i class="fas fa-chevron-right"></i>
            </button>
        
            <!-- Dots -->
            <div class="absolute bottom-3 left-0 right-0 flex justify-center gap-2 z-20">
                @foreach($imagePuskesmas as $index => $img)
                <button @click.stop="currentIndex = {{ $index }}"
                    :class="{'bg-white': currentIndex === {{ $index }}, 'bg-white/50 hover:bg-white/70': currentIndex !== {{ $index }} }"
                    class="w-2.5 h-2.5 rounded-full transition-all"></button>
                @endforeach
            </div>
        
            <!-- Swipe Area -->
            <div class="absolute inset-0 z-10" x-on:touchstart="touchStart($event)" x-on:touchend="touchEnd($event)"></div>
        </div>
    </div>

    <!-- Information Column -->
    <div class="lg:col-span-7 xl:col-span-8 space-y-6">
        <!-- General Information Card -->
        <div class="bg-gray-50 shadow-sm rounded-lg overflow-hidden border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center">
                <i class="fas fa-file-alt text-emerald-500 mr-2"></i>
                <h3 class="font-medium text-gray-900">Informasi Puskesmas</h3>
            </div>
            <div class="p-6">
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 flex items-center">
                            <i class="fas fa-signature text-emerald-400 mr-1.5 text-xs"></i>
                            Nama Puskesmas
                        </dt>
                        <dd class="mt-1 text-gray-900">UPTD {{ $profile->nama_puskesmas }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 flex items-center">
                            <i class="fas fa-map text-emerald-400 mr-1.5 text-xs"></i>
                            Kecamatan
                        </dt>
                        <dd class="mt-1 text-gray-900">{{ $profile->kecamatan }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 flex items-center">
                            <i class="fas fa-city text-emerald-400 mr-1.5 text-xs"></i>
                            Kabupaten
                        </dt>
                        <dd class="mt-1 text-gray-900">{{ $profile->kabupaten }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 flex items-center">
                            <i class="fas fa-map-marked text-emerald-400 mr-1.5 text-xs"></i>
                            Provinsi
                        </dt>
                        <dd class="mt-1 text-gray-900">{{ $profile->provinsi }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 flex items-center">
                            <i class="fas fa-mail-bulk text-emerald-400 mr-1.5 text-xs"></i>
                            Kode Pos
                        </dt>
                        <dd class="mt-1 text-gray-900">{{ $profile->kode_pos }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Contact Information Card -->
        <div class="bg-gray-50 shadow-sm rounded-lg overflow-hidden border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center">
                <i class="fas fa-address-card text-emerald-500 mr-2"></i>
                <h3 class="font-medium text-gray-900">Kontak & Alamat</h3>
            </div>
            <div class="p-6">
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 flex items-center">
                            <i class="fas fa-phone-alt text-emerald-400 mr-1.5 text-xs"></i>
                            Telepon
                        </dt>
                        <dd class="mt-1 text-gray-900">
                            <a href="tel:{{ $profile->telepon }}"
                                class="text-emerald-600 hover:underline flex items-center group">
                                <span>{{ $profile->telepon }}</span>
                                <i
                                    class="fas fa-headset ml-1.5 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                            </a>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 flex items-center">
                            <i class="fas fa-envelope text-emerald-400 mr-1.5 text-xs"></i>
                            Email
                        </dt>
                        <dd class="mt-1 text-gray-900">
                            <a href="mailto:{{ $profile->email }}"
                                class="text-emerald-600 hover:underline flex items-center group">
                                <span>{{ $profile->email }}</span>
                                <i
                                    class="fas fa-paper-plane ml-1.5 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                            </a>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 flex items-center">
                            <i class="fas fa-globe text-emerald-400 mr-1.5 text-xs"></i>
                            Website
                        </dt>
                        <dd class="mt-1 text-gray-900">
                            <a href="{{ $profile->website }}" target="_blank"
                                class="text-emerald-600 hover:underline flex items-center group">
                                <span>{{ $profile->website }}</span>
                                <i
                                    class="fas fa-external-link-alt ml-1.5 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                            </a>
                        </dd>
                    </div>
                    <div class="md:col-span-2">
                        <dt class="text-sm font-medium text-gray-500 flex items-center">
                            <i class="fas fa-map-marker-alt text-emerald-400 mr-1.5 text-xs"></i>
                            Alamat Puskesmas
                        </dt>
                        <dd class="mt-1 text-gray-900">{{ $profile->alamat }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>