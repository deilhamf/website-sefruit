@extends('layouts.admin')

@section('title', 'Add Privacy Data')

<style>
    .form-label {
        text-transform: bold;
    }
</style>

@section('content')
<div class="pagetitle">
    <h1>@yield('title')</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">Privacy Data</li>
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

                    <form class="row g-3" method="POST" action="{{ route('privacy.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-6">
                            <label for="title" class="form-label"><i class="bi bi-chat-left-text-fill"></i>
                                Title</label>
                            <input class="form-control" name="title" required="required" placeholder="Masukkan title"
                                id="title">
                            @error('title')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="subtitle" class="form-label"><i class="bi bi-chat-left-text-fill"></i>
                                Subtitle</label>
                            <input class="form-control" name="subtitle" required="required"
                                placeholder="Masukkan subtitle" id="subtitle">
                            @error('subtitle')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="desc" class="form-label">Deskripsi</label>
                            <textarea type="text" name="desc" class="form-control @error('desc') is-invalid @enderror"
                                value="{{ old('desc') }}" id="task-textarea"
                                placeholder="Masukkan deskripsi"></textarea>
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