<div x-show="activeTab === 'sejarah'" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
    <div class="bg-white">
        <!-- Title Header (Matched with UMKM/Tentang Desa Style) -->
        <div class="flex items-center justify-between mb-5">
            <div class="flex items-center">
                <div class="h-6 w-1 bg-emerald-500 rounded-full mr-2"></div>
                <span
                    class="bg-emerald-50 px-2.5 py-1 rounded-full text-emerald-800 text-sm font-semibold flex items-center">
                    <i class="fas fa-history text-emerald-600 mr-1.5"></i>
                    SEJARAH PUSKESMAS
                </span>
            </div>
        </div>

        <!-- History Content with bg-gray-50 -->
        <div class="bg-gray-50 shadow-sm rounded-lg overflow-hidden border border-gray-100" data-aos="fade-up">
            <div class="p-6">
                <div class="prose prose-emerald max-w-none text-gray-600">
                    <p class="text-gray-700 leading-relaxed text-base whitespace-pre-line">
                    {{ $profile->sejarah->content ?? '-' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>