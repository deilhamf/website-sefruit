@extends('layouts.pages')

@section('title')
Shop
@endsection

@section('page', 'Shop')

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
Product Area
==============================-->
<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="widget widget_search">
            <form action="{{ Route('search.product') }}" method="GET" class="search-form">
                @csrf
                <input name="query" type="search" placeholder="Cari nama produk ..." aria-label="Search">
                <button type="submit"><i class="far fa-search"></i></button>
            </form>
        </div>

        <div class="row gy-40">

            @forelse ($product as $item)
            {{-- @if ($item->status) --}}
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="{{ asset('products/' . $item->image) }}" alt="Product Image">
                        <span class="product-tag">{{ $item->category->title }}</span>
                        <div class="actions">
                            <a href="{{ route('detail.product', ['slug' => $item->slug]) }}" class="icon-btn"><i
                                    class="far fa-eye"></i></a>
                            @auth
                            <a href="javascript:void(0);" class="add-to-cart-link icon-btn"
                                data-product-id="{{ $item->id }}">
                                <i class="far fa-shopping-cart"></i>
                            </a>
                            @endauth
                            <form id="add-to-cart-form-{{ $item->id }}"
                                action="{{ route('cart.add', ['product' => $item->id]) }}" method="POST"
                                style="display: none;">
                                @csrf
                                <button type="submit"></button>
                            </form>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="{{ route('detail.product', ['slug' => $item->slug]) }}" class="product-category">{{
                            $item->category->title
                            }}</a>
                        <h3 class="product-title">
                            <a href="{{ route('detail.product', ['slug' => $item->slug]) }}">{{ $item->title
                                }}</a>
                        </h3>
                        <span class="price">Rp{{ $item->price }}/kg</span>
                    </div>
                </div>
            </div>
            @empty
            <section class="space">
                <div class="container">
                    <div class="error-img">
                        <img src="{{ asset('template/assets/img/theme-img/error.svg') }}" alt="404 image">
                    </div>
                    <div class="error-content">
                        <h2 class="error-title"><span class="text-theme">OooPs!</span> Produk tidak ditemukan</h2>
                        <p class="error-text">Oops! Coba deh kamu cari produk yg lain^^.</p>
                        <a href="{{ url('pages/shop') }}" class="th-btn"><i class="fal fa-home me-2"></i>Kembali ke
                            halaman toko</a>
                    </div>
                </div>
            </section>
            @endforelse

        </div>

        {{ $product->links('vendor.pagination.default') }}

    </div>
</section>

<section class="space-bottom">
    <div class="container">
        <div class="row flex-row-reverse">
            @foreach ($banner as $item)
            <div class="col-xl-3 col-lg-4 col-md-6 mb-40 mb-lg-0">
                <div class="offer-grid mega-hover" data-bg-src="{{ asset('galeries/banner/' . $item->image) }}">
                    <span class="h6 box-subtitle fs-16 text-white">{{ $item->judul }}</span>
                    <h3 class="box-title text-white">
                        {!! $item->desk !!}
                    </h3>
                    <a href="{{ url('pages/shop') }}" class="th-btn btn-sm style4">Shop Now<i
                            class="fas fa-chevrons-right ms-2"></i></a>
                </div>
            </div>
            @endforeach
            <div class="col-xl-9 col-lg-8 col-md-6">
                <div class="row justify-content-lg-between justify-content-center align-items-center">
                    <div class="col-md text-center text-md-start">
                        <h2 class="sec-title mb-30">Latest Products</h2>
                    </div>
                    <div class="col-md-auto d-none d-lg-inline-block">
                        <div class="sec-btn mb-35">
                            <div class="icon-box">
                                <button data-slider-prev="#productSlider7" class="slider-arrow default"><i
                                        class="far fa-arrow-left"></i></button>
                                <button data-slider-next="#productSlider7" class="slider-arrow default"><i
                                        class="far fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper th-slider has-shadow" id="productSlider7"
                    data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
                    <div class="swiper-wrapper">

                        @foreach ($latests as $item)
                        <div class="swiper-slide">
                            <div class="th-product product-grid">
                                <div class="product-img">
                                    <img src="{{ asset('products/' . $item->image) }}" alt="Product Image">
                                    <span class="product-tag">{{ $item->category->title }}</span>
                                    <div class="actions">
                                        <a href="{{ route('detail.product', ['slug' => $item->slug]) }}"
                                            class="icon-btn"><i class="far fa-eye"></i></a>
                                        <a href="javascript:void(0);" class="add-to-cart-link icon-btn"
                                            data-product-id="{{ $item->id }}">
                                            <i class="far fa-shopping-cart"></i>
                                        </a>
                                        <form id="add-to-cart-form-{{ $item->id }}"
                                            action="{{ route('cart.add', ['product' => $item->id]) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            <button type="submit"></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <a href="{{ route('detail.product', ['slug' => $item->slug]) }}"
                                        class="product-category">
                                        Fresh Fruits
                                    </a>
                                    <h3 class="product-title">
                                        <a href="{{ route('detail.product', ['slug' => $item->slug]) }}">
                                            {{ $item->title }}
                                        </a>
                                    </h3>
                                    <span class="price">Rp{{ $item->price }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection