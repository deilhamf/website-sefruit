<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    @yield('title')

    @foreach ($config as $item)
    <meta name="author" content="{{ $item->title }}">
    <meta name="description" content="Frutin - Organic and Healthy Food HTML Template">
    <meta name="keywords" content="Frutin - Organic and Healthy Food HTML Template">
    @endforeach
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root direcStory -->
    @foreach ($config as $item)
    <link rel="apple-touch-icon" sizes="96x96" href="{{ asset('galeries/config/favicon/' . $item->favicon) }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('galeries/config/favicon/' . $item->favicon) }}">
    @endforeach

    <link rel="manifest" href="{{ asset('template.') }}assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('templateassets/img/favicons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,100;9..40,200;9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=Lexend:wght@300;400;500;600;700;800;900&family=Lobster&display=swap"
        rel="stylesheet">

    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css') }}">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/fontawesome.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/magnific-popup.min.css') }}">
    <!-- Swiper Js -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/swiper-bundle.min.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">

</head>

<body>

    <!--==============================
Preloader
==============================-->
    <div class="preloader ">
        <button class="th-btn preloaderCls">Cancel Preloader </button>
        <div class="preloader-inner">
            <div class="loader">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <!--==============================
    Sidemenu
============================== -->
    <div class="popup-search-box d-none d-lg-block">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" placeholder="Apa yang kamu cari?">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>

    <!--==============================
    Mobile Menu
