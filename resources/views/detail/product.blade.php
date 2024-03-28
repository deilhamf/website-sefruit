@extends('layouts.pages')

@section('title')
<title>{{ $product_details->title }}</title>
@endsection

@section('page', 'Shop')

@section('content')
@foreach ($config as $item)
<div class="breadcumb-wrapper" data-bg-src="{{ asset('galeries/config/breadcrumb/' . $item->breadcrumb) }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{ $product_details->title }}</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Homepage</a></li>
                <li><a href="{{ url('pages/shop') }}">@yield('page')</a></li>
                <li>{{ $product_details->title }}</li>
            </ul>
        </div>
    </div>
</div>
@endforeach
<!--==============================
Product Details
==============================-->
<section class="product-details space-top space-extra-bottom">
    <div class="container">
        <div class="row gx-60">
            <div class="col-lg-6">
                <div class="product-big-img">
                    <div class="img"><img src="{{ asset('products/' . $product_details->image) }}" alt="Product Image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="product-about">
                    <p class="price">Rp{{ $product_details->price }}/kg</p>
                    <h2 class="product-title">{{ $product_details->title }}</h2>
                    <p class="text">
                        {!! $product_details->overview !!}
                    </p>
                    <div class="product_meta">
                        <span class="posted_in">Category:
                            <a href="{{ url('pages/shop') }}">
                                {{ $product_details->category->title }}
                            </a>
                        </span>
                        <span>Tags:
                            @foreach ($tagsArray as $tag)
                            <a href="#">{{ trim($tag) }}</a>
                            @endforeach
                        </span>
                    </div>
                    <div class="actions">
                        @foreach ($contacts as $item)
                        <a href="https://api.whatsapp.com/send?phone={{ $item->telp }}&text=Haloo%2C%20Saya%20mau%20pesan%20nih%20min...%0A*Nama%20Produk*%3A%20{{ $product_details->title }}%0A*Kategori*%3A%20{{ $product_details->category->title }}%0AApakah%20masih%20ada%3F%3F"
                            target="_blank" class="th-btn">Order via whatsapp</a>
                        @endforeach
                        {{-- <form action="{{ route('cart.add', $product_details->slug) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            <button type="submit">Add to Cart</button>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav product-tab-style1" id="productTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link th-btn active" id="description-tab" data-bs-toggle="tab" href="#description"
                    role="tab" aria-controls="description" aria-selected="false">Product Description</a>
            </li>
            {{-- <li class="nav-item" role="presentation">
                <a class="nav-link th-btn" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab"
                    aria-controls="reviews" aria-selected="true">Testimonial</a>
            </li> --}}
        </ul>
        <div class="tab-content" id="productTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <p>
                    {!! $product_details->desc !!}
                </p>
            </div>
            {{-- <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <div class="woocommerce-Reviews">
                    <div class="th-comments-wrap ">
                        <ul class="comment-list">
                            @foreach ($testimonials as $item)
                            <li class="review th-comment-item">
                                <div class="th-post-comment">
                                    <div class="comment-avater">
                                        <img src="{{ asset('galeries/testimonial/' . $item->image) }}"
                                            alt="Comment Author">
                                    </div>
                                    <div class="comment-content">
                                        <h4 class="name">{{ $item->nama }}</h4>
                                        <span class="commented-on"><i class="far fa-calendar"></i>{{
                                            $item->created_at->format('d M Y') }}</span>
                                        <p class="text">
                                            {!! $item->testimoni !!}
                                        </p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div> <!-- Comment Form -->
                </div>
            </div> --}}
        </div>

        <!--==============================
    Related Product  
    ==============================-->
        <div class="space-extra-top mb-30">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-auto">
                    <h2 class="sec-title text-center">Related Products</h2>
                </div>
                <div class="col-md d-none d-sm-block">
                    <hr class="title-line">
                </div>
                <div class="col-md-auto d-none d-md-block">
                    <div class="sec-btn">
                        <div class="icon-box">
                            <button data-slider-prev="#productSlider1" class="slider-arrow default"><i
                                    class="far fa-arrow-left"></i></button>
                            <button data-slider-next="#productSlider1" class="slider-arrow default"><i
                                    class="far fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper th-slider has-shadow" id="productSlider1"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
                <div class="swiper-wrapper">

                    @foreach ($products as $item)
                    <div class="swiper-slide">
                        <div class="th-product product-grid">
                            <div class="product-img">
                                <img src="{{ asset('products/' . $item->image) }}" alt="Product Image">
                                <span class="product-tag">{{ $item->category->title }}</span>
                                <div class="actions">
                                    <a href="{{ route('detail.product', ['slug' => $item->slug]) }}" class="icon-btn">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content">
                                <a href="{{ route('detail.product', ['slug' => $item->slug]) }}"
                                    class="product-category">{{
                                    $item->category->title }}</a>
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
            <div class="d-block d-md-none mt-40 text-center">
                <div class="icon-box">
                    <button data-slider-prev="#productSlider1" class="slider-arrow default"><i
                            class="far fa-arrow-left"></i></button>
                    <button data-slider-next="#productSlider1" class="slider-arrow default"><i
                            class="far fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection