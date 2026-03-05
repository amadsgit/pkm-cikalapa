@extends('layouts.dashboard')
@section('title','Kategori Kegiatan')

@section('content')

<div class="p-6 bg-white rounded-xl shadow space-y-6">

    <!-- Header -->
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-700 flex items-center gap-2">
            <i class="ph ph-tag text-emerald-500"></i>
            Kategori Kegiatan
        </h2>

        <button onclick="openModal('modalTambah')"
            class="px-4 py-2 bg-emerald-600 text-white rounded-lg flex items-center gap-2 hover:bg-emerald-700">
            <i class="ph ph-plus"></i>
            Tambah Kategori
        </button>
    </div>

    <!-- Tabel -->
    <div class="overflow-x-auto border rounded-xl">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Slug</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach($kategori as $k)
                <tr class="border-t">

                    <td class="px-4 py-3 font-medium">
                        {{ $k->nama }}
                    </td>

                    <td class="px-4 py-3 text-gray-500">
                        {{ $k->slug }}
                    </td>

                    <td class="px-4 py-3 flex justify-center gap-2">

                        <!-- Edit -->
                        <button onclick="openModal('edit{{ $k->id }}')"
                            class="p-2 bg-emerald-50 text-emerald-600 rounded-lg hover:bg-emerald-100">
                            <i class="ph ph-pencil"></i>
                        </button>

                        <!-- Hapus -->
                        <form action="{{ route('kategoriKegiatan.destroy',$k->id) }}" method="POST"
                            onsubmit="return confirm('Hapus kategori ini?')">

                            @csrf
                            @method('DELETE')

                            <button class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100">
                                <i class="ph ph-trash"></i>
                            </button>

                        </form>

                    </td>
                </tr>


                <!-- MODAL EDIT -->
                <div id="edit{{ $k->id }}" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

                    <div class="bg-white rounded-xl p-6 w-[500px] shadow-xl">

                        <h3 class="text-lg font-semibold mb-4">
                            Edit Kategori
                        </h3>

                        <form action="{{ route('kategoriKegiatan.update',$k->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="space-y-4">

                                <input type="text" name="nama" value="{{ $k->nama }}"
                                    class="w-full border rounded-lg px-4 py-2">

                            </div>

                            <div class="flex justify-end gap-3 mt-6">

                                <button type="button" onclick="closeModal('edit{{ $k->id }}')"
                                    class="px-4 py-2 bg-gray-200 rounded-lg">
                                    Batal
                                </button>

                                <button class="px-4 py-2 bg-emerald-600 text-white rounded-lg">
                                    Simpan
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

                @endforeach

                @if($kategori->isEmpty())

                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-500">
                        Belum ada kategori
                    </td>
                </tr>

                @endif

            </tbody>
        </table>
    </div>

</div>

<!-- MODAL TAMBAH -->
<div id="modalTambah" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl p-6 w-[500px] shadow-xl">

        <h3 class="text-lg font-semibold mb-4">
            Tambah Kategori
        </h3>

        <form action="{{ route('kategoriKegiatan.store') }}" method="POST">

            @csrf

            <div class="space-y-4">

                <input type="text" name="nama" placeholder="Nama kategori" class="w-full border rounded-lg px-4 py-2">

            </div>

            <div class="flex justify-end gap-3 mt-6">

                <button type="button" onclick="closeModal('modalTambah')" class="px-4 py-2 bg-gray-200 rounded-lg">
                    Batal
                </button>

                <button class="px-4 py-2 bg-emerald-600 text-white rounded-lg">
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

<script>
    function openModal(id){
    document.getElementById(id).classList.remove('hidden')
    document.getElementById(id).classList.add('flex')
}

function closeModal(id){
    document.getElementById(id).classList.add('hidden')
}

</script>

@endsection