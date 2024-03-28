@extends('layouts.admin')
@section('title')
{{ $page }}
@endsection
@section('content')


<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Category service Form</h5>

            <!-- Horizontal Form -->
            <form class="row g-3" method="POST" action="{{ Route('category-service.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <label for="title" class="form-label">Nama</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}" id="title" placeholder="Masukkan Kategori">
                    @error('title')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ Route('category-service.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form><!-- End Horizontal Form -->

        </div>
    </div>

</div>

@endsection