@extends('layouts.admin')
@section('title')
{{ $page }}
@endsection
@section('content')
<div class="pagetitle">
    <h1>@yield('title')</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
    <div class="row">
        <div class="col-xxl-12 col-md-12">
            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">@yield('title')
                        <span>
                            <a href="{{ route('product.create') }}" class="btn btn-success btn-sm"
                                style="float: right;">Tambah
                                Produk
                            </a>
                        </span>
                    </h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-basket-fill"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $product_count }}</h6>
                            <span class="text-muted small pt-2 ps-1">@yield('title')</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        @if(session()->has('message'))
        <div class="col-xxl-12 col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>
                    <i class="bi bi-check-circle me-1"></i>
                    {{ session('message') }}
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif
        @forelse ($products as $product)
        <div class="col-xxl-6 col-md-6">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('products/' . $product->image) }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }} |
                                <a class="badge bg-{{ ($product->status == 1) ? 'success' : 'danger' }} rounded">{{
                                    ($product->status == 1 ) ? 'Available' : 'Sold Out' }}
                                </a>
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->title }}</h6>
                            <p class="card-text">Rp{{ $product->price }}/kg</p>
                            <p class="card-text">
                                @if($product->status == 1)
                                <a href="{{ url('admin/product/status/' . $product->id) }}"
                                    class="btn btn-danger rounded">Slod Out</a>
                                @else
                                <a href="{{ url('admin/product/status/' . $product->id) }}"
                                    class="btn btn-success rounded">Available</a>
                                @endif
                                <a href="{{ Route('product.edit', $product->id) }}"
                                    class="btn btn-success btn-bg-gradient-x-blue-green box-shadow"><i
                                        class="bi bi-pencil-square"></i></a>
                                <a class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modaldelete({{ $product->id }})" value="{{ $product->id }}"><i
                                        class="bi bi-trash"></i></a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modaldelete({{ $product->id }})" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Anda yakin
                                    akan
                                    menghapus data ini?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ Route('product.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @empty
        <p>Data Kosong</p>
        @endforelse
    </div>

    {{ $products->links('vendor.pagination.admin') }}

    {{-- <div class="col-lg-12">
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>
                <i class="bi bi-check-circle me-1"></i>
                {{ session('message') }}
            </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card">
            <div class="card-body table-responsive-md">
                <h5 class="card-title">@yield('title') <span>| <a href="{{ route('product.create') }}"
                            class="btn btn-outline-primary btn-sm">Tambah Produk</a></span></h5>

                <!-- Table with stripped rows -->
                <table class="table datatable table-responsive-md">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Judul product</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <img src="{{ asset('products/' . $product->image) }}" class="img-fluid" width="100px"
                                    alt="Image">
                            </td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->category->title }}</td>
                            <td>
                                <a href="{{ Route('product.edit', $product->id) }}"
                                    class="btn btn-success btn-bg-gradient-x-blue-green box-shadow"><i
                                        class="bi bi-pencil-square"></i></a>
                                <a class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modaldelete({{ $product->id }})" value="{{ $product->id }}"><i
                                        class="bi bi-trash"></i></a>

                                <div class="modal fade" id="modaldelete({{ $product->id }})" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Anda yakin
                                                    akan
                                                    menghapus data ini?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ Route('product.destroy', $product->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>

    </div> --}}

</section>

@endsection