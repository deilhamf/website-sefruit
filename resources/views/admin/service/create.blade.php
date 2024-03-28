@extends('layouts.admin')

@section('title')
{{ $page }}
@endsection

@section('content')

<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Service Form</h5>

            <!-- Horizontal Form -->
            <form class="row g-3" method="POST" action="{{ Route('service.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="title" class="form-label">Judul service</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}" id="title" placeholder="Masukkan judul service">
                    @error('title')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
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
                    <label for="overview" class="form-label">Overview</label>
                    <textarea type="text" name="overview" class="form-control @error('overview') is-invalid @enderror"
                        value="{{ old('overview') }}" id="overview" placeholder="Masukkan deskripsi service"></textarea>
                    @error('overview')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="desc" class="form-label">Deskripsi</label>
                    <textarea type="text" name="desc" id="task-textarea"
                        class="form-control @error('desc') is-invalid @enderror" value="{{ old('desc') }}"
                        placeholder="Masukkan deskripsi service"></textarea>
                    @error('desc')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                        value="{{ old('image') }}" id="image">
                    <img src="" class="img-preview img-fluid mt-2" id="image-preview" width="100px">
                    @error('image')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="icon" class="form-label">Icon</label>
                    <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror"
                        value="{{ old('icon') }}" id="icon">
                    <img src="" class="img-preview img-fluid mt-2" id="images-preview" width="100px">
                    @error('icon')
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
                    <a href="{{ Route('service.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form><!-- End Horizontal Form -->

        </div>
    </div>

</div>

@endsection