============================== -->
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                @foreach ($config as $item)
                <a href="{{ url('/') }}"><img src="{{ asset('galeries/config/logo/' . $item->logo) }}" alt="Frutin"></a>
                @endforeach
            </div>
            <div class="th-mobile-menu">
                <ul>
                    <li>
                        <a href="{{ url('/') }}">Homepage</a>
                    </li>
                    <li>
                        <a href="{{ url('pages/shop') }}">Shop</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ url('pages/about') }}">About Us</a>
                            </li>
                            <li>
                                <a href="{{ url('pages/blog') }}">Blog</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('pages/contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
	Header Area
==============================-->
    <header class="th-header header-layout1">
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                    @foreach ($config as $item)
                    <div class="col-auto d-none d-lg-block">
                        <p class="header-notice">
                            {{ $item->subtitle }}
                        </p>
                    </div>
                    @endforeach
                    <div class="col-auto">
                        <div class="header-links">
                            <ul>
                                <li class="d-none d-sm-inline-block"><i class="fal fa-location-dot"></i><a
                                        href="https://www.google.com/maps">8502 Preston Rd. Inglewood, Maine 98380</a>
                                </li>
                                <li>
                                    <div class="social-links">
                                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-wrapper">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                @foreach ($config as $item)
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('galeries/config/logo/' . $item->logo) }}" class="img-fluid"
                                        alt="Frutin"></a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li>
                                        <a href="{{ url('/') }}">Homepage</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/shop') }}">Shop</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Pages</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="{{ url('pages/about') }}">About Us</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('pages/blog') }}">Blog</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/contact') }}">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                            <button type="button" class="th-menu-toggle d-block d-lg-none"><i
                                    class="far fa-bars"></i></button>
                        </div>
                        <div class="col-auto d-none d-xl-block">
                            <div class="header-button">
                                <button type="button" class="simple-icon searchBoxToggler"><i
                                        class="far fa-search"></i></button>
                                <a href="#" class="th-btn style4">Shop Now<i class="fas fa-chevrons-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    {{-- <div class="">
        <div class="container z-index-common">
            <div class="newsletter-wrap">
                <div class="newsletter-content">
                    <h4 class="newsletter-title">Sign Up to Get Updates & News About Us.</h4>
                </div>
                <form class="newsletter-form">
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="Email Address" required="">
                    </div>
                    <button type="submit" class="th-btn style6">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer-wrapper footer-layout1" data-bg-src="{{ asset('template/assets/img/bg/footer.png') }}">
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo">
                                    @foreach ($config as $item)
                                    <a href="home-organic-farm.html"><img
                                            src="{{ asset('galeries/config/logo/' . $item->logo) }}" class="img-fluid"
                                            alt="Frutin"></a>
                                    @endforeach
                                </div>
                                @foreach ($abouts as $item)
                                <p class="about-text">{!! $item->overview !!}</p>
                                @endforeach
                                <div class="th-social">
                                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    @foreach ($contacts as $item)
                                    <a href="https://wa.me/{{ $item->telp }}"><i class="fab fa-whatsapp"></i></a>
                                    @endforeach
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title"><img
                                    src="{{ asset('template/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Useful
                                Links</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li>
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/about') }}">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/shop') }}">Shop</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/blog') }}">Blog</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/contact') }}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title"><img
                                    src="{{ asset('template/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Contact
                                Us</h3>
                            <div class="th-widget-contact">
                                @foreach ($contacts as $item)
                                <div class="info-box">
                                    <div class="info-box_icon">
                                        <i class="fas fa-location-dot"></i>
                                    </div>
                                    <p class="info-box_text">{!! $item->alamat !!}</p>
                                </div>
                                <div class="info-box">
                                    <div class="info-box_icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <p class="info-box_text">
                                        <a href="tel:{{ $item->telp }}" class="info-box_link">{{ $item->telp }}</a>
                                    </p>
                                </div>
                                <div class="info-box">
                                    <div class="info-box_icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <p class="info-box_text">
                                        <a href="mailto:help24/7@frutin.com" class="info-box_link">{{ $item->email
                                            }}</a>
                                    </p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row gy-2 align-items-center">
                    @foreach ($config as $item)
                    <div class="col-md-6">
                        <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2023 <a
                                href="{{ url('/') }}">{{ $item->copyright1 }}</a>. All Rights Reserved.</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </footer> --}}

    <div class="footer-top-newsletter">
        <div class="container z-index-common">
            <div class="newsletter-wrap">
                <div class="newsletter-content">
                    @foreach ($config as $item)
                    <div class="email-icon">
                        <img src="{{ asset('galeries/config/favicon/' . $item->favicon) }}" style="width:100px;"
                            alt="Icon">
                    </div>
                    <h4 class="newsletter-title">{{ $item->subtitle }}</h4>
                    @endforeach
                </div>
                {{-- <form class="newsletter-form">
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="Cari Produk" required="">
                    </div>
                    <button type="submit" class="th-btn">Cari</button>
                </form> --}}
            </div>
        </div>
    </div>
    <footer class="footer-wrapper footer-layout3">
        <div class="shape-mockup" data-top="0" data-left="0"><img
                src="{{ asset('template/assets/img/shape/footer_shape_3.png') }}" alt="shape">
        </div>
        <div class="shape-mockup" data-bottom="0" data-right="0"><img
                src="{{ asset('template/assets/img/shape/footer_shape_4.png') }}" alt="shape"></div>
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo">
                                    @foreach ($config as $item)
                                    <a href="{{ url('/') }}">
                                        <img src="{{ asset('galeries/config/logo/' . $item->logo) }}" class="img-fluid"
                                            alt="Frutin">
                                    </a>
                                    @endforeach
                                </div>
                                @foreach ($abouts as $item)
                                <p class="about-text">{!! $item->overview !!}</p>
                                @endforeach
                                <div class="th-social">
                                    @foreach ($contacts as $item)
                                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://wa.me/{{ $item->telp }}"><i class="fab fa-whatsapp"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title"><img
                                    src="{{ asset('template/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Our
                                Services</h3>
                            <div class="menu-all-pages-container">
                                @foreach ($services as $index => $service)
                                <ul class="menu">
                                    @foreach ($service->services as $category)
                                    <li><a href="{{ route('detail.service', ['slug' => $category->slug]) }}">
                                            {{ $category->title }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title"><img
                                    src="{{ asset('template/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Quick
                                Links</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li>
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/about') }}">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/shop') }}">Shop</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/blog') }}">Blog</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/contact') }}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title"><img
                                    src="{{ asset('template/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Contact
                                Us</h3>
                            <div class="th-widget-contact">
                                @foreach ($contacts as $item)
                                <div class="info-box">
                                    <div class="info-box_icon">
                                        <i class="fas fa-location-dot"></i>
                                    </div>
                                    <p class="info-box_text">{!! $item->alamat !!}</p>
                                </div>
                                <div class="info-box">
                                    <div class="info-box_icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <p class="info-box_text">
                                        <a href="tel:{{ $item->telp }}" class="info-box_link">{{ $item->telp }}</a>
                                    </p>
                                </div>
                                <div class="info-box">
                                    <div class="info-box_icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <p class="info-box_text">
                                        <a href="mailto:{{ $item->email }}" class="info-box_link">
                                            {{ $item->email }}
                                        </a>
                                    </p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap" data-bg-src="{{ asset('template/assets/img/bg/copyright_bg_1.png') }}">
            <div class="container">
                <div class="row gy-2 align-items-center">
                    @foreach ($config as $item)
                    <div class="col-md-6">
                        <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2023 <a
                                href="{{ url('/') }}">{{ $item->copyright1 }}</a>. All Rights Reserved.</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </footer>



    <!--********************************
			Code End  Here 
	******************************** -->

    <div class="gtranslate_wrapper"></div>
    <script>
        window.gtranslateSettings = {"default_language":"en","detect_browser_language":true,"languages":["en","id"],"wrapper_selector":".gtranslate_wrapper","alt_flags":{"en":"usa"}}
    </script>
    <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>

    @foreach ($contacts as $item)
    <a href="https://wa.me/{{ $item->telp }}" target="_blank">
        <button class="btn-floating whatsapp">
            <i class="fab fa-whatsapp"></i>
            <span>{{ $item->telp }}</span>
        </button>
    </a>
    @endforeach

    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>

    <!--==============================
    All Js File
============================== -->
    <!-- Jquery -->
    <script src="{{ asset('template/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <!-- Swiper Js -->
    <script src="{{ asset('template/assets/js/swiper-bundle.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('template/assets/js/bootstrap.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('template/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Counter Up -->
    <script src="{{ asset('template/assets/js/jquery.counterup.min.js') }}"></script>
    <!-- Range Slider -->
    <script src="{{ asset('template/assets/js/jquery-ui.min.js') }}"></script>
    <!-- Isotope Filter -->
    <script src="{{ asset('template/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/isotope.pkgd.min.js') }}"></script>

    <!-- Main Js File -->
    <script src="{{ asset('template/assets/js/main.js') }}"></script>





</body>

</html>