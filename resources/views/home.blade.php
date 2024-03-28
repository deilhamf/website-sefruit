@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="pagetitle">
    <h1>{{ __('Dashboard') }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Admin</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">

    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
        <i class="bi bi-emoji-wink-fill me-1"></i>
        {{ $ucapan }}, <strong>{{ Auth::user()->name; }}</strong>!
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @if(session()->has('message'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>
            <i class="bi bi-check-circle me-1"></i>
            {{ session('message') }}
        </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row">

        <!-- Left side columns -->
        {{-- COUNTER --}}
        <div class="col-lg-6">
            <div class="row">

                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Admin <span>| Web Admin</span></h5>

                            <div class="d-flex align-items-center">

                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person-fill-gear"></i>
                                </div>

                                <div class="ps-3">
                                    <h6>{{ $admin_count }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Administrator</span>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card customers-card">

                        <div class="card-body">
                            <h5 class="card-title">Produk <span>| Produk Kami</span></h5>

                            <div class="d-flex align-items-center">

                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-basket-fill"></i>
                                </div>

                                <div class="ps-3">
                                    <h6>{{ $product_count }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Produk</span>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card heart-card">

                        <div class="card-body">
                            <h5 class="card-title">Layanan <span>| Layanan Kami</span></h5>

                            <div class="d-flex align-items-center">

                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-box2-heart-fill"></i>
                                </div>

                                <div class="ps-3">
                                    <h6>{{ $service_count }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Layanan</span>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card purp-card">

                        <div class="card-body">
                            <h5 class="card-title">Blog <span>| Postingan Berita</span></h5>

                            <div class="d-flex align-items-center">

                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-chat-left-quote-fill"></i>
                                </div>

                                <div class="ps-3">
                                    <h6>{{ $blog_count }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Blog</span>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card pink-card">

                        <div class="card-body">
                            <h5 class="card-title">Slider <span>| Slider Web</span></h5>

                            <div class="d-flex align-items-center">

                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-grid-3x2-gap-fill"></i>
                                </div>

                                <div class="ps-3">
                                    <h6>{{ $slider_count }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Slider</span>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-6">

            <div class="col-xxl-12 col-md-12">
                <div class="card info-card revenue-card">

                    <div class="card-body">
                        <h5 class="card-title">Hit Visitor <span>| Web Visitor</span></h5>

                        <div class="d-flex align-items-center">

                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-eye-fill"></i>
                            </div>

                            <div class="ps-3">
                                @foreach ($visitorCount as $item)
                                <h6>{{ $item->count }}</h6>
                                @endforeach
                                <span class="text-muted small pt-2 ps-1">Pengunjung</span>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <h5 class="card-title">Data Administrator <span>| Admin Table</span></h5>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                {{-- <th scope="col">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td class="text-primary">{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                {{-- <td>
                                    <div class="d-flex align-items-center gap-1">
                                        <a class="btn btn-success rounded-circle text-light btn-sm" href="">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <a class="btn btn-warning text-light rounded-circle text-light btn-sm" href="">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                    </div>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div><!-- End Right side columns -->

    </div>
</section>
@endsection