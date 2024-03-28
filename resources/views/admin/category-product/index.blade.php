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
<section class="section">
    <div class="row">
        <div class="col-lg-12">

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
                    {{-- @if(session()->has('message'))
                    <div class="alert alert-success color-success-dismissible fade show"><i
                            class="bi bi-check-circle"></i> {{ session('message')}}</div>
                    @endif --}}
                    <h5 class="card-title">@yield('title')
                        <span>|
                            <a href="{{ route('category-product.create') }}"
                                class="btn btn-outline-primary btn-sm">Tambah
                                Kategori Produk
                            </a>
                        </span>
                    </h5>

                    <!-- Table with stripped rows -->
                    <table class="table datatable table-responsive-md">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Icon</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <img src="{{ asset('products/icon/' . $category->icon) }}" class="img-fluid"
                                        width="100px" alt="Image">
                                </td>
                                <td>{{ $category->title }}</td>
                                <td>
                                    <a href="{{ Route('category-product.edit', $category->id) }}"
                                        class="btn btn-success btn-bg-gradient-x-blue-green box-shadow"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <a class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modaldelete({{ $category->id }})"
                                        value="{{ $category->id }}"><i class="bi bi-trash"></i></a>

                                    <div class="modal fade" id="modaldelete({{ $category->id }})" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin akan
                                                        menghapus data ini?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn text-white btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <form
                                                        action="{{ Route('category-product.destroy', $category->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn text-white btn-danger"
                                                            type="submit">Hapus</button>
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

        </div>
    </div>
</section>

@endsection