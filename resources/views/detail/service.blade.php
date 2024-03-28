@extends('layouts.pages')

@section('title')
<title>{{ $service_details->title }}</title>
@endsection

@section('page', 'Service')

@section('content')

@foreach ($config as $item)
<div class="breadcumb-wrapper" data-bg-src="{{ asset('galeries/config/breadcrumb/' . $item->breadcrumb) }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{ $service_details->title }}</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Homepage</a></li>
                <li>{{ $service_details->title }}</li>
            </ul>
        </div>
    </div>
</div>
@endforeach

<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-lg-8">
                <div class="page-single mb-30">
                    <div class="page-img">
                        <img src="{{ asset('services/' . $service_details->image) }}" alt="Service Image">
                    </div>
                    <div class="page-content">
                        <h2 class="sec-title page-title">{{ $service_details->title }}</h2>
                        <p class="mb-30">
                            {!! $service_details->overview !!}
                        </p>

                        <div class="row mt-40 gx-40">
                            <div class="col-md-6 mb-30">
                                <img class="rounded-20 w-75"
                                    src="{{ asset('services/icon/' . $service_details->icon) }}" alt="service">
                            </div>
                            <div class="col-md-6 mb-30">
                                <p class="mb-4">
                                    {!! $service_details->desc !!}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-lg-4">
                <aside class="sidebar-area">

                    {{-- <div class="widget widget_download  ">
                        <h4 class="widget_title">Download</h4>
                        <div class="download-widget-wrap">
                            <a href="" class="th-btn rounded-10">
                                <i class="fa-light fa-file-pdf me-2"></i>DOWNLOAD PDF
                            </a>
                        </div>
                    </div> --}}

                    <div class="widget widget_categories  ">
                        <h3 class="widget_title">Categories</h3>
                        <ul>
                            @foreach ($category_service as $index => $service)
                            <li>
                                <a href="#">{{ $service->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    @foreach ($banner as $item)
                    <div class="">
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

                    <div class="accordion mt-40" id="faqAccordion">
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

                </aside>
            </div>
        </div>
    </div>
</section>

<section class="space bg-smoke2" id="category-sec">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title"><img src="{{ asset('template/assets/img/theme-img/title_icon.svg') }}"
                    alt="Icon">Layanan</span>
            <h2 class="sec-title">What We're Offering</h2>
        </div>
        <div class="swiper th-slider"
            data-slider-options='{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"3"},"768":{"slidesPerView":"4"},"992":{"slidesPerView":"5"},"1200":{"slidesPerView":"6"}}}'>
            <div class="swiper-wrapper">

                @foreach ($otherServices as $item)
                <div class="swiper-slide">
                    <div class="category-box">
                        <div class="box-icon">
                            <img src="{{ asset('services/icon/' . $item->icon) }}" alt="Image">
                        </div>
                        <h3 class="box-title">
                            <a href="{{ route('detail.service', ['slug' => $item->slug]) }}">
                                {{ $item->title }}
                            </a>
                        </h3>
                        <p class="box-subtitle">{{ $item->category->title }}</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

@endsection