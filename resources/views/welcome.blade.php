@extends('layouts.pages')

@section('title')
@foreach ($config as $item)
{{ $item->title }}
@endforeach
@endsection

@section('content')

<div class="th-hero-wrapper hero-1" id="hero" data-bg-src="{{ asset('template/assets/img/hero/hero_bg_1_2.jpg') }}">
    <div class="swiper th-slider" id="heroSlide1" data-slider-options='{"effect":"fade"}'>
        <div class="swiper-wrapper">

            @foreach ($sliders as $item)
            <div class="swiper-slide">
                <div class="hero-inner">
                    <div class="container">
                        <div class="hero-style1">
                            <span class="sub-title" data-ani="slideinup" data-ani-delay="0.2s"><img
                                    src="{{ asset('template/assets/img/theme-img/title_icon.svg') }}" alt="shape">
                                {{ $item->subtitle }}
                            </span>
                            <h1 class="hero-title">
                                <span class="title1" data-ani="slideinup" data-ani-delay="0.4s">
                                    {{$item->title }}
                                </span>
                            </h1>
                            <a href="{{ url('pages/shop') }}" class="th-btn" data-ani="slideinup"
                                data-ani-delay="0.7s">Discover
                                More<i class="fas fa-chevrons-right ms-2"></i></a>
                        </div>
                    </div>
                    <div class="hero-img" data-ani="slideinright" data-ani-delay="0.5s">
                        <img class="img-fluid" src="{{ asset('galeries/slider/' . $item->image) }}" alt="Image">
                    </div>
                    <div class="hero-shape1" data-ani="slideinup" data-ani-delay="0.5s">
                        <img src="{{ asset('template/assets/img/hero/hero_shape_1_1.png') }}" alt="shape">
                    </div>
                    <div class="hero-shape2" data-ani="slideindown" data-ani-delay="0.6s">
                        <img src="{{ asset('template/assets/img/hero/hero_shape_1_2.png') }}" alt="shape">
                    </div>
                    <div class="hero-shape3" data-ani="slideinleft" data-ani-delay="0.7s">
                        <img src="{{ asset('template/assets/img/hero/hero_shape_1_3.png') }}" alt="shape">
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <div class="hero-shape4">
        <img class="svg-img" src="{{ asset('template/assets/img/hero/hero_shape_1_4.svg') }}" alt="shape">
    </div>
</div>

<section class="space bg-smoke2" id="category-sec">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title"><img src="{{ asset('template/assets/img/theme-img/title_icon.svg') }}"
                    alt="Icon">Product Category</span>
            <h2 class="sec-title">Category We Provide</h2>
        </div>
        <div class="swiper th-slider"
            data-slider-options='{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"3"},"768":{"slidesPerView":"4"},"992":{"slidesPerView":"5"},"1200":{"slidesPerView":"6"}}}'>
            <div class="swiper-wrapper">

                @foreach ($jumlahKategori as $kategori)
                <div class="swiper-slide">
                    <div class="category-box">
                        <div class="box-icon">
                            <img src="{{ asset('products/icon/' . $kategori->category->icon) }}" alt="Image">
                        </div>
                        <h3 class="box-title"><a href="{{ url('pages/shop') }}">{{ $kategori->category->title }}</a>
                        </h3>
                        <p class="box-text">{{ $kategori->jumlah }} Products</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

<section class="mt-4 section-top">
    <div class="container">
        <div class="feature-list-wrap">
            @foreach ($benefits as $item)
            <div class="feature-list">
                <div class="box-icon">
                    <img src="{{ asset('galeries/keunggulan/' . $item->image) }}" alt="icon">
                </div>
                <div class="media-body">
                    <h3 class="box-title">{{ $item->judul }}</h3>
                    <p class="box-text">{!! $item->desk !!}</p>
                </div>
            </div>
            <div class="feature-list-line"></div>
            @endforeach

        </div>
    </div>
</section>

<section class="space-top">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title"><img src="{{ asset('template/assets/img/theme-img/title_icon.svg') }}"
                    alt="Icon">Services</span>
            <h2 class="sec-title">What We’re Offering</h2>
        </div>
        <div class="swiper th-slider"
            data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"400":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"}}}'>

            <div class="swiper-wrapper">

                @foreach ($service as $item)
                <div class="swiper-slide">
                    <div class="category-card">
                        <div class="box-shape" data-bg-src="{{ asset('template/assets/img/bg/category_card_bg.') }}png">
                        </div>
                        <div class="box-icon"
                            data-mask-src="{{ asset('template/assets/img/bg/category_card_icon_bg.png') }}">
                            <img src="{{ asset('services/icon/' . $item->icon) }}" alt="Image">
                        </div>
                        <p class="box-subtitle">{{ $item->category->title }}</p>
                        <h3 class="box-title"><a href="{{ route('detail.service', ['slug' => $item->slug]) }}">{{
                                $item->title }}</a></h3>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

