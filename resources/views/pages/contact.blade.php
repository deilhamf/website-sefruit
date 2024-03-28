@extends('layouts.pages')

@section('title')
Contact
@endsection

@section('page', 'Contact')

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
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-7">
                <div class="title-area text-center">
                    <h2 class="sec-title">Contact Information</h2>
                    <p class="sec-text">Jangan ragu untuk menghubungi kami.</p>
                </div>
            </div>
        </div>
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

<div class="space-bottom">
    <div class="container">
        <form action="{{ url('/kirim') }}" method="POST" class="contact-form input-smoke ajax-contact">
            @csrf
            <h2 class="sec-title">Hubungi Kami</h2>
            <div class="row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="nama" id="name" placeholder="Your Name">
                    <i class="fal fa-user"></i>
                </div>
                <div class="form-group col-md-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                    <i class="fal fa-envelope"></i>
                </div>
                <div class="form-group col-12">
                    <textarea name="komentar" id="message" cols="30" rows="3" class="form-control"
                        placeholder="Your Message"></textarea>
                    <i class="fal fa-pencil"></i>
                </div>
                <div class="form-group col-6">
                    <input type="hidden" class="form-control @error('g-recaptcha-response') is-invalid @enderror"
                        value="{{ old('name') }}">{!! htmlFormSnippet() !!}
                    @error('g-recaptcha-response')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-btn col-12">
                    <button type="submit" class="th-btn btn-fw">Send Message<i
                            class="fas fa-chevrons-right ms-2"></i></button>
                </div>
            </div>
            <p class="form-messages mb-0 mt-3"></p>
        </form>
    </div>
</div>

<div class="space-bottom">
    @foreach ($contacts as $item)
    <div class="contact-map">
        <iframe src="{{ $item->map }}" allowfullscreen="" loading="lazy"></iframe>
    </div>
    @endforeach
</div>


@endsection