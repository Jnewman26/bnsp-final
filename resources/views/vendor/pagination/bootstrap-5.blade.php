@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-end"> <!-- Menambahkan posisi tengah -->
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link bg-secondary text-white"><</span></li>
            @else
                <li class="page-item">
                    <a class="page-link bg-primary text-white" href="{{ $paginator->previousPageUrl() }}" rel="prev"><</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link bg-light text-dark">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><span class="page-link bg-success text-white">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link bg-primary text-white" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link bg-primary text-white" href="{{ $paginator->nextPageUrl() }}" rel="next">></a>
                </li>
            @else
                <li class="page-item disabled"><span class="page-link bg-secondary text-white">></span></li>
            @endif
        </ul>
    </nav>
@endif