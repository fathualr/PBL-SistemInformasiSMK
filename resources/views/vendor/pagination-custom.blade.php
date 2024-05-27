@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-end">
        <ul class="pagination flex items-center list-none space-x-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="px-4 py-2 text-gray-400 bg-gray-200 cursor-default rounded shadow">&laquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="px-4 py-2 text-gray-600 bg-white border border-gray-300 rounded shadow hover:bg-gray-100">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span class="px-4 py-2 text-gray-600 bg-gray-200 rounded shadow">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @php
                        $start = $paginator->currentPage() > 3 ? $paginator->currentPage() - 2 : 1;
                        $end = $paginator->currentPage() > 3 ? $paginator->currentPage() + 2 : 5;
                        if ($end > $paginator->lastPage()) {
                            $end = $paginator->lastPage();
                            $start = $end - 4 > 1 ? $end - 4 : 1;
                        }
                    @endphp
                    @foreach (range($start, $end) as $page)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span class="px-4 py-2 bg-gray-500 text-white rounded shadow">{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $paginator->url($page) }}" class="px-4 py-2 text-gray-600 bg-white border border-gray-300 rounded shadow hover:bg-gray-100">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="px-4 py-2 text-gray-600 bg-white border border-gray-300 rounded shadow hover:bg-gray-100">&raquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="px-4 py-2 text-gray-400 bg-gray-200 cursor-default rounded shadow">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
