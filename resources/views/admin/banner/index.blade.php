@extends('layouts.admin')

@section('title', 'Banner Data')

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

        <!-- Right side columns -->
        <div class="col-lg-12">

            @if(session()->has('pesan'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>
                    <i class="bi bi-check-circle me-1"></i>
                    {{ session('pesan') }}
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <!-- Recent Sales -->
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <h5 class="card-title">@yield('title') <span>| Banner Table<span></h5>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Desc</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banner as $p)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><img src="{{ asset('galeries/banner/' . $p->image) }}" class="img-fluid"
                                        style="width: 90px; height: auto; border-radius: 10px;" alt="Gambar"></td>
                                <td>{{ $p->judul }}</td>
                                <td>{!! $p->desk !!}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-1">
                                        <a class="btn btn-primary btn-sm rounded-circle"
                                            href="{{ url('/admin/banner/' . $p->id . '/edit') }}">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <form action="{{ url('/admin/banner/' . $p->id) }}" method="post"
                                            class="d-inline">
                                            @csrf

                                            <!-- Fitur Security yang berfungsi supaya tidak page expired -->
                                            @method('delete')
                                            <button onclick="handleDelete({{ $p->id }})" type="button"
                                                data-bs-toggle="modal" data-bs-target="#danger" value="{{ $p->id }}"
                                                class="btn btn-danger btn-sm" style="border-radius: 25px;">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <form action="{{ url('/banner/{id}') }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <div class="modal fade" id="danger" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin Mau Hapus Data?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" style="border-radius: 25px;"
                                            class="btn text-white btn-secondary btn-sm"
                                            data-bs-dismiss="modal">Close</button>
                                        <a id="deleteLink" type="submit" style="border-radius: 25px;"
                                            class="btn text-white btn-danger btn-sm" name="simpan"
                                            value="danger">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Basic Modal-->
                            
                    </form>

                </div>

            </div>

        </div><!-- End Right side columns -->

    </div>
</section>

<script>
    function handleDelete(id)
        {
            var link = document.getElementById('deleteLink')

            link.href = "{{ URL::to('delete-banner') }}/" + id
            $('#danger').modal('show')
        }
</script>

@endsection