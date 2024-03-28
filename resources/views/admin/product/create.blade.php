@extends('layouts.admin')
@section('title')
{{ $page }}
@endsection
@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Product Form</h5>

            <!-- Horizontal Form -->
            <form class="row g-3" method="POST" action="{{ Route('product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-4">
                    <label for="title" class="form-label">Judul Produk</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}" id="title" placeholder="Masukkan Judul Produk">
                    @error('title')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="price" class="form-label">Harga Produk</label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price') }}" id="price" placeholder="Masukkan Harga Produk">
                    @error('price')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select type="text" class="form-control @error('category_id') is-invalid @enderror"
                        value="{{ old('category_id') }}" id="category_id" name="category_id">
                        @foreach ($categories as $category)
                        <option hidden selected value="{{ old('category_id') }}">-- Pilih Kategori --</option>
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="image" class="form-label">Gambar Produk</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                        value="{{ old('image') }}" id="image">
                    <img src="" class="img-preview img-fluid mt-2" id="image-preview" width="100px">
                    @error('image')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="overview" class="form-label">Overview</label>
                    <textarea type="text" name="overview" class="form-control @error('overview') is-invalid @enderror"
                        value="{{ old('overview') }}" id="overview" placeholder="Masukkan deskripsi Produk"></textarea>
                    @error('overview')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="desc" class="form-label">Deskripsi</label>
                    <textarea type="text" name="desc" class="form-control @error('desc') is-invalid @enderror"
                        value="{{ old('desc') }}" id="task-textarea" placeholder="Masukkan deskripsi Produk"></textarea>
                    @error('desc')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="keyword" class="form-label">Meta Keyword</label>
                    <textarea type="text" name="keyword" class="form-control @error('keyword') is-invalid @enderror"
                        value="{{ old('keyword') }}" id="keyword" placeholder="Masukkan meta keyword"></textarea>
                    @error('keyword')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="tags" class="form-label">Meta Tags</label>
                    <textarea type="text" name="tags" class="form-control @error('tags') is-invalid @enderror"
                        value="{{ old('tags') }}" id="tags" placeholder="Masukkan meta tag"></textarea>
                    @error('tags')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ Route('product.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form><!-- End Horizontal Form -->

        </div>
    </div>

</div>
@endsection