@extends('layouts.ADMIN')

@section('title')
{{ $page }}
@endsection

@section('content')


<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Service Form</h5>

            <!-- Horizontal Form -->
            <form class="row g-3" method="POST" action="{{ Route('service.update', $service->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <label for="title" class="form-label">Judul Layanan</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $service->title) }}" id="title" placeholder="Masukkan judul service">
                    @error('title')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select type="text" class="form-control @error('category_id') is-invalid @enderror"
                        value="{{ old('category_id', $service->category_id) }}" id="category_id" name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $service->category_id) ==
                            $category->id ?
                            'selected' : null }} >{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="overview" class="form-label">Overview</label>
                    <textarea type="text" name="overview" class="form-control @error('overview') is-invalid @enderror"
                        value="{{ old('overview', $service->overview) }}" id="overview"
                        placeholder="Masukkan deskripsi service">{{ old('overview', $service->overview) }}</textarea>
                    @error('overview')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="desc" class="form-label">Deskripsi</label>
                    <textarea type="text" name="desc" id="task-textarea"
                        class="form-control @error('desc') is-invalid @enderror"
                        value="{{ old('desc', $service->desc) }}"
                        placeholder="Masukkan deskripsi service">{{ old('desc', $service->desc) }}</textarea>
                    @error('desc')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                        value="{{ old('image', $service->image) }}" id="image">
                    <img src="{{ asset('services/' . $service->image) }}" class="img-preview img-fluid mt-2"
                        id="image-preview" width="100px">
                    @error('image')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="icon" class="form-label">Icon</label>
                    <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror"
                        value="{{ old('icon', $service->icon) }}" id="icon">
                    <img src="{{ asset('services/icon/' . $service->icon) }}" class="img-preview img-fluid mt-2"
                        id="image-preview" width="100px">
                    @error('icon')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="keyword" class="form-label">Meta Keyword</label>
                    <textarea type="text" name="keyword" class="form-control @error('keyword') is-invalid @enderror"
                        value="{{ old('keyword', $service->keyword) }}" id="keyword"
                        placeholder="Masukkan tag service">{{ old('keyword', $service->keyword) }}</textarea>
                    @error('keyword')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="tags" class="form-label">Meta Tags</label>
                    <textarea type="text" name="tags" class="form-control @error('tags') is-invalid @enderror"
                        value="{{ old('tags', $service->tags) }}" id="tags"
                        placeholder="Masukkan tag service">{{ old('tags', $service->tags) }}</textarea>
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