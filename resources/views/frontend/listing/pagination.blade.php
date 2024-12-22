
@if ($paginator->hasPages())
    <nav aria-label="{{ __('Pagination Navigation') }}">
        <ul class="flex-wr-s-c m-rl--7 p-t-15">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())

            @else
                <li class="">
                    <a class="flex-c-c pagi-item  trans-03 m-all-7" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ __('pagination.previous') }}">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7">{{ $element }}</span></li>
                @endif

                {{-- Array of links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                            <li class=""><a class="{{$page == $paginator->currentPage() ? 'flex-c-c pagi-item hov-btn1 trans-03 m-all-7 pagi-active' : 'flex-c-c pagi-item hov-btn1 trans-03 m-all-7' }}" href="{{ $url }}">{{ $page }}</a></li>
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="flex-c-c pagi-item trans-03 m-all-7" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="{{ __('pagination.next') }}">&raquo;</a>
                </li>
            @else

            @endif
        </ul>
    </nav>
@endif

