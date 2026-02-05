
<div class="space-y-6">

    <!-- Berita Terkait -->
    <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100 sticky top-4">
        <h3 class="font-semibold text-gray-900 mb-6 flex items-center gap-2 border-b border-gray-100 pb-3">
            <i class="fas fa-newspaper text-emerald-500"></i>
            Berita Terkait
        </h3>

        <div class="space-y-5">
            @php
            // Ambil 5 berita terbaru kecuali berita saat ini
            $related = \App\Models\Informasi::where('id', '!=', $informasi->id)
            ->latest()
            ->take(5)
            ->get();
            @endphp

            @foreach ($related as $item)
            <a href="{{ route('informasi.show', $item->id) }}" class="flex gap-3 group">
                <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden">
                    <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : '/storage/uploads/berita/default-announcement.jpg' }}"
                        alt="{{ $item->judul }}"
                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                </div>
                <div class="min-w-0">
                    <h4 class="text-sm font-medium line-clamp-2 group-hover:text-emerald-600 transition-colors">
                        {{ $item->judul }}
                    </h4>
                    <div class="flex items-center mt-1 text-xs text-gray-500">
                        <i class="far fa-calendar text-[9px] mr-1"></i>
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                    </div>
                </div>
            </a>
            @endforeach
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
            // Ambil semua kategori dari tabel kategori_informasis
            $categories = \App\Models\KategoriInformasi::all();
    
            // Daftar warna otomatis (akan berulang sesuai jumlah kategori)
            $colorSets = [
            'bg-indigo-50 text-indigo-600 hover:bg-indigo-100',
            'bg-amber-50 text-amber-600 hover:bg-amber-100',
            'bg-rose-50 text-rose-600 hover:bg-rose-100',
            'bg-sky-50 text-sky-600 hover:bg-sky-100',
            'bg-emerald-50 text-emerald-600 hover:bg-emerald-100',
            'bg-fuchsia-50 text-fuchsia-600 hover:bg-fuchsia-100',
            'bg-lime-50 text-lime-600 hover:bg-lime-100',
            'bg-violet-50 text-violet-600 hover:bg-violet-100',
            'bg-orange-50 text-orange-600 hover:bg-orange-100',
            ];
            @endphp
    
            @foreach ($categories as $index => $cat)
            @php
            // Jika tabel punya kolom `warna`, gunakan dari DB
            // Kalau tidak ada, gunakan dari daftar warna otomatis
            $colorClass = $cat->warna ?? $colorSets[$index % count($colorSets)];
            @endphp
    
            <a href="{{ route('informasi', ['kategori' => $cat->slug]) }}"
                class="px-3 py-1.5 text-xs rounded-md transition-all duration-300 hover:-translate-y-0.5 inline-flex items-center gap-1.5 {{ $colorClass }}">
                <i class="{{ $cat->ikon ?? 'fas fa-folder' }} text-[10px]"></i>
                {{ $cat->nama }}
            </a>
            @endforeach
        </div>
    </div>

</div>