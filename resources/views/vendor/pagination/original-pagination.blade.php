@if ($paginator->hasPages())
    <ul class="c-pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="c-pagination__item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true" class="c-pagination__link">&lt;</span>
            </li>
        @else
            <li class="c-pagination__item">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="c-pagination__link">&lt;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="c-pagination__item disabled" aria-disabled="true"><span class="c-pagination__link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="c-pagination__item active" aria-current="page"><span class="c-pagination__link">{{ $page }}</span></li>
                    @else
                        <li class="c-pagination__item"><a href="{{ $url }}" class="c-pagination__link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="c-pagination__item">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="c-pagination__link">&gt;</a>
            </li>
        @else
            <li class="c-pagination__item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true" class="c-pagination__link">&gt;</span>
            </li>
        @endif
    </ul>
@endif