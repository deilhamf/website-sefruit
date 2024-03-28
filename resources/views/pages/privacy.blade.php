@extends('layouts.pages')

@section('title')
Privacy Policy
@endsection

@section('page', 'Privacy Policy')

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

<section class="space-top overflow-hidden">
    <div class="container">
        @foreach ($privacy as $item)
        <div class="project-details">
            {{-- <span class="sub-title" style="justify-content: center;">
                <img src="{{ asset('template/assets/img/theme-img/title_icon.svg') }}" alt="shape">
                {{ $item->subtitle }}
            </span> --}}
            <h2 class="page-title">{{ $item->title }}</h2>
            <div class="page-content">
                <p class="mb-4">
                    {!! $item->desc !!}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</section>

<div class="space-bottom">
    <div class="container">
        <div class="row gy-4 justify-content-center">
            @foreach ($contacts as $item)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="contact-feature">
                    <div class="box-icon">
                        <i class="fa-light fa-location-dot"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="box-title">Our Address</h3>
                        <p class="box-text">{!! $item->alamat !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="contact-feature">
                    <div class="box-icon bg-theme2">
                        <i class="fa-light fa-phone"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="box-title">Phone Number</h3>
                        <p class="box-text">
                            <a href="tel:+{{ $item->telp }}">+{{ $item->telp }}</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="contact-feature">
                    <div class="box-icon bg-title">
                        <i class="fa-light fa-envelope"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="box-title">Email Address</h3>
                        <p class="box-text">
                            <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="contact-feature">
                    <div class="media-body">
                        <h3 class="box-title">Follow Social Media</h3>
                        <div class="th-social">
                            @foreach ($footers as $item)
                            <a href="{{ $item->fb }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ $item->ig }}" target="_blank"><i class="fab fa-instagram"></i></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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
                            <a href="{{ route('detail.blog', ['slug' => $item->slug]) }}"><i class="far fa-tags"></i>{{
                                $item->category->title }}</a>
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

@endsection