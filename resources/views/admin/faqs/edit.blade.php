@extends('layouts.admin')

@section('title', 'Edit FAQs Data')

@section('content')
@section('content')
<div class="pagetitle">
    <h1>@yield('title')</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">FAQs Data</li>
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

                    <form class="row g-3" method="post" action="{{ route('faqs.update', $faqs->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6">
                            <label for="question" class="form-label"><i class="bi bi-chat-left-text-fill"></i>
                                Pertanyaan</label>
                            <input class="form-control" name="question" required="required"
                                placeholder="Masukkan question" id="question" value="{{ $faqs->question }}">
                            @error('question')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="answer" class="form-label"><i class="bi bi-chat-left-text-fill"></i>
                                Jawaban</label>
                            <input class="form-control" name="answer" required="required" placeholder="Masukkan answer"
                                id="answer" value="{{ $faqs->answer }}">
                            @error('answer')
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