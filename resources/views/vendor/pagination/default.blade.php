@if ($paginator->hasPages())
{{-- <div class="th-pagination text-center pt-50">
    <ul>
        <li><a href="">1</a></li>
        <li><a href="">2</a></li>
        <li><a href="">3</a></li>
        <li><a href=""><i class="far fa-arrow-right"></i></a></li>
    </ul>
</div> --}}
<div class="th-pagination text-center pt-50">
    <ul>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        {{-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <a class="rounded" aria-hidden="true"><i class="far fa-arrow-left"></i></a>
        </li> --}}
        @else
        <li>
            <a class="rounded" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                aria-label="@lang('pagination.previous')"><i class="far fa-arrow-left"></i></a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="disabled" aria-disabled="true"><a>{{ $element }}</a></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="active" aria-current="page"><a class="active rounded">{{ $page }}</a></li>
        @else
        <li><a class="rounded" href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li>
            <a class="rounded" href="{{ $paginator->nextPageUrl() }}" rel="next"
                aria-label="@lang('pagination.next')"><i class="far fa-arrow-right"></i></a>
        </li>
        @else
        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <a class="rounded" aria-hidden="true"><i class="far fa-arrow-right"></i></a>
        </li>
        @endif
    </ul>
</div>
@endif