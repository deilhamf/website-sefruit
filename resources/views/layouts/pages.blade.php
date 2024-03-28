<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    @foreach ($config as $item)
    <title>{{ $item->title }} | @yield('title')</title>
    <meta name="author" content="{{ $item->title }}">
    <meta name="description" content="{!! $item->meta_description !!}">
    <meta name="keywords" content="{!! $item->meta_keyword !!}">
    @endforeach
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root direcStory -->
    @foreach ($config as $item)
    <link rel="apple-touch-icon" sizes="96x96" href="{{ asset('galeries/config/favicon/' . $item->favicon) }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('galeries/config/favicon/' . $item->favicon) }}">
    @endforeach

    <link rel="manifest" href="{{ asset('template/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('template/assets/img/favicons/ms-icon-144x144.png') }}">
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

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body>

    <!--==============================
Preloader
==============================-->
    <div class="preloader ">
        <button class="th-btn preloaderCls">Batal </button>
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
    @auth
    <div class="sidemenu-wrapper sidemenu-cart d-none d-lg-block ">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget woocommerce widget_shopping_cart">
                <h3 class="widget_title">Keranjang Belanja</h3>
                <div class="widget_shopping_cart_content">
                    <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                        @foreach ($carts as $item)
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="{{ route('detail.product', ['slug' => $item->product->slug]) }}"><img
                                    src="{{ asset('products/' . $item->product->image) }}" alt="Cart Image">{{
                                $item->product->title }}</a>
                            <span class="quantity">{{ $item->quantity }} ×
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">Rp</span>{{ $item->product->price
                                    }}/Kg</span>
                            </span>
                        </li>
                        @endforeach
                    </ul>
                    <p class="woocommerce-mini-cart__total total">
                        <strong>Harga Total:</strong>
                        <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol">Rp</span>
                            {{ $carts->sum(function ($item)
                            {
                            return $item->product->price * $item->quantity;
                            })
                            }}
                        </span>
                    </p>
                    <p class="woocommerce-mini-cart__buttons buttons">
                        <a href="{{ url('pages/cart') }}" class="th-btn wc-forward">Lihat Keranjang</a>
                        <a href="{{ url('/') }}" class="th-btn checkout wc-forward">Checkout</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endauth

    <div class="sidemenu-wrapper sidemenu-info d-none d-lg-block ">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget  ">
                <div class="th-widget-about">
                    @foreach ($config as $item)
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('galeries/config/logo/' . $item->logo) }}" style="width: 60%;" class="mb-3"
                            alt="Frutin">
                    </a>
                    @endforeach
                </div>
                @foreach ($abouts as $item)
                <p class="about-text">{!! $item->overview !!}</p>
                @endforeach
                <div class="th-social">
                    @foreach ($contacts as $con)
                    @foreach ($footers as $item)
                    <a href="{{ $item->fb }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $item->ig }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    @endforeach
                    <a href="https://api.whatsapp.com/send?phone={{ $con->telp }}&text=Halo,%20saya%20ingin%20membeli%20buah,%20apakah%20masih%20ada?"
                        target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="widget  ">
                <h3 class="widget_title">Kontak Kami</h3>
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

    <div class="popup-search-box d-none d-lg-block">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        {{-- <form action="#">
            <input type="text" placeholder="Apa yang kamu cari?">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form> --}}
        <form action="{{ Route('search.product') }}" method="GET">
            @csrf
            <input name="query" type="search" placeholder="Cari nama Produk ..." aria-label="Search">
            <button type="submit"><i class="far fa-search"></i></button>
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
                <ul class="menu">
                    <li>
                        <a href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li>
                        <a href="{{ url('pages/about') }}">Tentang Kami</a>
                    </li>
                    <li>
                        <a href="{{ url('pages/shop') }}">Toko</a>
                    </li>
                    @guest
                    <li class="simple-icon">
                        <a href="{{ url('login') }}">
                            Login
                        </a>
                    </li>
                    @endguest
                    @auth
                    <li class="simple-icon" href="#">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @endauth
                    <li>
                        <a href="{{ url('pages/blog') }}">Artikel</a>
                    </li>
                    <li>
                        <a href="{{ url('pages/contact') }}">Kontak</a>
                    </li>
                    <li>
                        <a href="{{ url('pages/faqs') }}">FAQs</a>
                    </li>
                    <li>
                        <a href="{{ url('pages/terms') }}">Terms & Conditions</a>
                    </li>
                    <li>
                        <a href="{{ url('pages/privacy') }}">Privacy & Policy</a>
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
                                @foreach ($contacts as $con)
                                <li class="d-none d-sm-inline-block">
                                    <i class="fal fa-location-dot"></i>
                                    <a href="#">
                                        {{ $con->alamat }}
                                    </a>
                                </li>
                                <li>
                                    <div class="social-links">
                                        @foreach ($footers as $item)
                                        <a href="{{ $item->fb }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="{{ $item->ig }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                        @endforeach
                                        <a href="https://api.whatsapp.com/send?phone={{ $con->telp }}&text=Halo,%20saya%20ingin%20membeli%20buah,%20apakah%20masih%20ada?"
                                            target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </div>
                                </li>
                                @endforeach
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
                                        <a href="{{ url('/') }}">Beranda</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/about') }}">Tentang Kami</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/shop') }}">Toko</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Artikel</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="{{ url('pages/blog') }}">Blog</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/contact') }}">Kontak</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Informasi</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="{{ url('pages/faqs') }}">FAQs</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('pages/terms') }}">Terms & Conditions</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('pages/privacy') }}">Privacy & Policy</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                            <button type="button" class="th-menu-toggle d-block d-lg-none"><i
                                    class="far fa-bars"></i></button>
                        </div>
                        <div class="col-auto d-none d-xl-block">
                            <div class="header-button">
                                <button type="button" class="simple-icon searchBoxToggler">
                                    <i class="far fa-search"></i>
                                </button>
                                @auth
                                <button type="button" class="simple-icon sideMenuToggler">
                                    <span class="badge">{{ $cartCount }}</span>
                                    <i class="fa-regular fa-cart-shopping"></i>
                                </button>
                                @endauth
                                @guest
                                <button type="button" class="simple-icon">
                                    <a href="{{ url('login') }}">
                                        <i class="fa-regular fa-door-open"></i>
                                    </a>
                                </button>
                                @endguest
                                @auth
                                <button type="button" class="simple-icon" href="#">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <i class="far fa-power-off"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </button>
                                @endauth
                                <button type="button" style="border: none;"
                                    class="icon-btn sideMenuInfo d-none d-lg-block">
                                    <i class="fal fa-grid"></i>
                                </button>
                                <a href="#" class="th-btn style4">Belanja<i class="fas fa-chevrons-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

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
                                @foreach ($footers as $item)
                                <p class="about-text">{!! $item->desc !!}</p>
                                @endforeach
                                <div class="th-social">
                                    @foreach ($contacts as $con)
                                    @foreach ($footers as $item)
                                    <a href="{{ $item->fb }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="{{ $item->ig }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                    @endforeach
                                    <a href="https://api.whatsapp.com/send?phone={{ $con->telp }}&text=Halo,%20saya%20ingin%20membeli%20buah,%20apakah%20masih%20ada?"
                                        target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">
                                <img src="{{ asset('template/assets/img/theme-img/title_icon.svg') }}" alt="Icon">
                                Layanan Kami
                            </h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    @foreach ($services as $index => $service)
                                    @foreach ($service->services as $category)
                                    <li>
                                        <a href="{{ route('detail.service', ['slug' => $category->slug]) }}">
                                            {{ $category->title }}
                                        </a>
                                    </li>
                                    @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">
                                <img src="{{ asset('template/assets/img/theme-img/title_icon.svg') }}" alt="Icon">
                                Navigasi
                            </h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li>
                                        <a href="{{ url('/') }}">Beranda</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/about') }}">Tentang Kami</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/shop') }}">Toko</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/blog') }}">Artikel</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/contact') }}">Kontak</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/faqs') }}">FAQs</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/terms') }}">Terms & Conditions</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('pages/privacy') }}">Privacy & Policy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">
                                <img src="{{ asset('template/assets/img/theme-img/title_icon.svg') }}" alt="Icon">
                                Kontak Kami
                            </h3>
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
                    <div class="col-md-6 text-center text-md-end">
                        <p class="copyright-text">
                            Made with ❤️ by {{ $item->copyright2 }}.
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </footer>

    <div class="gtranslate_wrapper"></div>
    <script>
        window.gtranslateSettings = {"default_language":"en","detect_browser_language":true,"languages":["en","id"],"wrapper_selector":".gtranslate_wrapper","alt_flags":{"en":"usa"}}
    </script>
    <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>

    @foreach ($contacts as $item)
    <a href="https://api.whatsapp.com/send?phone={{ $item->telp }}&text=Halo,%20saya%20ingin%20membeli%20buah,%20apakah%20masih%20ada?"
        target="_blank">
        <button class="btn-floating whatsapp">
            <i class="fab fa-whatsapp"></i>
            <span>Hubungi Kami!</span>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.add-to-cart-link').forEach(function (link) {
                link.addEventListener('click', function () {
                    var productId = link.getAttribute('data-product-id');
                    var form = document.getElementById('add-to-cart-form-' + productId);
                    form.submit();
                });
            });
        });
    </script>

</body>

</html>