@extends('layouts.pages')

@section('title')
Blog
@endsection

@section('page', 'Blog')

@section('content')

<!--==============================
    Breadcumb
============================== -->
@foreach ($config as $item)
<div class="breadcumb-wrapper" data-bg-src="{{ asset('galeries/config/breadcrumb/' . $item->breadcrumb) }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">@yield('page')</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Homepage</a></li>
                <li>@yield('page')</li>
            </ul>
        </div>
    </div>
</div>
@endforeach
<!--==============================
Blog Area
==============================-->
<section class="th-blog-wrapper space-top space-extra-bottom">
    <div class="container">
        <div class="widget widget_search">
            {{-- <form class="search-form">
                <input type="text" placeholder="Cari Judul Blog">
                <button type="submit"><i class="far fa-search"></i></button>
            </form> --}}
            <form action="{{ Route('search.blog') }}" method="GET" class="search-form">
                @csrf
                <input name="query" type="search" placeholder="Cari judul Artikel ..." aria-label="Search">
                <button type="submit"><i class="far fa-search"></i></button>
            </form>
        </div>
        <div class="row">
            <div class="col-xxl-8 col-lg-7">
                @forelse ($blog as $item)
                <div class="th-blog blog-single has-post-thumbnail">
                    <div class="blog-img">
                        <a href="{{ route('detail.blog', ['slug' => $item->slug]) }}"><img
                                src="{{ asset('blogs/' . $item->image) }}" alt="Blog Image"></a>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a class="author" href="{{ url('pages/blog') }}"><i class="far fa-user"></i>{{
                                $item->author->name }}</a>
                            <a class="author" href="{{ url('pages/blog') }}"><i class="far fa-tags"></i>{{
                                $item->category->title }}</a>
                            <a href="{{ url('pages/blog') }}"><i class="far fa-calendar"></i>{{
                                $item->created_at->format('d M Y') }}</a>
                        </div>
                        <h2 class="blog-title"><a href="{{ route('detail.blog', ['slug' => $item->slug]) }}">
                                {{ $item->title }}
                            </a>
                        </h2>
                        <p class="blog-text">
                            {!! $item->overview !!}
                        </p>
                        <a href="{{ route('detail.blog', ['slug' => $item->slug]) }}" class="th-btn btn-sm">Read More<i
                                class="fas fa-chevrons-right ms-2"></i></a>
                    </div>
                </div>
                @empty
                <section class="space">
                    <div class="container">
                        <div class="error-img">
                            <img src="{{ asset('template/assets/img/theme-img/error.svg') }}" alt="404 image">
                        </div>
                        <div class="error-content">
                            <h2 class="error-title"><span class="text-theme">OooPs!</span> Blog tidak ditemukan</h2>
                            <p class="error-text">Oops! Coba deh kamu cari judul yg lain^^.</p>
                            <a href="{{ url('pages/blog') }}" class="th-btn"><i class="fal fa-home me-2"></i>Kembali ke
                                halaman blog</a>
                        </div>
                    </div>
                </section>
                @endforelse

                {{ $blog->links('vendor.pagination.default') }}

            </div>
            <div class="col-xxl-4 col-lg-5">
                <aside class="sidebar-area">
                    <div class="widget  ">
                        <h3 class="widget_title">Recent Posts</h3>
                        <div class="recent-post-wrap">

                            @foreach ($latest as $item)
                            <div class="recent-post">
                                <div class="media-img">
                                    <a href="{{ route('detail.blog', ['slug' => $item->slug]) }}"><img
                                            src="{{ asset('blogs/' . $item->image) }}" alt="Blog Image"></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="post-title">
                                        <a class="text-inherit"
                                            href="{{ route('detail.blog', ['slug' => $item->slug]) }}">
                                            {{ $item->title }}
                                        </a>
                                    </h4>
                                    <div class="recent-post-meta">
                                        <a href="{{ route('detail.blog', ['slug' => $item->slug]) }}">
                                            <i class="far fa-calendar"></i>{{ $item->created_at->format('d M Y') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="widget widget_categories  ">
                        <h3 class="widget_title">Categories</h3>
                        <ul>
                            @foreach ($jumlahKategori as $kategori)
                            <li>
                                <a href="#">{{ $kategori->category->title }}</a>
                                <span>({{ $kategori->jumlah }})</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget widget_tag_cloud  ">
                        <h3 class="widget_title">Popular Tags</h3>
                        <div class="tagcloud">
                            @foreach($topTags as $tag => $count)
                            <a href="">{{ $tag }}</a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>


@endsection