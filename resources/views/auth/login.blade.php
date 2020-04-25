@extends('theme.auth')

@php
    $title = 'Welcome Back!';
    $metaDesc = 'Login to admin account on ' . config('project.instanceName');
    $bodyClass = 'bg-gradient-primary';
    $authClass = 'bg-login-image';
@endphp

@section('auth')
    <form method="POST" action="{{ route('login') }}" class="user">
        @csrf

        <div class="form-group">
            <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus aria-describedby="emailHelp" placeholder="Enter Email Address...">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>

        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
            {{ __('Login') }}
        </button>

        <hr>
        @if (Route::has('password.request'))
        <div class="text-center">
            <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
        </div>
        @endif
        @if (Route::has('register'))
        <div class="text-center">
            <a href="{{ route('register') }}">Create an Account!</a>
        </div>
        @endif
    </form>
@endsection
