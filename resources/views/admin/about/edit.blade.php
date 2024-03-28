@extends('layouts.admin')

@section('title', 'Edit Data About')

@section('content')
@section('content')
<div class="pagetitle">
    <h1>@yield('title')</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">Data About</li>
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

                    <form class="row g-3" method="post" action="{{ url('/admin/about/' . $about->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-md-4">
                            <label for="title" class="form-label"><i class="bi bi-chat-left-text-fill"></i>
                                Judul</label>
                            <input class="form-control" name="title" required="required" placeholder="Masukkan title"
                                id="title" value="{{ $about->title }}">
                            @error('title')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="subtitle" class="form-label"><i class="bi bi-chat-left-text-fill"></i> Sub
                                Judul</label>
                            <input class="form-control" name="subtitle" required="required"
                                placeholder="Masukkan subtitle" id="subtitle" value="{{ $about->subtitle }}">
                            @error('subtitle')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="tahun" class="form-label"><i class="bi bi-chat-left-text-fill"></i>
                                Tahun</label>
                            <input class="form-control" type="number" name="tahun" required="required"
                                placeholder="Masukkan tahun" id="tahun" value="{{ $about->tahun }}">
                            @error('tahun')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="image" class="form-label"><i class="bi bi-image-fill"></i> Upload Gambar</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                value="{{ old('image') }}" id="image" name="image" placeholder="image">
                            @error('image')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('galeries/about/' . $about->image) }}" class="img-preview img-fluid mt-2"
                                id="image-preview" width="150px" style="border-radius: 10px" alt="Preview Gambar">
                        </div>

                        <div class="col-md-6">
                            <label for="image2" class="form-label"><i class="bi bi-image-fill"></i> Upload
                                Gambar</label>
                            <input type="file" class="form-control @error('image2') is-invalid @enderror"
                                value="{{ old('image2') }}" id="image2" name="image2" placeholder="image2">
                            @error('image2')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('galeries/about/' . $about->image2) }}"
                                class="img-preview img-fluid mt-2" id="image-preview" width="150px"
                                style="border-radius: 10px" alt="Preview Gambar">
                        </div>

                        <div class="col-md-6">
                            <label for="image3" class="form-label"><i class="bi bi-image-fill"></i> Upload
                                Gambar</label>
                            <input type="file" class="form-control @error('image3') is-invalid @enderror"
                                value="{{ old('image3') }}" id="image3" name="image3" placeholder="image3">
                            @error('image3')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('galeries/about/' . $about->image3) }}"
                                class="img-preview img-fluid mt-2" id="image-preview" width="150px"
                                style="border-radius: 10px" alt="Preview Gambar">
                        </div>

                        <div class="col-md-6">
                            <label for="overview" class="form-label"><i class="bi bi-chat-left-text-fill"></i>
                                Overview</label>
                            <textarea type="text" id="task-textarea" class="form-control" id="overview" name="overview"
                                placeholder="Masukkan Overview">
                                {!! $about->overview !!}
                            </textarea>
                            @error('overview')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="desc" class="form-label"><i class="bi bi-chat-left-text-fill"></i>
                                Deskripsi</label>
                            <textarea type="text" id="task-textarea2" class="form-control" id="desc" name="desc"
                                placeholder="Masukkan desc">
                                {!! $about->desc !!}
                            </textarea>
                            @error('desc')
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