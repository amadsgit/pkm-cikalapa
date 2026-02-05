@extends('layouts.dashboard')

@section('title', 'Data User')

@section('content')
<div x-data="{ openCreate: false, openEdit: null, openDelete: null }" class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
    {{-- Header --}}
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-bold text-gray-700">
            <i class="ph ph-user-circle text-lg"></i> Data User
        </h2>

        <div class="flex items-center space-x-3">
            {{-- Tombol Tambah User --}}
            <button @click="openCreate = true"
                class="inline-flex items-center px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-1 transition">
                <i class="ph ph-plus mr-2 text-lg"></i>
                Tambah User
            </button>
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-white shadow-md rounded-2xl overflow-hidden">
        @if ($users->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-blue-600 text-white text-xs uppercase">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Nama Pegawai</th>
                        <th class="px-4 py-3">NIP</th>
                        <th class="px-4 py-3">email</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($users as $index => $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-center font-medium">
                            {{ $users->firstItem() + $index }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $user->pegawai ? $user->pegawai->nama_pegawai : '-' }}
                        </td>
                        <td class="px-4 py-3">{{ $user->nip ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $user->email ?? '-' }}</td>
                        <td class="px-4 py-3">
                            @forelse($user->roles as $role)
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-lg">
                                {{ $role->name }}
                            </span>
                            @empty
                            <span class="text-gray-400 italic">Belum ada role</span>
                            @endforelse
                        </td>
                        <td class="px-4 py-3 text-center space-x-2 flex">
                            {{-- Tombol Edit --}}
                            <button @click="openEdit = {{ $user->id }}"
                                class="inline-flex items-center px-2 py-1 text-xs bg-sky-400 text-white rounded-lg hover:bg-sky-500 transition"
                                title="Edit data">
                                <i class="ph ph-pencil-simple text-lg"></i>
                            </button>

                            {{-- Tombol Hapus --}}
                            <button @click="openDelete = {{ $user->id }}"
                                class="inline-flex items-center px-2 py-1 text-xs bg-red-500 text-white rounded-lg hover:bg-red-600 transition"
                                title="Hapus data">
                                <i class="ph ph-trash text-lg"></i>
                            </button>
                            
                            {{-- Modal Konfirmasi Hapus --}}
                            <div x-show="openDelete === {{ $user->id }}" style="display: none"
                                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                                <div @click.away="openDelete = null" class="bg-white rounded-2xl shadow-lg w-full max-w-md p-6">
                                    <h2 class="text-xl font-bold mb-4">Konfirmasi Hapus</h2>
                                    <p class="mb-6 text-gray-600">Apakah Anda yakin ingin menghapus data ini ?
                                    </p>
                                    <div class="flex justify-end gap-3">
                                        <button @click="openDelete = null" class="px-4 border py-2 bg-white rounded-lg hover:bg-gray-200">Batal</button>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    {{-- Modal Edit User --}}
                    <div x-show="openEdit === {{ $user->id }}" style="display: none"
                        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                        <div @click.away="openEdit = null" class="bg-white rounded-2xl shadow-lg w-full max-w-3xl p-8">
                            <h2 class="text-2xl font-bold mb-6"><i class="ph ph-pencil-simple mr-2 text-lg"></i> Edit User</h2>
                    
                            <form action="{{ route('users.update', $user->id) }}" method="POST" id="editUserForm{{ $user->id }}">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                                    {{-- Nama Pegawai --}}
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Nama Pegawai</label>
                                        <input type="text" value="{{ $user->pegawai ? $user->pegawai->nama_pegawai : '-' }}"
                                            class="w-full mt-1 px-3 py-2 border rounded-lg bg-gray-100" readonly>
                                    </div>
                    
                                    {{-- NIP --}}
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">NIP</label>
                                        <input type="text" value="{{ $user->nip ?? '-' }}"
                                            class="w-full mt-1 px-3 py-2 border rounded-lg bg-gray-100" readonly>
                                    </div>
                    
                                    {{-- Email --}}
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="email" name="email" value="{{ $user->email ?? '' }}"
                                            class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                            required>
                                    </div>
                    
                                    {{-- Role --}}
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Role</label>
                                        <select name="roles[]" multiple
                                            class="role-select w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                            @foreach($listRole as $role)
                                            <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                    
                                </div>
                    
                                <div class="flex justify-end gap-2 mt-6">
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
            <p>Tidak ada data user ditemukan.</p>
        </div>
        @endif
    </div>

    {{-- Pagination --}}
    <div class="p-4 flex justify-end">
        {{ $users->links('pagination::tailwind') }}
    </div>

    {{-- Modal Tambah User --}}
    <div x-show="openCreate" style="display: none"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div @click.away="openCreate = false" class="bg-white rounded-2xl shadow-lg w-full max-w-3xl p-8">
            <h2 class="text-2xl font-bold mb-6"><i class="ph ph-plus mr-2 text-lg"></i> Tambah User</h2>
    
            <form action="{{ route('users.store') }}" method="POST" id="userForm">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Pegawai --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Pilih Pegawai</label>
                        <select id="pegawaiSelect" name="pegawai_id"
                            class="pegawai-select w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="">-- Pilih Pegawai --</option>
                            @foreach($listPegawai as $pegawai)
                            <option value="{{ $pegawai->id }}" data-nip="{{ $pegawai->nip }}">
                                {{ $pegawai->nama_pegawai }}
                            </option>
                            @endforeach
                        </select>
                        <span id="pegawaiError" class="text-red-600 text-sm hidden">Pegawai wajib dipilih</span>
                    </div>
                    
                    {{-- NIP --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">NIP</label>
                        <input type="text" name="nip" id="nipInput"
                            class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-100" readonly>
                        <span id="nipError" class="text-red-600 text-sm hidden">NIP tidak boleh kosong</span>
                    </div>
                    
                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email"
                            class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                        <span id="emailError" class="text-red-600 text-sm hidden">Format email tidak valid</span>
                    </div>
                    
                    {{-- Password --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password"
                            class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                        <span id="passwordError" class="text-red-600 text-sm hidden">Password minimal 8 karakter</span>
                    </div>
                    
                    {{-- Role --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Role</label>
                        <select id="roleSelect" name="roles[]" multiple class="role-select w-full mt-1 px-3 py-2 border rounded-lg">
                            @foreach($listRole as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <span id="roleError" class="text-red-600 text-sm hidden">Role wajib dipilih</span>
                    </div>
                </div>
    
                <div class="flex justify-end gap-2 mt-6">
                    <button type="button" @click="openCreate = false"
                        class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    
    {{-- Script --}}
    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script>
        $(document).ready(function() {
        $('.pegawai-select').select2({ placeholder: "Pilih Pegawai", allowClear: true, width: '100%' });
        $('.role-select').select2({ placeholder: "Pilih Role", width: '100%' });
    
        // Auto isi NIP saat pegawai dipilih
        $('.pegawai-select').on('change', function() {
            var nip = $(this).find(':selected').data('nip') || '';
            $('#nipInput').val(nip);
        });
    
        // Validasi sisi client
        $('#userForm').on('submit', function(e) {
            let valid = true;
    
            // Pegawai
            if(!$('#pegawaiSelect').val()){
                $('#pegawaiError').removeClass('hidden');
                valid = false;
            } else { $('#pegawaiError').addClass('hidden'); }
    
            // NIP
            if(!$('#nipInput').val()){
                $('#nipError').removeClass('hidden');
                valid = false;
            } else { $('#nipError').addClass('hidden'); }
    
            // Email
            const emailVal = $('#email').val();
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if(!emailVal || !emailPattern.test(emailVal)){
                $('#emailError').removeClass('hidden');
                valid = false;
            } else { $('#emailError').addClass('hidden'); }
    
            // Password
            if($('#password').val().length < 8){
                $('#passwordError').removeClass('hidden');
                valid = false;
            } else { $('#passwordError').addClass('hidden'); }
    
            // Role
            if(!$('#roleSelect').val() || $('#roleSelect').val().length == 0){
                $('#roleError').removeClass('hidden');
                valid = false;
            } else { $('#roleError').addClass('hidden'); }
    
            if(!valid) e.preventDefault(); // cegah submit kalau tidak valid
        });
    });
    </script>
    @endpush
</div>
@endsection