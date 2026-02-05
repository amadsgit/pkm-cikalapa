@extends('layouts.dashboard')
@section('title', 'Geografis Puskesmas')

@section('content')
<div x-data="{
        activeTab: localStorage.getItem('activeTab_geografisPuskesmas') || 'wilayah-kerja',
        setActiveTab(tab) {
            this.activeTab = tab;
            localStorage.setItem('activeTab_geografisPuskesmas', tab);
        }
    }" x-init="$watch('activeTab', value => localStorage.setItem('activeTab_geografisPuskesmas', value))" class="p-0">

    <!-- Tabs Navigation -->
    <section class="py-3 bg-white top-0 z-30 shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative">
                <!-- Tab Pills -->
                <div id="tabPills"
                    class="flex items-center gap-3 overflow-x-auto pb-2 pt-1 scrollbar-hide scroll-smooth px-2">

                    <!-- Tab: Wilayah Kerja -->
                    <button data-tab="wilayah-kerja"
                        @click="setActiveTab('wilayah-kerja'); $nextTick(() => scrollToActiveTab())" :class="{
                            'bg-emerald-500 text-white ring-2 ring-emerald-500/20 shadow-lg shadow-emerald-500/20': activeTab === 'wilayah-kerja',
                            'bg-gray-100/80 text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:shadow-md': activeTab !== 'wilayah-kerja'
                        }"
                        class="shrink-0 inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-full whitespace-nowrap transition-all duration-300">
                        <i class="ph ph-map-trifold text-[16px]"></i> Wilayah Kerja
                    </button>

                    <!-- Tab: Luas Wilayah -->
                    <button data-tab="luas-wilayah"
                        @click="setActiveTab('luas-wilayah'); $nextTick(() => scrollToActiveTab())" :class="{
                            'bg-emerald-500 text-white ring-2 ring-emerald-500/20 shadow-lg shadow-emerald-500/20': activeTab === 'luas-wilayah',
                            'bg-gray-100/80 text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:shadow-md': activeTab !== 'luas-wilayah'
                        }"
                        class="shrink-0 inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-full whitespace-nowrap transition-all duration-300">
                        <i class="ph ph-ruler text-[16px]"></i> Luas Wilayah
                    </button>

                    <!-- Tab: Visi & Misi -->
                    <button data-tab="batas-wilayah"
                        @click="setActiveTab('batas-wilayah'); $nextTick(() => scrollToActiveTab())" :class="{
                            'bg-emerald-500 text-white ring-2 ring-emerald-500/20 shadow-lg shadow-emerald-500/20': activeTab === 'batas-wilayah',
                            'bg-gray-100/80 text-gray-600 hover:bg-gray-200 hover:text-gray-700 hover:shadow-md': activeTab !== 'batas-wilayah'
                        }"
                        class="shrink-0 inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-full whitespace-nowrap transition-all duration-300">
                        <i class="ph ph-compass text-[16px]"></i> Batas Wilayah
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Tabs Content -->
    <div class="p-6 bg-white rounded-xl shadow-lg space-y-6 mt-4">
        <!-- Konten Tab -->
        <div class="mt-6 space-y-6">

            <!-- TAB: Wilayah Kerja-->
            <div x-show="activeTab === 'wilayah-kerja'" x-transition>
                <h2 class="text-xl font-semibold text-gray-700 mb-4 flex items-center gap-2">
                    <i class="ph ph-map-trifold text-emerald-500 text-lg"></i>
                    Wilayah Kerja
                </h2>
            
                <div x-data="{ openModal: false, editMode: false, formData: { id: null, nama: '', jenis: '', kode_wilayah: '' } }"
                    class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 relative overflow-hidden">
            
                    <!-- Tombol Tambah -->
                    <div class="flex justify-between items-center mb-5">
                        <button
                            @click="openModal = true; editMode = false; formData = { id: null, nama: '', jenis: '', kode_wilayah: '' }"
                            class="px-4 py-2 bg-emerald-500 text-white rounded-lg shadow hover:bg-emerald-600 transition flex items-center gap-2">
                            <i class="ph ph-plus-circle text-lg"></i> Tambah Wilayah
                        </button>
                    </div>
            
                    <!-- Tabel Data -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-gray-700 border border-gray-100 rounded-lg overflow-hidden">
                            <thead class="bg-gray-50 border-b border-gray-100 text-gray-600">
                                <tr>
                                    <th class="py-3 px-4 text-left">No</th>
                                    <th class="py-3 px-4 text-left">Nama Wilayah</th>
                                    <th class="py-3 px-4 text-left">Jenis</th>
                                    <th class="py-3 px-4 text-left">Kode Wilayah</th>
                                    <th class="py-3 px-4 text-center w-32">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($profile?->wilayahKerja ?? [] as $index => $wilayah)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-4">{{ $index + 1 }}</td>
                                    <td class="py-2 px-4">{{ $wilayah->nama }}</td>
                                    <td class="py-2 px-4 capitalize">{{ $wilayah->jenis }}</td>
                                    <td class="py-2 px-4">{{ $wilayah->kode_wilayah }}</td>
                                    <td class="py-2 px-4 text-center">
                                        <div class="flex justify-center gap-2">
                                            <!-- Tombol Edit -->
                                            <button @click="openModal = true; editMode = true; formData = { 
                                                    id: '{{ $wilayah->id }}',
                                                    nama: '{{ $wilayah->nama }}',
                                                    jenis: '{{ $wilayah->jenis }}',
                                                    kode_wilayah: '{{ $wilayah->kode_wilayah }}'
                                                }" class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition">
                                                <i class="ph ph-pencil-simple text-base"></i>
                                            </button>
            
                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('wilayahKerja.delete', $wilayah->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus wilayah ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition">
                                                    <i class="ph ph-trash text-base"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="py-4 text-center text-gray-500 italic">
                                        Belum ada data wilayah kerja
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
            
                    <!-- Modal Form -->
                    <div x-show="openModal" x-cloak class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
                        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 relative">
                            <button @click="openModal = false"
                                class="absolute top-3 right-3 bg-gray-100 rounded-full p-2 hover:bg-gray-200">
                                <i class="ph ph-x text-gray-600 text-lg"></i>
                            </button>
            
                            <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
                                <i class="ph ph-map-pin-line text-emerald-500"></i>
                                <span x-text="editMode ? 'Edit Wilayah' : 'Tambah Wilayah'"></span>
                            </h3>
            
                            <form
                                :action="editMode ? '{{ route('wilayahKerja.update', '') }}/' + formData.id : '{{ route('wilayahKerja.store') }}'"
                                method="POST" class="space-y-4">
                                @csrf
                                <template x-if="editMode">
                                    <input type="hidden" name="_method" value="PUT">
                                </template>
            
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Wilayah</label>
                                    <input type="text" name="nama" x-model="formData.nama" required
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-emerald-400 focus:border-emerald-400">
                                </div>
            
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Wilayah</label>
                                    <select name="jenis" x-model="formData.jenis" required
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-emerald-400 focus:border-emerald-400">
                                        <option value="">Pilih Jenis</option>
                                        <option value="desa">Desa</option>
                                        <option value="kelurahan">Kelurahan</option>
                                    </select>
                                </div>
            
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Kode Wilayah</label>
                                    <input type="text" name="kode_wilayah" x-model="formData.kode_wilayah" required
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-emerald-400 focus:border-emerald-400">
                                </div>
            
                                <div class="flex justify-end gap-3">
                                    <button type="button" @click="openModal = false"
                                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">Batal</button>
                                    <button type="submit"
                                        class="px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600">
                                        <i class="ph ph-floppy-disk text-lg"></i> Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
            
                    <!-- Background Accent -->
                    <div class="absolute top-0 right-0 w-20 h-20 bg-emerald-100 rounded-bl-full opacity-40 pointer-events-none">
                    </div>
                </div>
            </div>


            <!-- Tab: Luas Wilayah -->
            <div x-show="activeTab === 'luas-wilayah'" x-transition
                x-data="{ openModal: false, editMode: false, formData: { id: '', luas_m2: '', luas_hektar: '', map_embed: '' } }">
            
                <h2 class="text-xl font-semibold text-gray-700 mb-4 flex items-center gap-2">
                    <i class="ph ph-ruler text-emerald-500 text-lg"></i>
                    Luas Wilayah
                </h2>
            
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 relative overflow-hidden">
                    <!-- Background Accent -->
                    <div class="absolute top-0 right-0 w-20 h-20 bg-emerald-100 rounded-bl-full opacity-40 pointer-events-none">
                    </div>
            
                    <!-- Tombol Tambah -->
                    <div class="flex justify-end mb-4">
                        <button
                            @click="openModal = true; editMode = false; formData = { id: '', luas_m2: '', luas_hektar: '', map_embed: '' }"
                            class="px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 flex items-center gap-2 transition">
                            <i class="ph ph-plus-circle text-lg"></i> Tambah Data
                        </button>
                    </div>
            
                    <!-- Tabel Data -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-gray-700 border border-gray-100 rounded-lg overflow-hidden">
                            <thead class="bg-gray-50 border-b border-gray-100 text-gray-600">
                                <tr>
                                    <th class="py-3 px-4 text-left">#</th>
                                    <th class="py-3 px-4 text-left">Luas (m²)</th>
                                    <th class="py-3 px-4 text-left">Luas (Hektar)</th>
                                    <th class="py-3 px-4 text-left">Peta Lokasi</th>
                                    <th class="py-3 px-4 text-center w-32">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($profile && $profile->infoWilayah)
                                @php $info = $profile->infoWilayah; @endphp
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-4">*</td>
                                    <td class="py-2 px-4">{{ number_format($info->luas_m2, 0, ',', '.') }} m²</td>
                                    <td class="py-2 px-4">{{ number_format($info->luas_hektar, 2, ',', '.') }} Ha</td>
                                    <td class="py-2 px-4">
                                        @if($info->map_embed)
                                        <div class="w-60 h-40 border rounded-lg overflow-hidden">
                                            {!! $info->map_embed !!}
                                        </div>
                                        @else
                                        <span class="text-gray-400 italic">Belum ada peta</span>
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 text-center">
                                        <div class="flex justify-center gap-2">
                                            <!-- Edit -->
                                            <button @click="openModal = true; editMode = true; formData = { 
                                                        id: '{{ $info->id }}',
                                                        luas_m2: '{{ $info->luas_m2 }}',
                                                        luas_hektar: '{{ $info->luas_hektar }}',
                                                        map_embed: `{{ $info->map_embed }}`
                                                    }" class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition">
                                                <i class="ph ph-pencil-simple text-base"></i>
                                            </button>
                            
                                            <!-- Hapus -->
                                            <form action="{{ route('luasWilayah.delete', $info->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition">
                                                    <i class="ph ph-trash text-base"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @else
                                <tr>
                                    <td colspan="5" class="py-4 text-center text-gray-500 italic">
                                        Belum ada data luas wilayah
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            
                <!-- Modal Form -->
                <div x-show="openModal" x-cloak class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
                    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 relative" x-data x-effect="
                            // Pastikan nilai hektar otomatis berubah ketika m2 diubah
                            if (formData.luas_m2) {
                                formData.luas_hektar = (formData.luas_m2 / 10000).toFixed(2);
                            }
                        ">
                        <!-- Tombol close -->
                        <button @click="openModal = false"
                            class="absolute top-3 right-3 bg-gray-100 rounded-full p-2 hover:bg-gray-200">
                            <i class="ph ph-x text-gray-600 text-lg"></i>
                        </button>
                
                        <!-- Judul -->
                        <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
                            <i class="ph ph-map-pin-line text-emerald-500"></i>
                            <span x-text="editMode ? 'Edit Luas Wilayah' : 'Tambah Luas Wilayah'"></span>
                        </h3>
                
                        <!-- Form -->
                        <form :action="editMode 
                                ? '{{ route('luasWilayah.update', '') }}/' + formData.id 
                                : '{{ route('luasWilayah.store') }}'" method="POST" class="space-y-4">
                            @csrf
                            <template x-if="editMode">
                                <input type="hidden" name="_method" value="PUT">
                            </template>
                
                            <!-- Luas m² -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Luas (m²)</label>
                                <input type="number" name="luas_m2" x-model="formData.luas_m2" required
                                    @input="formData.luas_hektar = (formData.luas_m2 / 10000).toFixed(2)"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-emerald-400 focus:border-emerald-400">
                            </div>
                
                            <!-- Luas hektar -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Luas (Hektar)</label>
                                <input type="number" step="0.01" name="luas_hektar" x-model="formData.luas_hektar" readonly
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-50 text-gray-700 cursor-not-allowed">
                            </div>
                
                            <!-- Embed Maps -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Embed Google Maps</label>
                                <textarea name="map_embed" x-model="formData.map_embed" rows="3"
                                    placeholder="Paste iframe embed dari Google Maps"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-emerald-400 focus:border-emerald-400"></textarea>
                            </div>
                
                            <!-- Tombol Aksi -->
                            <div class="flex justify-end gap-3">
                                <button type="button" @click="openModal = false"
                                    class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                                    Batal
                                </button>
                                <button type="submit" class="px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600">
                                    <i class="ph ph-floppy-disk text-lg"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tab: Batas Wilayah -->
            <div x-show="activeTab === 'batas-wilayah'" x-transition x-data="{ openModal: false, previewUrl: null }">
                <h2 class="text-xl font-semibold text-gray-700 mb-4 flex items-center gap-2">
                    <i class="ph ph-compass text-emerald-500 text-lg"></i>
                    Batas Wilayah
                </h2>
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 relative overflow-hidden">

                    
                    <!-- Background Accent -->
                    <div
                        class="absolute top-0 right-0 w-20 h-20 bg-emerald-100 rounded-bl-full opacity-40 pointer-events-none">
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