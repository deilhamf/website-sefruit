@extends('layouts.pages')

@section('title')
<title>{{ $blog_details->title }}</title>
@endsection

@section('page', 'Blog')

@section('content')

@foreach ($config as $item)
<div class="breadcumb-wrapper" data-bg-src="{{ asset('galeries/config/breadcrumb/' . $item->breadcrumb) }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{ $blog_details->title }}</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Homepage</a></li>
                <li><a href="{{ url('pages/blog') }}">@yield('page')</a></li>
                <li>{{ $blog_details->title }}</li>
            </ul>
        </div>
    </div>
</div>
@endforeach

<section class="th-blog-wrapper blog-details space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-lg-7">
                <div class="th-blog blog-single">
                    <div class="blog-img">
                        <img src="{{ asset('blogs/' . $blog_details->image) }}" alt="Blog Image">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a class="author" href="#"><i class="far fa-user"></i>{{
                                $blog_details->author->name }}</a>
                            <a class="author" href="#"><i class="far fa-tags"></i>{{
                                $blog_details->category->title }}</a>
                            <a href="/detail/{{ $blog_details->slug }}/blog"><i class="far fa-calendar"></i>{{
                                $blog_details->created_at->format('d M
                                Y') }}</a>
                            <a href="/detail/{{ $blog_details->slug }}/blog"><i class="far fa-eye"></i>{{
                                $blog_details->view_count }} Views</a>
                        </div>
                        {{-- <h2 class="blog-title">{{ $blog_details->title }}</h2> --}}
                        <p>
                            {!! $blog_details->desc !!}
                        </p>
                        <h6>Bagikan Artikel Ini</h6>
                        <input type="text" value="{{ $url }}" readonly>


                        <div class="share-links clearfix ">
                            <div class="row justify-content-between">
                                <div class="col-sm-auto">
                                    <span class="share-links-title">Tags:</span>
                                    <div class="tagcloud">
                                        @foreach ($tagsArray as $tag)
                                        <a href="#">{{ trim($tag) }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-lg-5">
                <aside class="sidebar-area">
                    <div class="widget widget_search  ">
                        <form action="{{ Route('search.blog') }}" method="GET" class="search-form">
                            @csrf
                            <input name="query" type="search" placeholder="Cari judul Artikel ..." aria-label="Search">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
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
                    <div class="widget  ">
                        <h3 class="widget_title">Recent Posts</h3>
                        <div class="recent-post-wrap">

                            @foreach ($latest as $item)
                            <div class="recent-post">
                                <div class="media-img">
                                    <a href="{{ route('detail.blog', ['slug' => $item->slug]) }}"><img
                                            src="{{ asset('blogs/' . $item->image) }}" class="img-fluid"
                                            alt="Blog Image"></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="post-title"><a class="text-inherit"
                                            href="{{ route('detail.blog', ['slug' => $item->slug]) }}">{{ $item->title
                                            }}</a></h4>
                                    <div class="recent-post-meta">
                                        <a href="{{ route('detail.blog', ['slug' => $item->slug]) }}"><i
                                                class="far fa-calendar"></i>{{
                                            $item->created_at->format('d M Y') }}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="widget  ">
                        <h3 class="widget_title">Popular Posts</h3>
                        <div class="recent-post-wrap">

                            @foreach ($popularBlogs as $item)
                            <div class="recent-post">
                                <div class="media-img">
                                    <a href="{{ route('detail.blog', ['slug' => $item->slug]) }}"><img
                                            src="{{ asset('blogs/' . $item->image) }}" class="img-fluid"
                                            alt="Blog Image"></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="post-title"><a class="text-inherit"
                                            href="{{ route('detail.blog', ['slug' => $item->slug]) }}">{{ $item->title
                                            }}</a></h4>
                                    <div class="recent-post-meta">
                                        <a href="{{ route('detail.blog', ['slug' => $item->slug]) }}">
                                            <i class="far fa-eye"></i>{{ $item->view_count }} Views
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
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