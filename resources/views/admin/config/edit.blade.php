@extends('layouts.admin')

@section('title', 'Edit Config Data')

@section('content')
@section('content')
<div class="pagetitle">
    <h1>@yield('title')</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">Config Data</li>
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

                    <form class="row g-3" method="post" action="{{ route('config.update', $config->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6">
                            <label for="title" class="form-label"><i class="bi bi-chat-left-text-fill"></i>
                                Judul</label>
                            <input class="form-control" value="{{ $config->title }}" name="title" required="required"
                                placeholder="Masukkan title" id="title">
                            @error('title')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="subtitle" class="form-label"><i class="bi bi-chat-left-text-fill"></i> Sub
                                Judul</label>
                            <input class="form-control" value="{{ $config->subtitle }}" name="subtitle"
                                required="required" placeholder="Masukkan subtitle" id="subtitle">
                            @error('subtitle')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="logo" class="form-label"><i class="bi bi-image-fill"></i> Upload
                                Logo</label>
                            <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                value="{{ old('logo') }}" id="logo" name="logo" placeholder="logo">
                            <img src="{{ asset('galeries/config/logo/' . $config->logo) }}"
                                class="img-preview img-fluid mt-2" id="image-preview" width="90px"
                                style="border-radius: 10px"> @error('logo')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="favicon" class="form-label"><i class="bi bi-image-fill"></i> Upload
                                Favicon</label>
                            <input type="file" class="form-control @error('favicon') is-invalid @enderror"
                                value="{{ old('favicon') }}" id="favicon" name="favicon" placeholder="favicon">
                            <img src="{{ asset('galeries/config/favicon/' . $config->favicon) }}"
                                class="img-preview img-fluid mt-2" id="image-preview" width="90px"
                                style="border-radius: 10px"> @error('favicon')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="breadcrumb" class="form-label"><i class="bi bi-image-fill"></i> Upload
                                Breadcrumb</label>
                            <input type="file" class="form-control @error('breadcrumb') is-invalid @enderror"
                                value="{{ old('breadcrumb') }}" id="breadcrumb" name="breadcrumb"
                                placeholder="breadcrumb">
                            <img src="{{ asset('galeries/config/breadcrumb/' . $config->breadcrumb) }}"
                                class="img-preview img-fluid mt-2" id="image-preview" width="90px"
                                style="border-radius: 10px"> @error('breadcrumb')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="copyright1" class="form-label"><i class="bi bi-chat-left-text-fill"></i>
                                Copyright #1</label>
                            <input class="form-control" value="{{ $config->copyright1 }}" name="copyright1"
                                required="required" placeholder="Masukkan Copyright" id="copyright1">
                            @error('copyright1')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="copyright1" class="form-label"><i class="bi bi-chat-left-text-fill"></i>
                                Copyright #2</label>
                            <input class="form-control" value="{{ $config->copyright2 }}" name="copyright2"
                                required="required" placeholder="Masukkan Copyright" id="copyright2">
                            @error('copyright2')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="meta_keyword" class="form-label"><i class="bi bi-chat-left-text-fill"></i>
                                Meta Keyword</label>
                            <textarea type="text" id="task-textarea" class="form-control" id="meta_keyword"
                                name="meta_keyword" placeholder="Masukkan Keyword">
                                {{ $config->meta_keyword }}
                                </textarea>
                            @error('meta_keyword')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="meta_description" class="form-label"><i class="bi bi-chat-left-text-fill"></i>
                                Meta Description</label>
                            <textarea type="text" id="task-textarea2" class="form-control" id="meta_description"
                                name="meta_description" placeholder="Masukkan Deskripsi">
                                {{ $config->meta_description }}
                                </textarea>
                            @error('meta_description')
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