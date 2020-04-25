@extends('theme.auth')

@php
    $title = __('Reset Password');
    $metaDesc = 'Reset password on ' . config('project.instanceName');
    $bodyClass = 'bg-gradient-primary';
    $authClass = 'bg-password-image';
@endphp

@section('auth')
    <form method="POST" action="{{ route('password.update') }}" class="user">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email address">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Choose new password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input id="password-confirm" type="password" class="form-control  form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block">
            {{ __('Reset Password') }}
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
