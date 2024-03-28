@extends('layouts.pages')

@section('title')
About Us
@endsection

@section('page', 'About Us')

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

<div class="overflow-hidden space" id="about-sec">
    <div class="container">
        <div class="row align-items-center">

            @foreach ($abouts as $item)
            <div class="col-xl-6 mb-30 mb-xl-0">
                <div class="img-box1">
                    <div class="img1">
                        <img src="{{ asset('galeries/about/' . $item->image) }}" alt="About">
                    </div>
                    <div class="img2">
                        <img src="{{ asset('galeries/about/' . $item->image2) }}" alt="About">
                    </div>
                    <div class="shape1 movingX">
                        <img src="{{ asset('galeries/about/' . $item->image3) }}" alt="About">
                    </div>
                    <div class="year-counter">
                        <div class="year-counter_number"><span class="counter-number">{{ $item->tahun }}</span></div>
                        <p class="year-counter_text">Tahun Pengalaman Melayani</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="ps-xxl-5 ps-xl-2 ms-xl-1 text-center text-xl-start">
                    <div class="title-area mb-32">
                        <span class="sub-title"><img src="{{ asset('template/assets/img/theme-img/title_icon.svg') }}"
                                alt="shape">
                            {{ $item->subtitle }}
                        </span>
                        <h2 class="sec-title">{{ $item->title }}</h2>
                        <p class="sec-text">
                            {!! $item->overview !!}
                        </p>
                        <p class="sec-text">
                            {!! $item->desc !!}
                        </p>
                    </div>
                    <div class="about-feature-wrap">

                        @foreach ($layanan as $item)
                        <div class="about-feature">
                            <div class="box-icon">
                                <img src="{{ asset('services/icon/' . $item->icon) }}" alt="Icon">
                            </div>
                            <h3 class="box-title">{{ $item->title }}</h3>
                        </div>
                        @endforeach

                    </div>
                    {{-- <div>
                        <a href="{{ url('pages/about') }}" class="th-btn">Discover More<i
                                class="fas fa-chevrons-right ms-2"></i></a>
                    </div> --}}
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

<section class="space bg-smoke2" id="process-sec">
    <div class="shape-mockup" data-top="0" data-left="0"><img
            src="{{ asset('template/assets/img/shape/vector_shape_7.png') }}" alt="shape">
    </div>
    <div class="shape-mockup" data-bottom="0" data-right="0"><img
            src="{{ asset('template/assets/img/shape/vector_shape_6.png') }}" alt="shape">
    </div>
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title"><img src="{{ asset('template/assets/img/theme-img/title_icon.svg') }}"
                    alt="Icon">How We Make Quality
                Foods</span>
            <h2 class="sec-title">How We Work It?</h2>
        </div>
        <div class="row gy-4 justify-content-center">
            @foreach ($works as $item)
            <div class="col-xl-3 col-md-6 process-box-wrap">
                <div class="process-box">
                    <div class="box-icon">
                        <img src="{{ asset('works/icon/' . $item->icon) }}" alt="icon">
                    </div>
                    <div class="box-img" data-mask-src="{{ asset('template/assets/img/bg/process_bg_shape.png') }}">
                        <img src="{{ asset('works/' . $item->image) }}" alt="image">
                    </div>
                    <p class="box-number">Step - 0{{ $loop->iteration }}</p>
                    <h3 class="box-title">{{ $item->title }}</h3>
                    <p class="box-text">
                        {!! $item->desc !!}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="space-top">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title"><img src="{{ asset('template/assets/img/theme-img/title_icon.svg') }}"
                    alt="Icon">Services Category</span>
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

<div class="overflow-hidden space">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 text-center text-xl-start">
                @foreach ($headingbenefit as $item)
                <div class="title-area">
                    <span class="sub-title">
                        <img src="{{ asset('template/assets/img/theme-img/title_icon.svg') }}" alt="shape">
                        {{ $item->subtitle }}
                    </span>
                    <h2 class="sec-title">{{ $item->title }}</h2>
                    <p class="sec-text">
                        {!! $item->desc !!}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
        <div class="text-center text-xl-start">
            <div class="choose-feature-area">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="choose-feature-wrap">

                            @foreach ($ungguls as $item)
                            <div class="choose-feature">
                                <div class="box-icon">
                                    <img src="{{ asset('galeries/keunggulan/' . $item->image) }}" style="width: 30px;"
                                        alt="Icon">
                                </div>
                                <h3 class="box-title">{{ $item->judul }}</h3>
                                <p class="box-text">{!! $item->desk !!}</p>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-xl-5 d-none d-xl-block">
                        <div class="img-box2-wrap">
                            <div class="img-box2">
                                @foreach ($headingbenefit as $item)
                                <div class="img1">
                                    <img src="{{ asset('heading/benefit/' . $item->image) }}" style="width: 540px;"
                                        alt="Why">
                                </div>
                                @endforeach
                                <div class="img2">
                                    <img src="{{ asset('template/assets/img/normal/why_1_2.png') }}" alt="Why">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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