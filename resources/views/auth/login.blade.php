@extends('layouts.login')

@section('title')
<title>Login Sefruit</title>
@endsection

@section('content')
<img class="wave" src="{{ asset('logreg/img/wave.png') }}">
<div class="container">
    <div class="img">
        <img src="{{ asset('logreg/img/bg.svg') }}">
    </div>
    <div class="login-content">
        <form method="POST" action="{{ route('login') }}">
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
                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>

            </div>
            <div class="input-div pass">

                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>

                <div class="div">
                    <h5>Password</h5>
                    <input id="password" type="password" class="input @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">

                </div>

            </div>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            {{-- @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif --}}
            <input type="submit" class="btn" value="Login">

        </form>
    </div>
</div>
@endsection