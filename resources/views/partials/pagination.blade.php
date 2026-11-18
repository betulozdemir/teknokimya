@if ($paginator->hasPages())
    <nav>
        <ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                {{-- omit or disabled --}}
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&larr;</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="current">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&rarr;</a></li>
            @endif
        </ul>
    </nav>
@endif

