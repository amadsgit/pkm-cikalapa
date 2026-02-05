<div x-show="activeTab === 'visi-misi'" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
    <div class="bg-white">
        <!-- Vision Section -->
        <div class="mb-8">
            <!-- Title Header (Matched with UMKM/Tentang Desa Style) -->
            <div class="flex items-center justify-between mb-5">
                <div class="flex items-center">
                    <div class="h-6 w-1 bg-emerald-500 rounded-full mr-2"></div>
                    <span
                        class="bg-emerald-50 px-2.5 py-1 rounded-full text-emerald-800 text-sm font-semibold flex items-center">
                        <i class="fas fa-eye text-emerald-600 mr-1.5"></i>
                        VISI PUSKESMAS
                    </span>
                </div>
            </div>

            <!-- Vision Content with bg-gray-50 -->
            <div class="bg-gray-50 shadow-sm rounded-lg overflow-hidden border border-gray-100">
                <div class="p-6">
                    <div class="prose prose-emerald max-w-none text-gray-600">
                        <p>{{ $profile->visi->content ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mission Section -->
        <div class="mb-8">
            <!-- Title Header (Matched with UMKM/Tentang Desa Style) -->
            <div class="flex items-center justify-between mb-5">
                <div class="flex items-center">
                    <div class="h-6 w-1 bg-emerald-500 rounded-full mr-2"></div>
                    <span
                        class="bg-emerald-50 px-2.5 py-1 rounded-full text-emerald-800 text-sm font-semibold flex items-center">
                        <i class="fas fa-bullseye text-emerald-600 mr-1.5"></i>
                        MISI PUSKESMAS
                    </span>
                </div>
            </div>

            <!-- Mission Content with bg-gray-50 -->
            <div class="bg-gray-50 shadow-sm rounded-lg overflow-hidden border border-gray-100">
                <div class="p-6">
                    <div class="prose prose-emerald max-w-none text-gray-600">
                        <ol>
                            @foreach ($profile->misi as $item)
                            <li>{{ $item->content ?? '-'}}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>