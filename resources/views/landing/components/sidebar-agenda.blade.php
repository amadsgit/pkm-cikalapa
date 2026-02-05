<div class="space-y-6">

    <!-- Agenda Terkait -->
    <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100 sticky top-4">
        <h3 class="font-semibold text-gray-900 mb-6 flex items-center gap-2 border-b border-gray-100 pb-3">
            <i class="fas fa-calendar-alt text-emerald-500"></i>
            Agenda Terkait
        </h3>

        <div class="space-y-5">
            <div class="space-y-5"> 
                @php // Ambil 5 berita terbaru kecuali berita saat ini
                    $related = \App\Models\Kegiatan::where('id', '!=', $kegiatan->id) ->latest() ->take(5) ->get(); 
                @endphp

            @forelse ($related as $item)
            <a href="{{ route('agenda.show', $item->id) }}" class="flex gap-3 group">
                <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden">
                    <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : asset('storage/uploads/berita/default-announcement.jpg') }}"
                        alt="{{ $item->judul }}"
                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                </div>
                <div class="min-w-0">
                    <h4 class="text-sm font-medium line-clamp-2 group-hover:text-emerald-600 transition-colors">
                        {{ $item->judul }}
                    </h4>
                    <div class="flex items-center mt-1 text-xs text-gray-500 space-x-2">
                        <span class="flex items-center gap-1">
                            <i class="far fa-calendar text-[9px]"></i>
                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
                        </span>
                        @if($item->waktu)
                        <span class="flex items-center gap-1">
                            <i class="far fa-clock text-[9px]"></i>
                            {{ $item->waktu }}
                        </span>
                        @endif
                    </div>
                    @if($item->lokasi)
                    <div class="flex items-center text-xs text-gray-500 mt-1">
                        <i class="fas fa-map-marker-alt text-[9px] mr-1"></i>
                        <span class="line-clamp-1">{{ $item->lokasi }}</span>
                    </div>
                    @endif
                </div>
            </a>
            @empty
            <p class="text-sm text-gray-500">Belum ada agenda terkait.</p>
            @endforelse
        </div>
    </div>

    <!-- Kategori -->
    <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
        <h3 class="font-semibold text-gray-900 mb-6 flex items-center gap-2 border-b border-gray-100 pb-3">
            <i class="fas fa-folder text-emerald-500"></i>
            Kategori
        </h3>

        <div class="flex flex-wrap gap-2">
            @php
            // Ambil semua kategori dari tabel
            $categories = \App\Models\KategoriKegiatan::all();
        
            // Daftar warna Tailwind untuk variasi
            $colorSets = [
            ['bg-indigo-50 text-indigo-600 hover:bg-indigo-100'],
            ['bg-amber-50 text-amber-600 hover:bg-amber-100'],
            ['bg-rose-50 text-rose-600 hover:bg-rose-100'],
            ['bg-sky-50 text-sky-600 hover:bg-sky-100'],
            ['bg-emerald-50 text-emerald-600 hover:bg-emerald-100'],
            ['bg-fuchsia-50 text-fuchsia-600 hover:bg-fuchsia-100'],
            ['bg-lime-50 text-lime-600 hover:bg-lime-100'],
            ['bg-violet-50 text-violet-600 hover:bg-violet-100'],
            ['bg-orange-50 text-orange-600 hover:bg-orange-100'],
            ];
            @endphp
        
            @foreach ($categories as $index => $cat)
            @php
            // Pilih warna berdasarkan index kategori
            $colorClass = $colorSets[$index % count($colorSets)][0];
            @endphp
        
            <a href="{{ route('agenda', ['kategori' => $cat->slug]) }}"
                class="px-3 py-1.5 text-xs rounded-md transition-all duration-300 hover:-translate-y-0.5 inline-flex items-center gap-1.5 {{ $colorClass }}">
                <i class="{{ $cat->ikon ?? 'fas fa-folder' }} text-[10px]"></i>
                {{ $cat->nama }}
            </a>
            @endforeach
        </div>
    </div>

</div>