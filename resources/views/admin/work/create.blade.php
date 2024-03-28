@extends('layouts.admin')

@section('title')
{{ $page }}
@endsection

@section('content')


<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Works Form</h5>

            <!-- Horizontal Form -->
            <form class="row g-3" method="POST" action="{{ Route('work.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="title" class="form-label">Judul work</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}" id="title" placeholder="Masukkan judul work">
                    @error('title')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="desc" class="form-label">Deskripsi</label>
                    <textarea type="text" name="desc" class="form-control @error('desc') is-invalid @enderror"
                        value="{{ old('desc') }}" id="task-textarea" placeholder="Masukkan deskripsi work"></textarea>
                    @error('desc')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                        value="{{ old('image') }}" id="image">
                    <img src="" class="img-preview img-fluid mt-2" id="image-preview" width="100px">
                    @error('image')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="icon" class="form-label">Icon</label>
                    <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror"
                        value="{{ old('icon') }}" id="icon">
                    <img src="" class="img-preview img-fluid mt-2" id="image-preview" width="100px">
                    @error('icon')
                    <div class="invalid invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ Route('work.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form><!-- End Horizontal Form -->

        </div>
    </div>

</div>

@endsection