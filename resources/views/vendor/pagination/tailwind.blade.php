@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-end mt-3">
        <div class="flex items-center space-x-2">
            {{-- Tombol Previous --}}
            @if ($paginator->onFirstPage())
                <span class="px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                    ← Sebelumnya
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition">
                    ← Sebelumnya
                </a>
            @endif

            {{-- Numbered Links --}}
            <div class="flex items-center space-x-1">
                @foreach ($elements as $element)
                    {{-- Separator --}}
                    @if (is_string($element))
                        <span class="px-3 py-2 text-sm text-gray-500">{{ $element }}</span>
                    @endif

                    {{-- Array of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span
                                    class="px-4 py-2 text-sm font-bold text-white bg-blue-500 rounded-lg shadow">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                    class="px-4 py-2 text-sm text-gray-600 bg-gray-100 rounded-lg hover:bg-blue-100 hover:text-blue-600 transition">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            {{-- Tombol Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                    class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition">
                    Selanjutnya →
                </a>
            @else
                <span class="px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                    Selanjutnya →
                </span>
            @endif
        </div>
    </nav>
@endif
