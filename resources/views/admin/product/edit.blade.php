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
            <form class="row g-3" method="POST" action="{{ Route('product.update', $product->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-4">
                    <label for="title" class="form-label">Judul Product</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $product->title) }}" id="title" placeholder="Masukkan judul product">
                    @error('title')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="price" class="form-label">Harga Product</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price', $product->price) }}" id="price" placeholder="Masukkan judul product">
                    @error('price')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select type="text" class="form-control @error('category_id') is-invalid @enderror"
                        value="{{ old('category_id', $product->category_id) }}" id="category_id" name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) ==
                            $category->id ?
                            'selected' : null }} >{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="image" class="form-label">Gambar Produk</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                        value="{{ old('image', $product->image) }}" id="image">
                    <img src="{{ asset('products/' . $product->image) }}" class="img-preview img-fluid mt-2"
                        id="image-preview" width="100px">
                    @error('image')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="overview" class="form-label">Overview</label>
                    <textarea type="text" name="overview" class="form-control @error('overview') is-invalid @enderror"
                        value="{{ old('overview', $product->overview) }}" id="overview"
                        placeholder="Masukkan deskripsi product">{{ old('overview', $product->overview) }}</textarea>
                    @error('overview')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="desc" class="form-label">Deskripsi</label>
                    <textarea type="text" name="desc" class="form-control @error('desc') is-invalid @enderror"
                        value="{{ old('desc', $product->desc) }}" id="task-textarea"
                        placeholder="Masukkan deskripsi product">{{ old('desc', $product->desc) }}</textarea>
                    @error('desc')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="keyword" class="form-label">Meta Keyword</label>
                    <textarea type="text" name="keyword" class="form-control @error('keyword') is-invalid @enderror"
                        value="{{ old('keyword', $product->keyword) }}" id="keyword"
                        placeholder="Masukkan judul product">{{ old('keyword', $product->keyword) }}</textarea>
                    @error('keyword')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="tags" class="form-label">Meta Tags</label>
                    <textarea type="text" name="tags" class="form-control @error('tags') is-invalid @enderror"
                        value="{{ old('tags', $product->tags) }}" id="tags"
                        placeholder="Masukkan judul product">{{ old('tags', $product->tags) }}</textarea>
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