@extends('layouts.dashboard')
@section('title', 'Agenda Kegiatan')

@section('content')
<div x-data="{
        activeTab: localStorage.getItem('activeTab_agenda') || 'daftar-agenda',
        setActiveTab(tab) {
            this.activeTab = tab;
            localStorage.setItem('activeTab_agenda', tab);
        }
    }" x-init="$watch('activeTab', value => localStorage.setItem('activeTab_agenda', value))" class="p-0">

    <!-- Tabs Navigation -->
    <section class="py-3 bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex gap-3 overflow-x-auto scrollbar-hide">

                <!-- Tab: Daftar Agenda -->
                <button @click="setActiveTab('daftar-agenda')" :class="activeTab === 'daftar-agenda'
                        ? 'bg-emerald-500 text-white'
                        : 'bg-gray-100 text-gray-600'"
                    class="px-4 py-2 rounded-full text-sm font-medium flex items-center gap-2">
                    <i class="ph ph-list-bullets"></i>
                    Daftar Agenda
                </button>

                <!-- Tab: Tambah Agenda -->
                <button @click="setActiveTab('tambah-agenda')" :class="activeTab === 'tambah-agenda'
                        ? 'bg-emerald-500 text-white'
                        : 'bg-gray-100 text-gray-600'"
                    class="px-4 py-2 rounded-full text-sm font-medium flex items-center gap-2">
                    <i class="ph ph-plus-circle"></i>
                    Tambah Agenda
                </button>

            </div>
        </div>
    </section>

    <!-- Tabs Content -->
    <div class="p-6 bg-white rounded-xl shadow-lg space-y-6 mt-4">
        <div class="mt-6 space-y-6">

            <!-- TAB: Daftar Agenda -->
            <div x-show="activeTab === 'daftar-agenda'" x-transition>
                <h2 class="text-xl font-semibold text-gray-700 mb-4 flex items-center gap-2">
                    <i class="ph ph-calendar text-emerald-500"></i>
                    Daftar Agenda Kegiatan
                </h2>

                <div class="overflow-x-auto bg-white rounded-xl shadow border">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50 text-gray-600">
                            <tr>
                                <th class="px-4 py-3 text-left">Judul</th>
                                <th class="px-4 py-3">Kategori</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3">Lokasi</th>
                                <th class="px-4 py-3">Author</th>
                                <th class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agenda as $item)
                            <tr class="border-t">
                                <td class="px-4 py-3 font-medium">{{ $item->judul }}</td>
                                <td class="px-4 py-3">{{ $item->kategori->nama ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $item->tanggal }}</td>
                                <td class="px-4 py-3">{{ $item->lokasi }}</td>
                                <td class="px-4 py-3">
                                    {{ $item->author->pegawai->nama_pegawai ?? $item->author->name ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-center flex justify-center gap-2">

                                    <form action="{{ route('agendaKegiatan.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus agenda kegiatan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100">
                                            <i class="ph ph-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach

                            @if($agenda->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center py-6 text-gray-500">
                                    Belum ada data agenda kegiatan
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- TAB: Tambah Agenda -->
            <div x-show="activeTab === 'tambah-agenda'" x-transition>
                <h2 class="text-xl font-semibold text-gray-700 mb-6 flex items-center gap-2">
                    <i class="ph ph-plus-circle text-emerald-500"></i>
                    Tambah Agenda Kegiatan
                </h2>

                <form action="{{ route('agendaKegiatan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                    @csrf

                    {{-- Informasi Agenda --}}
                    <div>
                        <h3 class="text-lg font-semibold text-emerald-600 mb-4 border-b pb-2">
                            Informasi Agenda
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Judul --}}
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    Judul Agenda <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="judul" value="{{ old('judul') }}" placeholder="Masukkan judul agenda"
                                    class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl
                                        px-4 py-3 shadow-sm placeholder:text-gray-400
                                        focus:ring-emerald-400 focus:border-emerald-400" required>
                                @error('judul') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Kategori --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    Kategori <span class="text-red-500">*</span>
                                </label>
                                <select name="kategori_id" class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl
                                        px-4 py-3 shadow-sm
                                        focus:ring-emerald-400 focus:border-emerald-400" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($kategori as $k)
                                    <option value="{{ $k->id }}" {{ old('kategori_id')==$k->id ? 'selected' : '' }}>
                                        {{ $k->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('kategori_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Lokasi --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    Lokasi <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="lokasi" value="{{ old('lokasi') }}" placeholder="Masukkan lokasi kegiatan"
                                    class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl
                                        px-4 py-3 shadow-sm placeholder:text-gray-400
                                        focus:ring-emerald-400 focus:border-emerald-400" required>
                                @error('lokasi') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Tanggal --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    Tanggal <span class="text-red-500">*</span>
                                </label>
                                <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl
                                        px-4 py-3 shadow-sm
                                        focus:ring-emerald-400 focus:border-emerald-400" required>
                                @error('tanggal') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Waktu --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    Waktu <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="waktu" value="{{ old('waktu') }}" placeholder="08.00 - Selesai" class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl
                                        px-4 py-3 shadow-sm placeholder:text-gray-400
                                        focus:ring-emerald-400 focus:border-emerald-400" required>
                                @error('waktu') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <h3 class="text-lg font-semibold text-emerald-600 mb-4 border-b pb-2">
                            Deskripsi Kegiatan
                        </h3>

                        <textarea name="deskripsi" rows="5" placeholder="Tuliskan deskripsi kegiatan" class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl
                                px-4 py-3 shadow-sm placeholder:text-gray-400
                                focus:ring-emerald-400 focus:border-emerald-400" required>{{ old('deskripsi') }}</textarea>

                        @error('deskripsi') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Thumbnail --}}
                    <div>
                        <h3 class="text-lg font-semibold text-emerald-600 mb-4 border-b pb-2">
                            Thumbnail Agenda
                        </h3>

                        <input type="file" name="gambar" accept=".jpg,.jpeg,.png" class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl
                                px-4 py-3 shadow-sm
                                focus:ring-emerald-400 focus:border-emerald-400">

                        <p class="text-xs text-gray-500 mt-1">
                            Format: .jpg, .jpeg, .png (maks. 2MB)
                        </p>

                        @error('gambar') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="flex justify-end space-x-4 border-t pt-6">
                        <button type="reset"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md shadow hover:bg-gray-300 transition">
                            Batal
                        </button>

                        <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-md shadow
                                hover:bg-emerald-700 flex items-center transition">
                            <i class="ph ph-floppy-disk mr-2 text-xl"></i>
                            Simpan Agenda
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
@endsection