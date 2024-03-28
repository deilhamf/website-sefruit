@extends('layouts.admin')

@section('title', 'Footer Data')

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
                    <h5 class="card-title">@yield('title')</h5>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                {{-- <th scope="col">Subtitle</th> --}}
                                <th scope="col">FB</th>
                                <th scope="col">IG</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($footers as $p)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $p->title }}</td>
                                {{-- <td>{{ $p->subtitle }}</td> --}}
                                <td>{{ $p->fb }}</td>
                                <td>{{ $p->ig }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-1">
                                        <a class="btn btn-primary btn-sm rounded"
                                            href="{{ route('footer.edit', $p->id) }}"><i class="bi bi-pencil-fill"></i>
                                            Edit</a>
                                    </div>
                                </td>
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