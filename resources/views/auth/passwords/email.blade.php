@extends('theme.auth')

@php
    $title = __('Forgot Your Password?');
    $metaDesc = 'Reset password on ' . config('project.instanceName');
    $bodyClass = 'bg-gradient-primary';
    $authClass = 'bg-password-image';
@endphp

@section('auth')
    <p class="mb-4 text-center">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="user">
        @csrf

        <div class="form-group">
            <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="Enter Email Address...">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block">
            {{ __('Send Password Reset Link') }}
        </button>
        <hr>
        @if (Route::has('register'))
        <div class="text-center">
            <a href="{{ route('register') }}">Create an Account!</a>
        </div>
        @endif
        <div class="text-center">
            <a href="{{ route('login') }}">Already have an account? Login!</a>
        </div>
    </form>
@endsection
