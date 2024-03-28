<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard | @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('admin-frontend/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('admin-frontend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin-frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-frontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-frontend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-frontend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-frontend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-frontend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link href="{{ asset('admin-frontend/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('admin-frontend/assets/img/logo.png') }}" alt="">
                <span class="d-none d-lg-block">Sefruit.com</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="GET"
                action="{{ Route('admin.search.product') }}">
                <input type="text" name="query" placeholder="Search Data Produk" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ asset('admin-frontend/assets/img/profile-img.png') }}" alt="Profile"
                            class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name; }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name; }}</h6>
                            <span><code>{{ Auth::user()->email; }}</code></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        {{-- <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li> --}}

                        <li>
                            <a class="dropdown-item d-flex align-items-center text-danger" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Log Out') }}
                                </span>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ (Request::is('/') ? '' : 'collapsed') }}" href="{{ url('/') }}" target="_blank">
                    <i class="bi bi-globe"></i>
                    <span>Website</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ (Request::is('admin') ? '' : 'collapsed') }}" href="{{ url('admin') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Website</li>

            <li class="nav-item">
                <a class="nav-link {{ (Request::is('admin/about', 'admin/about/create', 'admin/about/*/edit', 
                'admin/slider', 'admin/slider/create', 'admin/slider/*/edit', 
                'admin/keunggulan', 'admin/keunggulan/create', 'admin/keunggulan/*/edit', 
                'admin/banner', 'admin/banner/create', 'admin/banner/*/edit', 
                'admin/partner', 'admin/partner/create', 'admin/partner/*/edit', 
                'admin/testi', 'admin/testi/create', 'admin/testi/*/edit', 
                'admin/work', 'admin/work/create', 'admin/work/*/edit', 
                'admin/contact', 'admin/contact/create', 'admin/contact/*/edit') ? '' : 'collapsed') }}"
                    data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Tabel Data</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ url('admin/about/3/edit') }}"
                            class="{{ (Request::is('admin/about', 'admin/about/create', 'admin/about/*/edit') ? 'active' : '') }}">
                            <i class="bi bi-circle"></i><span>Tentang Kami</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/slider') }}"
                            class="{{ (Request::is('admin/slider', 'admin/slider/create', 'admin/slider/*/edit') ? 'active' : '') }}">
                            <i class="bi bi-circle"></i><span>Slider</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/keunggulan') }}"
                            class="{{ (Request::is('admin/keunggulan', 'admin/keunggulan/create', 'admin/keunggulan/*/edit') ? 'active' : '') }}">
                            <i class="bi bi-circle"></i><span>Keunggulan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/banner/2/edit') }}"
                            class="{{ (Request::is('admin/banner', 'admin/banner/create', 'admin/banner/*/edit') ? 'active' : '') }}">
                            <i class="bi bi-circle"></i><span>Banner</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/partner') }}"
                            class="{{ (Request::is('admin/partner', 'admin/partner/create', 'admin/partner/*/edit') ? 'active' : '') }}">
                            <i class="bi bi-circle"></i><span>Mitra Kerja</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/testi') }}"
                            class="{{ (Request::is('admin/testi', 'admin/testi/create', 'admin/testi/*/edit') ? 'active' : '') }}">
                            <i class="bi bi-circle"></i><span>Testimoni</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/work') }}"
                            class="{{ (Request::is('admin/work', 'admin/work/create', 'admin/work/*/edit') ? 'active' : '') }}">
                            <i class="bi bi-circle"></i><span>Kerjasama</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/contact') }}"
                            class="{{ (Request::is('admin/contact', 'admin/contact/create', 'admin/contact/*/edit') ? 'active' : '') }}">
                            <i class="bi bi-circle"></i><span>Kontak</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-heading">Konfigurasi</li>

            <li class="nav-item">
                <a class="nav-link {{ (Request::is('admin/config', 'admin/config/create', 'admin/config/*/edit') ? '' : 'collapsed') }}"
                    href="{{ url('admin/config') }}">
                    <i class="bi bi-gear"></i>
                    <span>Konfigurasi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('admin/footer', 'admin/footer/create', 'admin/footer/*/edit') ? '' : 'collapsed') }}"
                    href="{{ url('admin/footer') }}">
                    <i class="bi bi-gear"></i>
                    <span>Footer</span>
                </a>
            </li>

            <li class="nav-heading">Heading</li>

            <li class="nav-item">
                <a class="nav-link {{ (Request::is('admin/heading-testi', 'admin/heading-testi/create', 'admin/heading-testi/*/edit') ? '' : 'collapsed') }}"
                    href="{{ url('admin/heading-testi') }}">
                    <i class="bi bi-gear"></i>
                    <span>Heading Testi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('admin/heading-benefit', 'admin/heading-benefit/create', 'admin/heading-benefit/*/edit') ? '' : 'collapsed') }}"
                    href="{{ url('admin/heading-benefit') }}">
                    <i class="bi bi-gear"></i>
                    <span>Heading Benefit</span>
                </a>
            </li>

            <li class="nav-heading">Produk</li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#products-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-cart"></i>
                    <span>Data Produk</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="products-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ url('admin/product') }}"
                            class="{{ (Request::is('admin/product', 'admin/product/create', 'admin/product/*/edit') ? 'active' : '') }}">
                            <i class="bi bi-circle"></i><span>List Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/category-product') }}"
                            class="{{ (Request::is('admin/category-product', 'admin/category-product/create', 'admin/category-product/*/edit') ? 'active' : '') }}">
                            <i class="bi bi-circle"></i><span>Data Kategori Produk</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-heading">Berita</li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#blogs-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-chat-left-quote"></i>
                    <span>Data Artikel</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="blogs-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ url('admin/blog') }}"
                            class="{{ (Request::is('admin/blog', 'admin/blog/create', 'admin/blog/*/edit') ? 'active' : '') }}">
                            <i class="bi bi-circle"></i><span>Data Artikel</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/category-blog') }}"
                            class="{{ (Request::is('admin/category-blog', 'admin/category-blog/create', 'admin/category-blog/*/edit') ? 'active' : '') }}">
                            <i class="bi bi-circle"></i><span>Data Kategori Artikel</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-heading">Layanan</li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#services-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-stack"></i>
                    <span>Data Layanan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="services-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ url('admin/service') }}"
                            class="{{ (Request::is('admin/service', 'admin/service/create', 'admin/service/*/edit') ? 'active' : '') }}">
                            <i class="bi bi-circle"></i><span>List Layanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/category-service') }}"
                            class="{{ (Request::is('admin/category-service', 'admin/category-service/create', 'admin/category-service/*/edit') ? 'active' : '') }}">
                            <i class="bi bi-circle"></i><span>Data Kategori Layanan</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-heading">Informasi</li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#infos-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-info-circle"></i>
                    <span>Data Info Web</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="infos-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ url('admin/faqs') }}"
                            class="{{ (Request::is('admin/faqs', 'admin/faqs/create', 'admin/faqs/*/edit') ? 'active' : '') }}">
                            <i class="bi bi-circle"></i><span>Data FAQs</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/terms/1/edit') }}"
                            class="{{ (Request::is('admin/terms', 'admin/terms/create', 'admin/terms/*/edit') ? 'active' : '') }}">
                            <i class="bi bi-circle"></i><span>Data Terms & Conditions</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/privacy/1/edit') }}"
                            class="{{ (Request::is('admin/privacy', 'admin/privacy/create', 'admin/privacy/*/edit') ? 'active' : '') }}">
                            <i class="bi bi-circle"></i><span>Data Privacy & Policy</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span style="color: #0D9276;">Sefruit.com</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Made With ❤️ by <a href="#" style="color: #74E291;">Deilham</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script>
        /**
     * Create an arrow function that will be called when an image is selected.
     */
    const previewImage = (event) => {
        /**
         * Get the selected files.
         */
        const imageFiles = event.target.files;
        /**
         * Count the number of files selected.
         */
        const imageFilesLength = imageFiles.length;
        /**
         * If at least one image is selected, then proceed to display the preview.
         */
        if (imageFilesLength > 0) {
            /**
             * Get the image path.
             */
            const imageSrc = URL.createObjectURL(imageFiles[0]);
            /**
             * Select the image preview element.
             */
            const imagePreviewElement = document.querySelector("#preview-selected-image");
            /**
             * Assign the path to the image preview element.
             */
            imagePreviewElement.src = imageSrc;
            /**
             * Show the element by changing the display value to "block".
             */
            imagePreviewElement.style.display = "block";
        }
    };
    </script>

    <!-- Vendor JS Files -->
    <script src="{{ asset('admin-frontend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin-frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-frontend/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('admin-frontend/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('admin-frontend/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('admin-frontend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('admin-frontend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin-frontend/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('admin-frontend/assets/js/main.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
                $('#img').on('change', function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#gambar-preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files[0]);
                });
            });
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
        .create( document.querySelector( '#task-textarea' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#task-textarea2' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#task-textarea3' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>

</body>

</html>