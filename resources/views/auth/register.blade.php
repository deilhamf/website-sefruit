@extends('layouts.login')

@section('title')
<title>Register Sefruit</title>
@endsection

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm
                                Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<img class="wave" src="{{ asset('logreg/img/wave.png') }}">
<div class="container">
    <div class="img">
        <img src="{{ asset('logreg/img/bg.svg') }}">
    </div>
    <div class="login-content">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <img src="{{ asset('logreg/img/avatar.png') }}" style="margin-bottom: 4px">
            {{-- <h2 class="title" style="font-size: 28px;">Login Admin</h2> --}}

            <div class="input-div one">

                <div class="i">
                    <i class="fas fa-envelope"></i>
                </div>

                <div class="div">
                    <h5>Email</h5>
                    <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>
            <div class="input-div one_name">

                <div class="i">
                    <i class="fas fa-user"></i>
                </div>

                <div class="div">
                    <h5>Nama</h5>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>
            <div class="input-div pass">

                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>

                <div class="div">
                    <h5>Password</h5>
                    <input id="password" type="password" class="input @error('password') is-invalid @enderror"
                        name="password" autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>
            <div class="input-div pass-con">

                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>

                <div class="div">
                    <h5>Konfirmasi Password</h5>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>

            {{-- @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif --}}
            <input type="submit" class="btn" value="Register">

        </form>
    </div>
</div>
@endsection