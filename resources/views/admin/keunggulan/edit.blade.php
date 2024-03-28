@extends('layouts.admin')

@section('title', 'Edit Why Choose Us Data')

@section('content')
@section('content')
<div class="pagetitle">
    <h1>@yield('title')</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">Why Choose Us Data</li>
            <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form @yield('title')</h5>

                    <form class="row g-3" method="post" action="/admin/keunggulan/{{$unggul->id}}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-md-4">
                            <label for="judul" class="form-label"><i class="bi bi-chat-left-text-fill"></i>
                                Title</label>
                            <input class="form-control" name="judul" required="required" placeholder="Masukkan Judul"
                                id="judul" value="{{ $unggul->judul }}">
                            @error('judul')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="image" class="form-label"><i class="bi bi-image-fill"></i> Upload Gambar</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                value="{{ old('image') }}" id="image" name="image" placeholder="image">
                            @error('image')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <img src="{{ asset('galeries/keunggulan/' . $unggul->image) }}"
                                class="img-preview img-fluid mt-2" id="image-preview" width="150px"
                                style="border-radius: 10px" alt="Preview Gambar">
                        </div>

                        <div class="col-md-12">
                            <label for="desk" class="form-label"><i class="bi bi-chat-left-text-fill"></i>
                                Deskripsi</label>
                            <textarea type="text" id="task-textarea" class="form-control" id="desk" name="desk"
                                placeholder="Masukkan Deskripsi">{{ $unggul->desk }}
                                </textarea>
                            @error('desk')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="text-center">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-outline-primary"><i class="bi bi-check-circle"></i>
                                    Submit
                                    Form</button>
                                <button type="reset" class="btn btn-outline-secondary"><i
                                        class="bi bi-arrow-repeat"></i>
                                    Reset</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>
    </div>
</section>
@endsection