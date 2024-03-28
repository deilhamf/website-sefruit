@extends('layouts.pages')

@section('title')
FAQs
@endsection

@section('page', 'FAQs')

@section('content')

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

<div class="space">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title"><img src="{{ asset('template/assets/img/theme-img/title_icon.svg') }}"
                    alt="Icon">Looking For
                Answers?</span>
            <h2 class="sec-title">Frequently Asked Questions</h2>
        </div>
        <div class="row gy-4">
            <div class="col-xl-12">
                <div class="accordion-1 accordion" id="faqAccordion">

                    @foreach ($faqs as $item)
                    <div class="accordion-card">
                        <div class="accordion-header" id="collapse-item-1">
                            <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse-1{{ $item->id }}" aria-expanded="false"
                                aria-controls="collapse-1">
                                {{ $item->question }}
                            </button>
                        </div>
                        <div id="collapse-1{{ $item->id }}"
                            class="accordion-collapse collapse {{ $loop->iteration == 1 ? 'show' : '' }}"
                            aria-labelledby="collapse-item-1" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p class="faq-text">
                                    {{ $item->answer }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

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