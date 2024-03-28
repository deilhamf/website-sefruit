@extends('layouts.admin')

@section('title', 'Edit Contact Data')

@section('content')
@section('content')
<div class="pagetitle">
    <h1>@yield('title')</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">Contact Data</li>
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

                    <form class="row g-3" method="post" action="{{ route('contact.update', $contact->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6">
                            <label for="alamat" class="form-label"><i class="bi bi-map"></i>
                                Alamat</label>
                            <textarea type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="Masukkan Alamat">{!! $contact->alamat !!}
                                </textarea>
                            @error('alamat')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="map" class="form-label"><i class="bi bi-map"></i>
                                Link Map</label>
                            <textarea type="text" class="form-control" id="map" name="map" placeholder="Masukkan map">{!! $contact->map !!}
                                </textarea>
                            @error('map')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="telp" class="form-label"><i class="bi bi-telephone-plus"></i>
                                Telepon</label>
                            <input class="form-control" name="telp" type="number" required="required"
                                placeholder="Masukkan Nomor Telp" id="telp" value="{{ $contact->telp }}">
                            @error('telp')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label"><i class="bi bi-envelope"></i>
                                Email</label>
                            <input class="form-control" name="email" type="email" required="required"
                                placeholder="Masukkan Email" id="email" value="{{ $contact->email }}">
                            @error('email')
                            <div class="invalid invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="jam_kerja" class="form-label"><i class="bi bi-clock"></i>
                                Jam Kerja</label>
                            <textarea type="text" id="task-textarea3" class="form-control" id="jam_kerja"
                                name="jam_kerja" placeholder="Masukkan Jam Kerja">{!! $contact->jam_kerja !!}
                                </textarea>
                            @error('jam_kerja')
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