<section class="space-top">
    <div class="container">
        <div class="row gy-4">
            @foreach ($popularProducts as $item)
            <div class="col-xl-6 col-md-6">
                <div class="offer-box mega-hover" data-bg-src="{{ asset('products/' . $item->image) }}">
                    <span class="box-subtitle bg-theme">Popular</span>
                    <h3 class="box-title text-white">{{ $item->title }}</h3>
                    <a href="{{ route('detail.product', ['slug' => $item->slug]) }}" class="th-btn style4 btn-sm">
                        Belanja<i class="fas fa-chevrons-right ms-2"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-3 col-md-8 mb-40 mb-xl-0">
                @foreach ($banner as $item)
                <div class="offer-grid text-center mega-hover px-3"
                    data-bg-src="{{ asset('galeries/banner/' . $item->image) }}">
                    <span class="h6 box-subtitle fs-16">
                        <span class="text-theme2">
                            {{ $item->judul }}
                        </span>
                    </span>
                    <h3 class="box-title text-white">
                        {!! $item->desk !!}
                    </h3>
                    <a href="{{ url('pages/shop') }}" class="th-btn btn-sm style4">Belanja<i
                            class="fas fa-chevrons-right ms-2"></i></a>
                </div>
                @endforeach
            </div>
            <div class="col-xl-9">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6">
                        <h3 class="box-title mb-20 text-center text-md-start">Buah - Buahan</h3>
                        <div class="product-list-area">

                            <div class="mb-4">
                                @foreach ($buah as $item)
                                <div class="th-product list-view">
                                    <div class="product-img">
                                        <img src="{{ asset('products/' . $item->image) }}" alt="Product Image">
                                        <div class="actions">
                                            <a href="{{ route('detail.product', ['slug' => $item->slug]) }}"
                                                class="icon-btn"><i class="far fa-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a href="{{ route('detail.product', ['slug' => $item->slug]) }}"
                                            class="product-category">
                                            {{ $item->category->title }}
                                        </a>
                                        <h3 class="product-title">
                                            <a href="{{ route('detail.product', ['slug' => $item->slug]) }}">
                                                {{ $item->title }}
                                            </a>
                                        </h3>
                                        <span class="price">Rp{{ $item->price }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h3 class="box-title mb-20 text-center text-md-start">Sayur - Sayuran</h3>
                        <div class="product-list-area">

                            <div class="mb-4">
                                @foreach ($sayur as $item)
                                <div class="th-product list-view">
                                    <div class="product-img">
                                        <img src="{{ asset('products/' . $item->image) }}" alt="Product Image">
                                        <div class="actions">
                                            <a href="{{ route('detail.product', ['slug' => $item->slug]) }}"
                                                class="icon-btn"><i class="far fa-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a href="{{ route('detail.product', ['slug' => $item->slug]) }}"
                                            class="product-category">
                                            {{ $item->category->title }}
                                        </a>
                                        <h3 class="product-title">
                                            <a href="{{ route('detail.product', ['slug' => $item->slug]) }}">
                                                {{ $item->title }}
                                            </a>
                                        </h3>
                                        <span class="price">Rp{{ $item->price }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h3 class="box-title mb-20 text-center text-md-start">Produk Lainnya</h3>
                        <div class="product-list-area">

                            <div class="mb-4">
                                @foreach ($display as $item)
                                <div class="th-product list-view">
                                    <div class="product-img">
                                        <img src="{{ asset('products/' . $item->image) }}" alt="Product Image">
                                        <div class="actions">
                                            <a href="{{ route('detail.product', ['slug' => $item->slug]) }}"
                                                class="icon-btn"><i class="far fa-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a href="{{ route('detail.product', ['slug' => $item->slug]) }}"
                                            class="product-category">
                                            {{ $item->category->title }}
                                        </a>
                                        <h3 class="product-title">
                                            <a href="{{ route('detail.product', ['slug' => $item->slug]) }}">
                                                {{ $item->title }}
                                            </a>
                                        </h3>
                                        <span class="price">Rp{{ $item->price }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="space-bottom">
    <div class="container">
        <div class="row flex-row-reverse">
            @foreach ($banner as $item)
            <div class="col-xl-3 col-lg-4 col-md-6 mb-40 mb-lg-0">
                <div class="offer-grid mega-hover" data-bg-src="{{ asset('galeries/banner/' . $item->image2) }}">
                    <span class="h6 box-subtitle fs-16 text-white">{{ $item->judul }}</span>
                    <h3 class="box-title text-white">
                        {!! $item->desk !!}
                    </h3>
                    <a href="{{ url('pages/shop') }}" class="th-btn btn-sm style4">Belanja<i
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
                                            class="icon-btn">
                                            <i class="far fa-eye"></i>
                                        </a>
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
                                    <a href="{{ route('detail.product', ['slug' => $item->slug]) }}"
                                        class="product-category">
                                        {{ $item->tags }}
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

<section class="overflow-hidden bg-smoke2" id="testi-sec">
    @foreach ($headingtesti as $item)
    <div class="shape-mockup testi-shape1" data-top="0" data-left="0"><img src="{{ asset('heading/' . $item->image) }}"
            alt="shape"></div>
    <div class="shape-mockup" data-bottom="0" data-right="0"><img
            src="{{ asset('template/assets/img/shape/vector_shape_5.png') }}" alt="shape"></div>
    <div class="container">
        <div class="testi-card-area">
            <div class="title-area">
                <span class="sub-title">
                    <img src="{{ asset('template/assets/img/theme-img/title_icon.svg') }}" alt="Icon">
                    {{ $item->subtitle }}
                </span>
                <h2 class="sec-title">{{ $item->title }}</h2>
            </div>
            <div class="testi-card-slide">
                <div class="swiper th-slider" id="testiSlide1" data-slider-options='{"effect":"slide"}'>
                    <div class="swiper-wrapper">

                        @foreach ($testimonial as $item)
                        <div class="swiper-slide">
                            <div class="testi-card">
                                {!! $item->testimoni !!}
                                <div class="testi-card_profile">
                                    <div class="testi-card_avater">
                                        <img src="{{ asset('galeries/testimonial/' . $item->image) }}" alt="Avater">
                                    </div>
                                    <div class="testi-card_content">
                                        <h3 class="testi-card_name">{{ $item->nama }}</h3>
                                        <span class="testi-card_desig">{{ $item->profesi }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="icon-box">
                    <button data-slider-prev="#testiSlide1" class="slider-arrow default"><i
                            class="far fa-arrow-left"></i></button>
                    <button data-slider-next="#testiSlide1" class="slider-arrow default"><i
                            class="far fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>

<section class="space" id="blog-sec">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-center align-items-center">
            <div class="col-lg">
                <h2 class="sec-title text-center text-lg-start">Latest Updates & News</h2>
            </div>
            <div class="col-lg-auto d-none d-lg-block">
                <div class="sec-btn">
                    <a href="{{ url('pages/blog') }}" class="th-btn">View More Post<i
                            class="fas fa-chevrons-right ms-2"></i></a>
                </div>
            </div>
        </div>
        <div class="row gy-4">

            @foreach ($blog as $item)
            <div class="col-xl-4 col-md-6">
                <div class="blog-grid">
                    <div class="blog-img">
                        <img src="{{ asset('blogs/' . $item->image) }}" alt="blog image">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="{{ route('detail.blog', ['slug' => $item->slug]) }}"><i class="far fa-user"></i>{{
                                $item->author->name }}</a>
                            <a href="{{ route('detail.blog', ['slug' => $item->slug]) }}"><i
                                    class="far fa-calendar"></i>{{ $item->created_at->format('d M Y')
                                }}</a>
                        </div>
                        <h3 class="box-title">
                            <a href="{{ route('detail.blog', ['slug' => $item->slug]) }}">
                                {{ $item->title }}
                            </a>
                        </h3>
                        <a href="{{ route('detail.blog', ['slug' => $item->slug]) }}" class="th-btn btn-sm style4">Read
                            More<i class="fas fa-chevrons-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@foreach ($config as $item)
<div class="brand-sec1" data-bg-src="{{ asset('galeries/config/breadcrumb/' . $item->breadcrumb) }}">
    @endforeach
    <div class="container th-container">
        <div class="swiper th-slider" id="blogSlider1"
            data-slider-options='{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"},"1400":{"slidesPerView":"6"}}}'>
            <div class="swiper-wrapper">
                @foreach ($brands as $item)
                <div class="swiper-slide">
                    <div class="brand-card">
                        <img src="{{ asset('galeries/partner/' . $item->image) }}" alt="{{ $item->name }}">
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

@endsection