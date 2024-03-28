@extends('layouts.admin')
@section('title')
{{ $page }}
@endsection
@section('content')


<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Category product Form</h5>

            <!-- Horizontal Form -->
            <form class="row g-3" method="POST" action="{{ Route('category-product.update', $category->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <label for="title" class="form-label">Nama</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $category->title) }}" id="title" placeholder="Masukkan Kategori">
                    @error('title')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="icon" class="form-label">Icon</label>
                    <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror"
                        value="{{ old('icon', $category->icon) }}" id="icon">
                    <img src="{{ asset('products/icon/' . $category->icon) }}" class="img-preview img-fluid mt-2"
                        id="image-preview" width="100px">
                    @error('icon')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ Route('category-product.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form><!-- End Horizontal Form -->

        </div>
    </div>

</div>

@endsection