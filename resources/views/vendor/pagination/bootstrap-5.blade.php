@if ($paginator->hasPages())
    <div class="row">
        <ul class="pagination pagination-lg justify-content-end">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0">@lang('pagination.previous')</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link rounded-0 shadow-sm border-top-0 border-left-0">@lang('pagination.next')</span>
                </li>
            @endif
        </ul>
    </div>
@endif
