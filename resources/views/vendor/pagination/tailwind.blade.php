@if ($paginator->hasPages())
    <nav role="navigation" class="flex justify-center">
        <ul class="inline-flex items-center -space-x-px rounded-md bg-white border border-gray-300 overflow-hidden">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="px-3 py-2 text-gray-400">‹</li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 text-blue-600 hover:bg-blue-100">‹</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="px-3 py-2 text-gray-400">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="px-3 py-2 bg-blue-600 text-white font-semibold">{{ $page }}</li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-3 py-2 text-blue-600 hover:bg-blue-100">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 text-blue-600 hover:bg-blue-100">›</a>
                </li>
            @else
                <li class="px-3 py-2 text-gray-400">›</li>
            @endif
        </ul>
    </nav>
@endif
