{{-- Elemento di paginazione --}}

@if ($paginator->hasPages())
<nav aria-label="Navigazione pagine">
    <ul class="pagination justify-content-center mb-0">

        {{-- Precedenti --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">&laquo;</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link text-success" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
            </li>
        @endif

        {{-- Numeri pagina --}}
        @foreach ($elements as $element)

            {{-- se c'è solo un elemento --}}
            @if (is_string($element))
                <li class="page-item disabled">
                    <span class="page-link">{{ $element }}</span>
                </li>
            @endif

            {{-- se c'è un array --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page">
                            <span class="page-link bg-success border-success">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link text-success" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Successivo --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link text-success" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">&raquo;</span>
            </li>
        @endif

    </ul>
</nav>
@endif
