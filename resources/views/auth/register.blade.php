@extends('theme.auth')

@php
    $title = 'Create an Account!';
    $metaDesc = 'Login to admin account on ' . config('project.instanceName');
    $bodyClass = 'bg-gradient-primary';
    $authClass = 'bg-register-image';
@endphp

@section('auth')
    <form method="POST" action="{{ route('register') }}" class="user">
        @csrf

        <div class="form-group ">
            <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="full name">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Choose a password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Type chosen password again">
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block">
            {{ __('Register') }}
        </button>

        <hr>
        <div class="text-center">
            <a href="{{ route('login') }}">Already have an account? Login!</a>
        </div>
    </form>
@endsection
