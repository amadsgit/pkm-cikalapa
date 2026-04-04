@extends('layouts.dashboard')
@section('title', 'Informasi Publik')

@section('content')

<div x-data="{ activeTab: 'edit-informasi' }">

    <!-- Tab: Edit Informasi -->
    <div x-show="activeTab === 'edit-informasi'" x-transition>
        <h2 class="text-xl font-semibold bg-white text-gray-700 mb-6 flex items-center gap-2">
            <i class="ph ph-pencil-simple text-emerald-500"></i>
            Edit Informasi Publik
        </h2>

        <form action="{{ route('informasiPublik.update', $informasi->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-10">
            @csrf
            @method('PUT')

            {{-- Informasi Utama --}}
            <div>
                <h3 class="text-lg font-semibold text-emerald-600 mb-4 border-b pb-2">
                    Informasi Utama
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Judul --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">
                            Judul Informasi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="judul" value="{{ old('judul', $informasi->judul) }}" class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl
                            px-4 py-3 shadow-sm
                            focus:ring-emerald-400 focus:border-emerald-400" required>

                        @error('judul')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
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
                            <option value="{{ $k->id }}" {{ old('kategori_id', $informasi->kategori_id) == $k->id ?
                                'selected' : '' }}>
                                {{ $k->nama }}
                            </option>
                            @endforeach
                        </select>

                        @error('kategori_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            {{-- Deskripsi --}}
            <div>
                <h3 class="text-lg font-semibold text-emerald-600 mb-4 border-b pb-2">
                    Deskripsi Informasi
                </h3>

                <textarea name="deskripsi" rows="5" class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl
                    px-4 py-3 shadow-sm
                    focus:ring-emerald-400 focus:border-emerald-400"
                    required>{{ old('deskripsi', $informasi->deskripsi) }}</textarea>

                @error('deskripsi')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Thumbnail --}}
            <div>
                <h3 class="text-lg font-semibold text-emerald-600 mb-4 border-b pb-2">
                    Thumbnail Informasi
                </h3>

                {{-- Preview Gambar Lama --}}
                @if($informasi->gambar)
                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-2">Gambar Saat Ini:</p>
                    <img src="{{ asset('storage/' . $informasi->gambar) }}" class="w-40 rounded-lg shadow">
                </div>
                @endif

                <input type="file" name="gambar" accept=".jpg,.jpeg,.png" class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl
                    px-4 py-3 shadow-sm
                    focus:ring-emerald-400 focus:border-emerald-400">

                <p class="text-xs text-gray-500 mt-1">
                    Format: JPG, JPEG, PNG (maks. 2MB). Kosongkan jika tidak ingin mengubah gambar.
                </p>

                @error('gambar')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end space-x-4 border-t pt-6">
                <a href="{{ route('informasiPublik.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md shadow hover:bg-gray-300 transition">
                    Kembali
                </a>

                <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-md shadow
                    hover:bg-emerald-700 flex items-center transition">
                    <i class="ph ph-floppy-disk mr-2 text-xl"></i>
                    Update Informasi
                </button>
            </div>

        </form>
    </div>
</div>

@endsection