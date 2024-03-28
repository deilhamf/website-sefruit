@if ($paginator->hasPages())
{{-- <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav> --}}
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        {{-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <a class="rounded" aria-hidden="true"><i class="far fa-arrow-left"></i></a>
        </li> --}}
        @else
        {{-- <li>
            <a class="rounded" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                aria-label="@lang('pagination.previous')"><i class="far fa-arrow-left"></i></a>
        </li> --}}
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="page-item disabled" aria-disabled="true"><a>{{ $element }}</a></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item active" aria-current="page"><a class="active page-link">{{ $page }}</a></li>
        @else
        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        {{-- <li>
            <a class="rounded" href="{{ $paginator->nextPageUrl() }}" rel="next"
                aria-label="@lang('pagination.next')"><i class="far fa-arrow-right"></i></a>
        </li> --}}
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')"
                rel="next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        @else
        {{-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <a class="rounded" aria-hidden="true"><i class="far fa-arrow-right"></i></a>
        </li> --}}
        @endif
    </ul>
</nav>
@endif