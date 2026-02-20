@extends('layouts.dashboard')
@section('title', 'Profile Puskesmas')

@section('content')
<div x-data="{
        activeTab: localStorage.getItem('activeTab_profilePuskesmas') || 'informasi-umum',
        setActiveTab(tab) {
            this.activeTab = tab;
            localStorage.setItem('activeTab_profilePuskesmas', tab);
        }
    }" x-init="$watch('activeTab', value => localStorage.setItem('activeTab_profilePuskesmas', value))" class="p-0">

    <!-- Tabs Navigation -->
    <section class="py-3 bg-white top-0 z-30 shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative">
                <!-- Tab Pills -->
                <div id="tabPills"
                    class="flex items-center gap-3 overflow-x-auto pb-2 pt-1 scrollbar-hide scroll-smooth px-2">
    
                    <!-- Tab: Informasi Umum -->
                    <button data-tab="informasi-umum"
                        @click="setActiveTab('informasi-umum'); $nextTick(() => scrollToActiveTab())" :class="{
                            'bg-emerald-500 text-white ring-2 ring-emerald-500/20 shadow-lg shadow-emerald-500/20': activeTab === 'informasi-umum',
                            'bg-gray-100/80 text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:shadow-md': activeTab !== 'informasi-umum'
                        }"
                        class="shrink-0 inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-full whitespace-nowrap transition-all duration-300">
                        <i class="ph ph-info text-[16px]"></i> Informasi Umum
                    </button>
    
                    <!-- Tab: Foto Thumbnail -->
                    <button data-tab="foto-thumbnail"
                        @click="setActiveTab('foto-thumbnail'); $nextTick(() => scrollToActiveTab())" :class="{
                            'bg-emerald-500 text-white ring-2 ring-emerald-500/20 shadow-lg shadow-emerald-500/20': activeTab === 'foto-thumbnail',
                            'bg-gray-100/80 text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:shadow-md': activeTab !== 'foto-thumbnail'
                        }"
                        class="shrink-0 inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-full whitespace-nowrap transition-all duration-300">
                        <i class="ph ph-image-square text-[16px]"></i> Foto Puskesmas
                    </button>
    
                    <!-- Tab: Visi & Misi -->
                    <button data-tab="visi-misi" @click="setActiveTab('visi-misi'); $nextTick(() => scrollToActiveTab())"
                        :class="{
                            'bg-emerald-500 text-white ring-2 ring-emerald-500/20 shadow-lg shadow-emerald-500/20': activeTab === 'visi-misi',
                            'bg-gray-100/80 text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:shadow-md': activeTab !== 'visi-misi'
                        }"
                        class="shrink-0 inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-full whitespace-nowrap transition-all duration-300">
                        <i class="ph ph-target text-[16px]"></i> Visi & Misi
                    </button>
    
                    <!-- Tab: Sejarah -->
                    <button data-tab="sejarah" @click="setActiveTab('sejarah'); $nextTick(() => scrollToActiveTab())"
                        :class="{
                            'bg-emerald-500 text-white ring-2 ring-emerald-500/20 shadow-lg shadow-emerald-500/20': activeTab === 'sejarah',
                            'bg-gray-100/80 text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:shadow-md': activeTab !== 'sejarah'
                        }"
                        class="shrink-0 inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-full whitespace-nowrap transition-all duration-300">
                        <i class="ph ph-clock-counter-clockwise text-[16px]"></i> Sejarah
                    </button>
    
                    <!-- Tab: Struktur Organisasi -->
                    <button data-tab="struktur-organisasi"
                        @click="setActiveTab('struktur-organisasi'); $nextTick(() => scrollToActiveTab())" :class="{
                            'bg-emerald-500 text-white ring-2 ring-emerald-500/20 shadow-lg shadow-emerald-500/20': activeTab === 'struktur-organisasi',
                            'bg-gray-100/80 text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:shadow-md': activeTab !== 'struktur-organisasi'
                        }"
                        class="shrink-0 inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-full whitespace-nowrap transition-all duration-300">
                        <i class="ph ph-users-three text-[16px]"></i> Struktur Organisasi
                    </button>
    
                </div>
            </div>
        </div>
    </section>

    <!-- Tabs Content -->
    <div class="p-6 bg-white rounded-xl shadow-lg space-y-6 mt-4">
        <!-- Konten Tab -->
        <div class="mt-6 space-y-6">

            <!-- TAB: Informasi Umum -->
            <div x-show="activeTab === 'informasi-umum'" x-transition>
                <h2 class="text-xl font-semibold text-gray-700 mb-4 flex items-center gap-2">
                    <i class="ph ph-hospital text-emerald-500 text-lg"></i>
                    Informasi Umum
                </h2>
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 relative overflow-hidden">
            
                    <form action="{{ route('admin.profilePuskesmas.update', $profile->id ?? 1) }}" method="POST"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                            {{-- Nama Puskesmas --}}
                            <div>
                                <label for="nama_puskesmas" class="block text-sm font-medium text-gray-700">Nama Puskesmas <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="nama_puskesmas" name="nama_puskesmas"
                                    value="{{ old('nama_puskesmas', $profile->nama_puskesmas ?? '') }}"
                                    class="mt-2 block w-full text-lg border border-gray-200 rounded-xl px-4 py-3 shadow-sm placeholder:text-gray-400 focus:ring-emerald-400 focus:border-emerald-400"
                                    placeholder="Masukkan nama puskesmas" required>
                                @error('nama_puskesmas') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                            </div>
                        
                            {{-- Kecamatan --}}
                            <div>
                                <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                                <input type="text" id="kecamatan" name="kecamatan" value="{{ old('kecamatan', $profile->kecamatan ?? '') }}"
                                    class="mt-2 block w-full text-lg border border-gray-200 rounded-xl px-4 py-3 shadow-sm placeholder:text-gray-400 focus:ring-emerald-400 focus:border-emerald-400"
                                    placeholder="Masukkan kecamatan">
                            </div>
                        
                            {{-- Kabupaten --}}
                            <div>
                                <label for="kabupaten" class="block text-sm font-medium text-gray-700">Kabupaten</label>
                                <input type="text" id="kabupaten" name="kabupaten" value="{{ old('kabupaten', $profile->kabupaten ?? '') }}"
                                    class="mt-2 block w-full text-lg border border-gray-200 rounded-xl px-4 py-3 shadow-sm placeholder:text-gray-400 focus:ring-emerald-400 focus:border-emerald-400"
                                    placeholder="Masukkan kabupaten">
                            </div>
                        
                            {{-- Provinsi --}}
                            <div>
                                <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                                <input type="text" id="provinsi" name="provinsi" value="{{ old('provinsi', $profile->provinsi ?? '') }}"
                                    class="mt-2 block w-full text-lg border border-gray-200 rounded-xl px-4 py-3 shadow-sm placeholder:text-gray-400 focus:ring-emerald-400 focus:border-emerald-400"
                                    placeholder="Masukkan provinsi">
                            </div>
                        
                            {{-- Kode Pos --}}
                            <div>
                                <label for="kode_pos" class="block text-sm font-medium text-gray-700">Kode Pos</label>
                                <input type="text" id="kode_pos" name="kode_pos" value="{{ old('kode_pos', $profile->kode_pos ?? '') }}"
                                    class="mt-2 block w-full text-lg border border-gray-200 rounded-xl px-4 py-3 shadow-sm placeholder:text-gray-400 focus:ring-emerald-400 focus:border-emerald-400"
                                    placeholder="Masukkan kode pos">
                            </div>
                        
                            {{-- Telepon --}}
                            <div>
                                <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
                                <input type="text" id="telepon" name="telepon" value="{{ old('telepon', $profile->telepon ?? '') }}"
                                    class="mt-2 block w-full text-lg border border-gray-200 rounded-xl px-4 py-3 shadow-sm placeholder:text-gray-400 focus:ring-emerald-400 focus:border-emerald-400"
                                    placeholder="Masukkan nomor telepon">
                            </div>
                        
                            {{-- WhatsApp --}}
                            <div>
                                <label for="whatsapp" class="block text-sm font-medium text-gray-700">WhatsApp</label>
                                <input type="text" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $profile->whatsapp ?? '') }}"
                                    class="mt-2 block w-full text-lg border border-gray-200 rounded-xl px-4 py-3 shadow-sm placeholder:text-gray-400 focus:ring-emerald-400 focus:border-emerald-400"
                                    placeholder="Masukkan nomor WhatsApp">
                            </div>
                        
                            {{-- Email --}}
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $profile->email ?? '') }}"
                                    class="mt-2 block w-full text-lg border border-gray-200 rounded-xl px-4 py-3 shadow-sm placeholder:text-gray-400 focus:ring-emerald-400 focus:border-emerald-400"
                                    placeholder="Masukkan email puskesmas">
                            </div>
                        
                            {{-- Website --}}
                            <div class="md:col-span-2">
                                <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                                <input type="text" id="website" name="website" value="{{ old('website', $profile->website ?? '') }}"
                                    class="mt-2 block w-full text-lg border border-gray-200 rounded-xl px-4 py-3 shadow-sm placeholder:text-gray-400 focus:ring-emerald-400 focus:border-emerald-400"
                                    placeholder="Masukkan alamat website">
                            </div>
                        
                            {{-- Alamat --}}
                            <div class="md:col-span-2">
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                <textarea id="alamat" name="alamat" rows="3"
                                    class="mt-2 block w-full text-lg border border-gray-200 rounded-xl px-4 py-3 shadow-sm placeholder:text-gray-400 focus:ring-emerald-400 focus:border-emerald-400"
                                    placeholder="Masukkan alamat lengkap">{{ old('alamat', $profile->alamat ?? '') }}</textarea>
                            </div>
                        
                            {{-- Logo --}}
                            <div class="md:col-span-2">
                                <label for="logo" class="block text-sm font-medium text-gray-700">Logo Puskesmas</label>
                                <input type="file" id="logo" name="logo" accept=".jpg,.jpeg,.png"
                                    class="mt-2 block w-full text-lg border border-gray-200 rounded-xl px-4 py-3 shadow-sm focus:ring-emerald-400 focus:border-emerald-400">
                                <p class="text-xs text-gray-500 mt-1">Format: .jpg, .jpeg, .png (max 2MB)</p>
                        
                                @if(isset($profile->logo))
                                <img src="{{ asset('storage/'.$profile->logo) }}" alt="Logo"
                                    class="mt-3 w-24 h-24 rounded-full object-cover shadow border border-gray-200">
                                @endif
                            </div>
                        </div>
                
                        <!-- Tombol Simpan -->
                        <div class="pt-4 flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-2.5 bg-emerald-500 text-white rounded-lg font-semibold shadow hover:bg-emerald-600 transition">
                                <i class="ph ph-floppy-disk text-lg"></i> Update
                            </button>
                        </div>
                    </form>
                    <!-- Background Accent -->
                    <div class="absolute top-0 right-0 w-20 h-20 bg-emerald-100 rounded-bl-full opacity-40 pointer-events-none">
                    </div>
                </div>
            </div>

            <!-- Tab: Foto Thumbnail -->
            <div x-show="activeTab === 'foto-thumbnail'" x-transition x-data="{ openModal: false, previewUrl: null }">
                <h2 class="text-xl font-semibold text-gray-700 mb-4 flex items-center gap-2">
                    <i class="ph ph-image-square text-emerald-500 text-lg"></i>
                    Foto Puskesmas
                </h2>
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 relative overflow-hidden">
            
                    <div class="space-y-6">
                        <!-- Tombol Upload Baru -->
                        <button @click="openModal = true"
                            class="px-4 py-2 bg-emerald-500 text-white rounded-lg shadow hover:bg-emerald-600 transition">
                            <i class="ph ph-upload-simple mr-1"></i> Upload Gambar Baru
                        </button>
                
                        <!-- Grid Thumbnail -->
                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                            @forelse($profile->images ?? [] as $img)
                            <div class="relative group">
                                <img src="{{ asset('storage/' . $img->image_path) }}" alt="Foto Puskesmas"
                                    class="rounded-xl shadow-md hover:scale-105 transition-transform duration-300 w-full h-48 object-cover">
                
                                <!-- Tombol hapus -->
                                <form action="{{ route('admin.imagePuskesmas.delete') }}" method="POST" class="absolute top-2 right-2">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $img->id }}">
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus gambar ini?')"
                                        class="bg-white/80 backdrop-blur-md rounded-full p-2 shadow-md hover:bg-red-100 transition">
                                        <i class="ph ph-trash text-red-600"></i>
                                    </button>
                                </form>
                
                                <!-- Caption -->
                                @if($img->caption)
                                <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white text-xs px-2 py-1 rounded-b-xl">
                                    {{ $img->caption }}
                                </div>
                                @endif
                            </div>
                            @empty
                            <div
                                class="flex flex-col items-center justify-center bg-gray-50 border border-dashed border-gray-300 rounded-xl h-48 col-span-full">
                                <i class="ph ph-image text-4xl text-gray-400"></i>
                                <p class="text-gray-500 text-sm mt-2">Belum ada foto thumbnail</p>
                            </div>
                            @endforelse
                        </div>
                
                        <!-- Modal Upload Gambar -->
                        <div x-show="openModal" x-cloak class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
                            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 relative">
                                <!-- Tombol close -->
                                <button @click="openModal = false"
                                    class="absolute top-3 right-3 bg-gray-100 rounded-full p-2 hover:bg-gray-200">
                                    <i class="ph ph-x text-gray-600 text-lg"></i>
                                </button>
                
                                <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
                                    <i class="ph ph-upload-simple text-emerald-500"></i>
                                    Upload Gambar Baru
                                </h3>
                
                                <form action="{{ route('admin.imagePuskesmas.store') }}" method="POST" enctype="multipart/form-data"
                                    class="space-y-4">
                                    @csrf
                
                                    <!-- Preview -->
                                    <template x-if="previewUrl">
                                        <img :src="previewUrl" alt="Preview" class="w-full h-48 object-cover rounded-xl shadow mb-3">
                                    </template>
                
                                    <!-- Input file -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Gambar</label>
                                        <input type="file" name="image_path" accept=".jpg,.jpeg,.png"
                                            @change="previewUrl = URL.createObjectURL($event.target.files[0])"
                                            class="w-full text-sm border border-emerald-200 bg-gray-50 rounded-lg px-3 py-2 shadow-sm focus:ring-emerald-400 focus:border-emerald-400"
                                            required>
                                        <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG (max 2MB)</p>
                                    </div>
                
                                    <!-- Caption -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Caption</label>
                                        <input type="text" name="caption"
                                            class="w-full text-sm border border-emerald-200 bg-gray-50 rounded-lg px-3 py-2 shadow-sm focus:ring-emerald-400 focus:border-emerald-400"
                                            placeholder="Keterangan foto (opsional)">
                                    </div>
                
                                    <div class="flex justify-end gap-3">
                                        <button type="button" @click="openModal = false"
                                            class="px-4 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200">Batal</button>
                                        <button type="submit"
                                            class="px-4 py-2 bg-emerald-500 text-white rounded-lg shadow hover:bg-emerald-600">
                                            <i class="ph ph-floppy-disk text-lg"></i> Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!-- Background Accent -->
                <div class="absolute top-0 right-0 w-20 h-20 bg-emerald-100 rounded-bl-full opacity-40 pointer-events-none">
                </div>
                </div>
            </div>

            <!-- Tab: Visi & Misi -->
            <div x-data="{ showVisiModal: false, visiContent: @js($profile->visi->content ?? '') }" x-cloak>
                <div x-show="activeTab === 'visi-misi'" x-transition>
                    <h2 class="text-xl font-semibold text-gray-700 mb-4"><i class="ph ph-target text-emerald-500 text-lg"></i> Visi & Misi</h2>
            
                    <div class="space-y-6 relative">
                        <!-- VISI -->
                        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 relative overflow-hidden">
                            <div class="flex justify-between items-center mb-3">
                                <p class="font-semibold text-emerald-700 text-lg flex items-center gap-2">
                                    <i class="fas fa-bullseye text-emerald-600"></i> Visi
                                </p>
                                <button @click="showVisiModal = true"
                                    class="flex items-center gap-2 px-3 py-1.5 bg-emerald-50 text-emerald-700 text-sm font-medium rounded-full hover:bg-emerald-100 transition-all duration-200 border border-emerald-100 shadow-sm">
                                    <i class="fas fa-pen text-emerald-600"></i> Edit
                                </button>
                            </div>
            
                            <p class="text-gray-700 italic leading-relaxed text-base">
                                {{ $profile->visi->content ?? 'Belum ada data visi.' }}
                            </p>
            
                            <!-- Background Accent -->
                            <div
                                class="absolute top-0 right-0 w-20 h-20 bg-emerald-100 rounded-bl-full opacity-40 pointer-events-none">
                            </div>
                        </div>


                        <div x-data="{
                            showAddMisiModal: false,
                            showEditMisiModal: false,
                            editMisiId: null,
                            editMisiContent: '',
                        }" class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 relative overflow-hidden mt-6">
                        
                            <!-- Header -->
                            <div class="flex justify-between items-center mb-5">
                                <p class="font-semibold text-emerald-700 text-lg flex items-center gap-2">
                                    <i class="fas fa-list-ul text-emerald-600"></i> Misi
                                </p>
                                <button @click="showAddMisiModal = true"
                                    class="flex items-center gap-2 px-4 py-2 bg-emerald-50 text-emerald-700 text-sm font-medium rounded-xl hover:bg-emerald-100 transition-all duration-200 border border-emerald-100 shadow-sm">
                                    <i class="fas fa-plus text-emerald-600"></i> Tambah Misi
                                </button>
                            </div>
                        
                            <!-- Daftar Misi -->
                            @if ($profile->misi && $profile->misi->count() > 0)
                            <ol class="list-decimal text-gray-700 space-y-3 pl-6">
                                @foreach ($profile->misi as $misi)
                                <li class="relative bg-gradient-to-br from-gray-50 to-white border border-gray-100 rounded-xl 
                                                   p-4 shadow-sm hover:shadow-md transition duration-200">
                                    <div class="flex justify-between items-start gap-3">
                                        <!-- Isi Misi -->
                                        <div class="flex-1 text-gray-700 leading-relaxed">
                                            {{ $misi->content }}
                                        </div>
                            
                                        <!-- Tombol Aksi -->
                                        <div class="flex items-center gap-2 shrink-0">
                                            <!-- Tombol Edit -->
                                            <button
                                                @click="showEditMisiModal = true; editMisiId = {{ $misi->id }}; editMisiContent = '{{ addslashes($misi->content) }}'"
                                                class="p-2 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-100 hover:text-emerald-800 transition"
                                                title="Edit">
                                                <i class="ph ph-pencil-simple text-[18px]"></i>
                                            </button>
                                        
                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('misi.destroy', $misi->id) }}" method="POST" onsubmit="return confirm('Hapus misi ini?')"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="p-2 rounded-lg bg-red-50 text-red-500 hover:bg-red-100 hover:text-red-700 transition" title="Hapus">
                                                    <i class="ph ph-trash text-[18px]"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ol>
                            @else
                            <p class="text-gray-500 italic">Belum ada data misi.</p>
                            @endif
                        
                            <!-- Background Accent -->
                            <div class="absolute top-0 right-0 w-20 h-20 bg-emerald-100 rounded-bl-full opacity-30 pointer-events-none"></div>
                        
                            <!-- MODAL TAMBAH MISI -->
                            <div x-show="showAddMisiModal"
                                class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm transition-opacity"
                                x-transition.opacity>
                                <div @click.away="showAddMisiModal = false"
                                    class="bg-white w-full max-w-lg p-6 rounded-2xl shadow-lg border border-gray-100">
                                    <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
                                        <i class="fas fa-plus text-emerald-600"></i> Tambah Misi
                                    </h3>
                                    <form action="{{ route('misi.store') }}" method="POST">
                                        @csrf
                                        <textarea name="content" rows="4"
                                            class="w-full border border-gray-300 rounded-xl p-3 focus:ring-emerald-400 focus:border-emerald-400"
                                            placeholder="Tulis misi baru..."></textarea>
                                        <div class="flex justify-end gap-3 mt-5">
                                            <button type="button" @click="showAddMisiModal = false"
                                                class="px-4 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition">Batal</button>
                                            <button type="submit"
                                                class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 shadow-sm"><i class="ph ph-floppy-disk text-lg"></i> Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        
                            <!-- MODAL EDIT MISI -->
                            <div x-show="showEditMisiModal"
                                class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm transition-opacity"
                                x-transition.opacity>
                                <div @click.away="showEditMisiModal = false"
                                    class="bg-white w-full max-w-lg p-6 rounded-2xl shadow-lg border border-gray-100">
                                    <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
                                        <i class="fas fa-pen text-emerald-600"></i> Edit Misi
                                    </h3>
                                    <form :action="`/misi/update/${editMisiId}`" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <textarea x-model="editMisiContent" name="content" rows="4"
                                            class="w-full border border-gray-300 rounded-xl p-3 focus:ring-emerald-400 focus:border-emerald-400"></textarea>
                                        <div class="flex justify-end gap-3 mt-5">
                                            <button type="button" @click="showEditMisiModal = false"
                                                class="px-4 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition">Batal</button>
                                            <button type="submit"
                                                class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 shadow-sm"><i class="ph ph-floppy-disk text-lg"></i> Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MODAL DIPINDAH KE LUAR TAB -->
                <div x-show="showVisiModal"
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm transition-opacity"
                    x-transition.opacity>
                    <div @click.away="showVisiModal = false"
                        class="bg-white w-full max-w-lg p-6 rounded-2xl shadow-lg border border-gray-100 transform transition-all duration-300 scale-100">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
                            <i class="fas fa-pen text-emerald-600"></i> Edit Visi Puskesmas
                        </h3>
            
                        <form action="{{ route('visi.update') }}" method="POST">
                            @csrf
                            {{-- @method('PUT') --}}
                            <textarea x-model="visiContent" name="content" rows="6"
                                class="w-full border border-gray-300 rounded-xl p-3 focus:ring-emerald-400 focus:border-emerald-400 placeholder-gray-400"
                                placeholder="Tulis visi puskesmas di sini..."></textarea>
            
                            <div class="flex justify-end gap-3 mt-5">
                                <button type="button" @click="showVisiModal = false"
                                    class="px-4 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
                                    Batal
                                </button>
                                <button type="submit"
                                    class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 shadow-sm">
                                    <i class="ph ph-floppy-disk text-lg"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tab: Sejarah -->
            <div x-data="{ showSejarahModal: false, sejarahContent: @js($profile->sejarah->content ?? '') }" x-cloak>
                <div x-show="activeTab === 'sejarah'" x-transition>
                    <div class="flex justify-between items-center mb-3">
                        <h2 class="text-xl font-semibold text-gray-700"><i class="ph ph-clock-counter-clockwise text-emerald-500 text-lg"></i> Sejarah Puskesmas</h2>
            
                        <button @click="showSejarahModal = true"
                            class="flex items-center gap-2 px-3 py-1.5 bg-emerald-50 text-emerald-700 text-sm font-medium rounded-full hover:bg-emerald-100 transition-all duration-200 border border-emerald-100 shadow-sm">
                            <i class="ph ph-pencil-simple text-[16px]"></i> Edit
                        </button>
                    </div>
            
                    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 relative overflow-hidden">
                        <p class="text-gray-700 leading-relaxed text-base whitespace-pre-line">
                            {{ $profile->sejarah->content ?? 'Belum ada data sejarah puskesmas.' }}
                        </p>
            
                        <!-- Background Accent -->
                        <div class="absolute top-0 right-0 w-20 h-20 bg-emerald-100 rounded-bl-full opacity-40 pointer-events-none">
                        </div>
                    </div>
                </div>
            
                <!-- MODAL EDIT SEJARAH -->
                <div x-show="showSejarahModal"
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm transition-opacity"
                    x-transition.opacity>
                    <div @click.away="showSejarahModal = false"
                        class="bg-white w-full max-w-4xl p-8 rounded-2xl shadow-xl border border-gray-200 transform transition-all duration-300 scale-100">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-5 flex items-center gap-2">
                            <i class="ph ph-pencil-simple text-emerald-600 text-[22px]"></i>
                            Edit Sejarah Puskesmas
                        </h3>
                
                        <form action="{{ route('sejarah.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                
                            <textarea x-model="sejarahContent" name="content" rows="10"
                                class="w-full border border-gray-300 rounded-xl p-4 text-gray-700 focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 placeholder-gray-400 resize-none"
                                placeholder="Tulis sejarah puskesmas di sini..."></textarea>
                
                            <div class="flex justify-end gap-3 mt-6">
                                <button type="button" @click="showSejarahModal = false"
                                    class="px-5 py-2.5 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition font-medium">
                                    Batal
                                </button>
                                <button type="submit"
                                    class="px-5 py-2.5 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 shadow-sm font-medium flex items-center gap-2">
                                    <i class="ph ph-floppy-disk text-lg"></i>
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tab: Struktur Organisasi -->
            <div x-show="activeTab === 'struktur-organisasi'" x-transition x-data="{ openModal: false, previewUrl: null }">
                <h2 class="text-xl font-semibold text-gray-700 mb-4 flex items-center gap-2">
                    <i class="ph ph-users-three text-emerald-500 text-lg"></i>
                    Struktur Organisasi
                </h2>
            
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 relative overflow-hidden">
                    <div class="space-y-6">
                        <!-- Tombol Upload Baru -->
                        <button @click="openModal = true"
                            class="px-4 py-2 bg-emerald-500 text-white rounded-lg shadow hover:bg-emerald-600 transition">
                            <i class="ph ph-upload-simple mr-1"></i> Upload / Ganti Gambar
                        </button>
            
                        <!-- Gambar Struktur Organisasi -->
                        @if($profile && $profile->struktur && $profile->struktur->image)
                        <div class="relative">
                            <img src="{{ asset('storage/' . $profile->struktur->image) }}" alt="Struktur Organisasi Puskesmas"
                                class="rounded-xl shadow-md w-full max-h-[600px] object-contain border border-gray-200">
            
                            <!-- Tombol hapus -->
                            <form action="{{ route('strukturOrganisasi.delete') }}" method="POST"
                                class="absolute top-3 right-3">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $profile->struktur->id }}">
                                <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus gambar struktur organisasi ini?')"
                                    class="bg-white/80 backdrop-blur-md rounded-full p-2 shadow-md hover:bg-red-100 transition">
                                    <i class="ph ph-trash text-red-600"></i>
                                </button>
                            </form>
                        </div>
                        @else
                        <div
                            class="flex flex-col items-center justify-center bg-gray-50 border border-dashed border-gray-300 rounded-xl h-64">
                            <i class="ph ph-image text-5xl text-gray-400"></i>
                            <p class="text-gray-500 text-sm mt-2">Belum ada gambar struktur organisasi</p>
                        </div>
                        @endif
            
                        <!-- Modal Upload Gambar -->
                        <div x-show="openModal" x-cloak class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
                            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 relative">
                                <!-- Tombol close -->
                                <button @click="openModal = false"
                                    class="absolute top-3 right-3 bg-gray-100 rounded-full p-2 hover:bg-gray-200">
                                    <i class="ph ph-x text-gray-600 text-lg"></i>
                                </button>
            
                                <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
                                    <i class="ph ph-upload-simple text-emerald-500"></i>
                                    Upload / Ganti Gambar
                                </h3>
            
                                <form action="{{ route('strukturOrganisasi.store') }}" method="POST"
                                    enctype="multipart/form-data" class="space-y-4">
                                    @csrf
            
                                    <!-- Preview -->
                                    <template x-if="previewUrl">
                                        <img :src="previewUrl" alt="Preview"
                                            class="w-full h-48 object-cover rounded-xl shadow mb-3">
                                    </template>
            
                                    <!-- Input file -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Gambar</label>
                                        <input type="file" name="image" accept=".jpg,.jpeg,.png"
                                            @change="previewUrl = URL.createObjectURL($event.target.files[0])"
                                            class="w-full text-sm border border-emerald-200 bg-gray-50 rounded-lg px-3 py-2 shadow-sm focus:ring-emerald-400 focus:border-emerald-400"
                                            required>
                                        <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG (max 2MB)</p>
                                    </div>
            
                                    <div class="flex justify-end gap-3">
                                        <button type="button" @click="openModal = false"
                                            class="px-4 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200">Batal</button>
                                        <button type="submit"
                                            class="px-4 py-2 bg-emerald-500 text-white rounded-lg shadow hover:bg-emerald-600">
                                            <i class="ph ph-floppy-disk text-lg"></i> Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            
                    <!-- Background Accent -->
                    <div class="absolute top-0 right-0 w-20 h-20 bg-emerald-100 rounded-bl-full opacity-40 pointer-events-none">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function scrollToActiveTab() {
        const active = document.querySelector('#tabPills button.bg-emerald-500');
        if (active) {
            active.scrollIntoView({ behavior: 'smooth', inline: 'center' });
        }
    }
</script>

<style>
    /* Hilangkan scrollbar horizontal */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
@endsection