@extends('layouts.dashboard')

@section('title', 'Data Role')

@section('content')
<div x-data="{ openCreate: false, openEdit: null, openDelete: null }" class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
    {{-- Header --}}
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-bold text-gray-700">
            <i class="ph ph-users text-lg"></i> Data Role
        </h2>

        <div class="flex items-center space-x-3">
            {{-- Tombol Tambah Role --}}
            <button @click="openCreate = true"
                class="inline-flex items-center px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-1 transition">
                <i class="ph ph-plus mr-2 text-lg"></i>
                Tambah Role
            </button>
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-white shadow-md rounded-2xl overflow-hidden">
        @if ($roles->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-blue-600 text-white text-xs uppercase">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Deskripsi</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($roles as $index => $role)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-center font-medium">
                            {{ $roles->firstItem() + $index }}
                        </td>
                        <td class="px-4 py-3">{{ $role->name }}</td>
                        <td class="px-4 py-3">{{ $role->description ?? '-' }}</td>
                        <td class="px-4 py-3 text-center space-x-2 flex">
                            {{-- Tombol Edit --}}
                            <button @click="openEdit = {{ $role->id }}"
                                class="inline-flex items-center px-2 py-1 text-xs bg-sky-400 text-white rounded-lg hover:bg-sky-500 transition"
                                title="Edit data">
                                <i class="ph ph-pencil-simple text-lg"></i>
                            </button>

                            {{-- Tombol Hapus Role --}}
                            <button @click="openDelete = {{ $role->id }}"
                                class="inline-flex items-center px-2 py-1 text-xs bg-red-500 text-white rounded-lg hover:bg-red-600 transition"
                                title="Hapus data">
                                <i class="ph ph-trash text-lg"></i>
                            </button>
                            
                            {{-- Modal Konfirmasi Hapus Role --}}
                            <div x-show="openDelete === {{ $role->id }}" style="display: none"
                                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                                <div @click.away="openDelete = null" class="bg-white rounded-2xl shadow-lg w-full max-w-md p-6">
                                    <h2 class="text-xl font-bold mb-4">Konfirmasi Hapus</h2>
                                    <p class="mb-6 text-gray-600">Apakah Anda yakin ingin menghapus data ini?
                                    </p>
                                    <div class="flex justify-end gap-3">
                                        <button @click="openDelete = null"
                                            class="px-4 border py-2 bg-white rounded-lg hover:bg-gray-200">Batal</button>
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    {{-- Modal Edit Role --}}
                    <div x-show="openEdit === {{ $role->id }}" style="display: none"
                        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                        <div @click.away="openEdit = null" class="bg-white rounded-2xl shadow-lg w-full max-w-md p-6">
                            <h2 class="text-xl font-bold mb-4">Edit Role</h2>
                            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Nama Role</label>
                                    <input type="text" name="name" value="{{ $role->name }}"
                                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                    @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                    <textarea name="description" rows="3"
                                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">{{ $role->description }}</textarea>
                                    @error('description') <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex justify-end gap-2">
                                    <button type="button" @click="openEdit = null"
                                        class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</button>
                                    <button type="submit"
                                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="p-6 text-center text-gray-500">
            <i class="ph ph-exclamation-circle text-2xl mb-2"></i>
            <p>Tidak ada data role ditemukan.</p>
        </div>
        @endif
    </div>
    {{-- Pagination --}}
    <div class="p-4">
        {{ $roles->links('pagination::tailwind') }}
    </div>

    {{-- Modal Tambah Role --}}
    <div x-show="openCreate" style="display: none"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div @click.away="openCreate = false" class="bg-white rounded-2xl shadow-lg w-full max-w-md p-6">
            <h2 class="text-xl font-bold mb-4"><i class="ph ph-plus mr-2 text-lg"></i> Tambah Role</h2>
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nama Role</label>
                    <input type="text" name="name"
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        required>
                    @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="description" rows="3"
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
                    @error('description') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" @click="openCreate = false"
                        class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection