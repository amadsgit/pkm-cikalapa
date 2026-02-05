@extends('layouts.dashboard')
@section('title', 'Edit Data Kepegawaian')

@section('content')
<div class="max-w-6xl mx-auto bg-white p-8 rounded-xl shadow-lg">
    <h2 class="text-2xl font-bold text-sky-700 mb-8 flex items-center">
        <i class="ph ph-user-plus mr-3 text-2xl"></i>
        Edit Data Pegawai
    </h2>

    <form action="{{ route('admin.ketatausahaan.pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data" class="space-y-10">
        @csrf
        @method('PUT')

        {{-- Identitas Pegawai --}}
        <div>
            <h3 class="text-lg font-semibold text-emerald-600 mb-4 border-b pb-2">Identitas Pegawai</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Foto --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Foto Pegawai</label>
                    <input type="file" name="foto" accept=".jpg,.jpeg,.png"
                        class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm focus:ring-emerald-400 focus:border-emerald-400">
                    @if($pegawai->foto)
                    <p class="text-sm mt-2">Foto saat ini:
                        <img src="{{ asset('storage/'.$pegawai->foto) }}" alt="Foto Pegawai" class="h-20 mt-2 rounded">
                    </p>
                    @endif
                    <p class="text-xs text-gray-500 mt-1">Format: .jpg, .jpeg, .png (max 2MB)</p>
                    @error('foto') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Nama --}}
                <div>
                    <label for="nama_pegawai" class="block text-sm font-medium text-gray-700">Nama Pegawai <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="nama_pegawai" id="nama_pegawai" value="{{ $pegawai->nama_pegawai }}""
                        class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm placeholder:text-gray-400 focus:ring-emerald-400 focus:border-emerald-400"
                        placeholder="Masukan nama pegawai" required>
                    @error('nama_pegawai') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- NIP --}}
                <div>
                    <label for="nip" class="block text-sm font-medium text-gray-700">NIP <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="nip" id="nip" value="{{ $pegawai->nip }}"
                        class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm placeholder:text-gray-400 focus:ring-emerald-400 focus:border-emerald-400"
                        placeholder="Masukan NIP pegawai" required>
                    @error('nip') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Tempat & Tanggal Lahir --}}
                <div>
                    <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ $pegawai->tempat_lahir }}""
                        class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm placeholder:text-gray-400 focus:ring-emerald-400 focus:border-emerald-400"
                        placeholder="Masukan tempat lahir" required>
                    @error('tempat_lahir') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir <span
                            class="text-red-500">*</span></label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $pegawai->tanggal_lahir }}"
                        class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm focus:ring-emerald-400 focus:border-emerald-400"
                        required>
                    @error('tanggal_lahir') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Jenis Kelamin --}}
                <div>
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin <span
                            class="text-red-500">*</span></label>
                    <select name="jenis_kelamin" id="jenis_kelamin"
                        class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm focus:ring-emerald-400 focus:border-emerald-400"
                        required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki" {{ $pegawai->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $pegawai->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </select>
                    @error('jenis_kelamin') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        {{-- Jabatan & Pangkat --}}
        <div>
            <h3 class="text-lg font-semibold text-emerald-600 mb-4 border-b pb-2">Jabatan & Pangkat</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
                {{-- Jabatan --}}
                <div>
                    <label for="jabatan" class="block text-sm font-medium text-gray-700">
                        Jabatan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="jabatan" id="jabatan" value="{{ $pegawai->jabatan }}"
                        class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm placeholder:text-gray-400 focus:ring-emerald-400 focus:border-emerald-400"
                        placeholder="Masukan jabatan" required>
                    @error('jabatan') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
        
                {{-- TMT SK Jabatan --}}
                <div>
                    <label for="tmt_sk_jabatan" class="block text-sm font-medium text-gray-700">
                        TMT SK Jabatan
                    </label>
                    <input type="date" name="tmt_sk_jabatan" id="tmt_sk_jabatan" value="{{ $pegawai->tmt_sk_jabatan }}" class="mt-2 block w-full text-lg border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm focus:ring-emerald-400 focus:border-emerald-400">
                    @error('tmt_sk_jabatan') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
        
                {{-- Upload SK Jabatan --}}
                <div class="col-md-6 mb-3">
                    <label for="sk_jabatan" class="block text-sm font-medium text-gray-700">
                        Upload SK Jabatan
                    </label>
                
                    <div class="flex items-center gap-3">
                        <input type="file" name="sk_jabatan" id="sk_jabatan"
                            class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm focus:ring-emerald-400 focus:border-emerald-400"
                            accept=".pdf">
                
                        @if ($pegawai->sk_jabatan)
                        <a href="{{ route('pegawai.file-preview', ['type' => 'sk_jabatan', 'filename' => basename($pegawai->sk_jabatan)]) }}"
                            target="_blank"
                            class="inline-flex items-center justify-center px-3 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition"
                            title="Lihat SK Jabatan">
                            <i class="ph ph-eye text-lg"></i>
                        </a>
                        @endif
                    </div>
                
                    <span class="text-sm text-orange-500">format .pdf max.2Mb</span>
                    @error('sk_jabatan') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
        
                {{-- Pangkat --}}
                <div>
                    <label for="pangkat" class="block text-sm font-medium text-gray-700">
                        Pangkat <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="pangkat" id="pangkat" value="{{ $pegawai->pangkat }}" placeholder="Masukan pangkat"
                        class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm placeholder:text-gray-400 focus:ring-emerald-400 focus:border-emerald-400">
                    @error('pangkat') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
        
                {{-- Golongan --}}
                <div>
                    <label for="golongan" class="block text-sm font-medium text-gray-700">
                        Golongan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="golongan" id="golongan" value="{{ $pegawai->golongan }}"
                        placeholder="Masukan golongan"
                        class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm placeholder:text-gray-400 focus:ring-emerald-400 focus:border-emerald-400">
                    @error('golongan') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
        
                {{-- TMT SK Pangkat/Golongan --}}
                <div>
                    <label for="tmt_sk_pangkat_golongan" class="block text-sm font-medium text-gray-700">
                        TMT Pangkat/Golongan
                    </label>
                    <input type="date" name="tmt_sk_pangkat_golongan" id="tmt_sk_pangkat_golongan"
                        value="{{ $pegawai->tmt_sk_pangkat_golongan }}"
                        class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm focus:ring-emerald-400 focus:border-emerald-400">
                    @error('tmt_sk_pangkat_golongan') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
        
                {{-- Upload SK Pangkat/Golongan --}}
                <div class="col-md-6 mb-3">
                    <label for="sk_pangkat_golongan" class="block text-sm font-medium text-gray-700">
                        Upload SK Pangkat/Golongan
                    </label>
                
                    <div class="flex items-center gap-3">
                        <input type="file" name="sk_pangkat_golongan" id="sk_pangkat_golongan"
                            class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm focus:ring-emerald-400 focus:border-emerald-400"
                            accept=".pdf">
                
                        @if ($pegawai->sk_pangkat_golongan)
                        <a href="{{ route('pegawai.file-preview', ['type' => 'sk_pangkat_golongan', 'filename' => basename($pegawai->sk_pangkat_golongan)]) }}"
                            target="_blank"
                            class="inline-flex items-center justify-center px-3 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition"
                            title="Lihat SK Pangkat/Gol">
                            <i class="ph ph-eye text-lg"></i>
                        </a>
                        @endif
                    </div>
                
                    <span class="text-sm text-orange-500">format .pdf max.2Mb</span>
                    @error('sk_pangkat_golongan') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
        
            </div>
        </div>


        {{-- Status & STR/SIP --}}
        <div>
            <h3 class="text-lg font-semibold text-emerald-600 mb-4 border-b pb-2">Status Kepegawaian & STR/SIP</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
                {{-- Status Kepegawaian --}}
                <div>
                    <label for="status_kepegawaian" class="block text-sm font-medium text-gray-700">
                        Status Kepegawaian <span class="text-red-500">*</span>
                    </label>
                    <select name="status_kepegawaian" id="status_kepegawaian"
                        class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm focus:ring-emerald-400 focus:border-emerald-400"
                        required>
                        <option value="">-- Pilih --</option>
                        <option value="PNS" {{ $pegawai->status_kepegawaian=='PNS' ? 'selected' : '' }}>PNS</option>
                        <option value="PPPK" {{ $pegawai->status_kepegawaian=='PPPK' ? 'selected' : '' }}>PPPK</option>
                        <option value="BLUD" {{ $pegawai->status_kepegawaian=='BLUD' ? 'selected' : '' }}>BLUD</option>
                        <option value="Honorer" {{ $pegawai->status_kepegawaian=='Honorer' ? 'selected' : '' }}>Honorer</option>
                        <option value="Outsourcing" {{ $pegawai->status_kepegawaian=='Outsourcing' ? 'selected' : '' }}>Outsourcing
                        </option>
                        <option value="Sukwan" {{ $pegawai->status_kepegawaian=='Sukwan' ? 'selected' : '' }}>Sukwan</option>
                        <option value="Lainnya" {{ $pegawai->status_kepegawaian=='Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('status_kepegawaian') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Tanggal Mulai Kerja --}}
                <div>
                    <label for="tgl_mulai_kerja" class="block text-sm font-medium text-gray-700">
                        Tgl Mulai Kerja <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="tgl_mulai_kerja" id="tgl_mulai_kerja" value="{{ $pegawai->tgl_mulai_kerja }}" class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm focus:ring-emerald-400 focus:border-emerald-400" required>
                    @error('tgl_mulai_kerja') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Masa Berlaku STR --}}
                <div>
                    <label for="tgl_akhir_str" class="block text-sm font-medium text-gray-700">
                        Masa Berlaku STR s.d
                    </label>
                    <input type="date" name="tgl_akhir_str" id="tgl_akhir_str" value="{{ $pegawai->tgl_akhir_str }}"
                        class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm focus:ring-emerald-400 focus:border-emerald-400">
                    @error('tgl_akhir_str') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
        
                {{-- Upload STR --}}
                <div class="col-md-6 mb-3">
                    <label for="str" class="block text-sm font-medium text-gray-700">
                        Upload STR
                    </label>
                
                    <div class="flex items-center gap-3">
                        <input type="file" name="str" id="str"
                            class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm focus:ring-emerald-400 focus:border-emerald-400"
                            accept=".pdf">
                
                        @if ($pegawai->str)
                        <a href="{{ route('pegawai.file-preview', ['type' => 'str', 'filename' => basename($pegawai->str)]) }}"
                            target="_blank"
                            class="inline-flex items-center justify-center px-3 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition"
                            title="Lihat STR">
                            <i class="ph ph-eye text-lg"></i>
                        </a>
                        @endif
                    </div>
                
                    <span class="text-sm text-orange-500">format .pdf max.2Mb</span>
                    @error('str') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
        
                {{-- Masa Berlaku SIP --}}
                <div>
                    <label for="tgl_akhir_sip" class="block text-sm font-medium text-gray-700">
                        Masa Berlaku SIP s.d
                    </label>
                    <input type="date" name="tgl_akhir_sip" id="tgl_akhir_sip" value="{{ $pegawai->tgl_akhir_sip }}"
                        class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm focus:ring-emerald-400 focus:border-emerald-400">
                    @error('tgl_akhir_sip') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Upload SIP --}}
                <div class="col-md-6 mb-3">
                    <label for="sip" class="block text-sm font-medium text-gray-700">
                        Upload SIP
                    </label>
                
                    <div class="flex items-center gap-3">
                        <input type="file" name="sip" id="sip"
                            class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm focus:ring-emerald-400 focus:border-emerald-400"
                            accept=".pdf">
                
                        @if ($pegawai->sip)
                        <a href="{{ route('pegawai.file-preview', ['type' => 'sip', 'filename' => basename($pegawai->sip)]) }}"
                            target="_blank"
                            class="inline-flex items-center justify-center px-3 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition"
                            title="Lihat SIP">
                            <i class="ph ph-eye text-lg"></i>
                        </a>
                        @endif
                    </div>
                
                    <span class="text-sm text-orange-500">format .pdf max.2Mb</span>
                    @error('sip') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
        
        
            </div>
        </div>


        {{-- Pendidikan --}}
        <div>
            <h3 class="text-lg font-semibold text-emerald-600 mb-4 border-b pb-2">Pendidikan</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
                {{-- Pendidikan Terakhir --}}
                <div>
                    <label for="pendidikan_terakhir" class="block text-sm font-medium text-gray-700">
                        Pendidikan Terakhir <span class="text-red-500">*</span>
                    </label>
                    <select name="pendidikan_terakhir" id="pendidikan_terakhir"
                        class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm focus:ring-emerald-400 focus:border-emerald-400"
                        required>
                        <option value="">-- Pilih --</option>
                        <option value="SD" {{ $pegawai->pendidikan_terakhir=='SD' ? 'selected' : '' }}>SD</option>
                        <option value="SMP" {{ $pegawai->pendidikan_terakhir=='SMP' ? 'selected' : '' }}>SMP</option>
                        <option value="MTS" {{ $pegawai->pendidikan_terakhir=='MTS' ? 'selected' : '' }}>MTS</option>
                        <option value="SMA" {{ $pegawai->pendidikan_terakhir=='SMA' ? 'selected' : '' }}>SMA</option>
                        <option value="SMK" {{ $pegawai->pendidikan_terakhir=='SMK' ? 'selected' : '' }}>SMK</option>
                        <option value="MA" {{ $pegawai->pendidikan_terakhir=='MA' ? 'selected' : '' }}>MA</option>
                        <option value="D-III" {{ $pegawai->pendidikan_terakhir=='D-III' ? 'selected' : '' }}>D-III</option>
                        <option value="D-IV" {{ $pegawai->pendidikan_terakhir=='D-IV' ? 'selected' : '' }}>D-IV</option>
                        <option value="S1" {{ $pegawai->pendidikan_terakhir=='S1' ? 'selected' : '' }}>S1</option>
                        <option value="S2" {{ $pegawai->pendidikan_terakhir=='S2' ? 'selected' : '' }}>S2</option>
                        <option value="S3" {{ $pegawai->pendidikan_terakhir=='S3' ? 'selected' : '' }}>S3</option>
                    </select>
                    @error('pendidikan_terakhir') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
        
                {{-- Jurusan --}}
                <div>
                    <label for="jurusan" class="block text-sm font-medium text-gray-700">
                        Jurusan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="jurusan" id="jurusan" value="{{ $pegawai->jurusan }}" placeholder="Masukan jurusan"
                        class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm placeholder:text-gray-400 focus:ring-emerald-400 focus:border-emerald-400"
                        required>
                    @error('jurusan') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
        
            </div>
        </div>

        {{-- Kontak --}}
        <div>
            <h3 class="text-lg font-semibold text-emerald-600 mb-4 border-b pb-2">Kontak</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="hp" class="block text-sm font-medium text-gray-700">No HP</label>
                    <input type="text" name="hp" id="hp" value="{{ $pegawai->hp }}"
                        class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm placeholder:text-gray-400 focus:ring-emerald-400 focus:border-emerald-400"
                        placeholder="Masukan nomor HP">
                    @error('hp') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3"
                        class="mt-2 block w-full text-lg border border-blue-300 bg-gray-100 rounded-xl px-4 py-3 shadow-sm placeholder:text-gray-400 focus:ring-emerald-400 focus:border-emerald-400"
                        placeholder="Masukan alamat">{{ $pegawai->alamat }}</textarea>
                    @error('alamat') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end space-x-4 border-t pt-6">
            <a href="{{ route('admin.ketatausahaan.pegawai') }}"
                class="px-3 py-2 bg-gray-200 text-gray-700 text-xl rounded-md shadow hover:bg-gray-300 transition">
                Batal
            </a>
            <button type="submit"
                class="px-3 py-2 bg-blue-600 text-white text-md rounded-md shadow hover:bg-blue-700 flex items-center transition">
                <i class="ph ph-arrow-clockwise text-xl"></i> Update
            </button>
        </div>
    </form>
</div>
@endsection