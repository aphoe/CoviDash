@extends('theme.body')

@section('body')
    <p class="mb-4">All registered users have the same priviledges on <span class="text-primary">{{ config('project.instanceName') }}</span>.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Create new user</h6>
        </div>
        <div class="card-body">
            {!! Form::open(['url' => 'admin/user', 'method' => 'post']) !!}
            @csrf

            @include('partials.backend.user-form')

            <!-- Password field -->
            <div class="form-group input-required">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', ['id'=>'password', 'placeholder'=>'Choose a password', 'class'=>'form-control ' .  ($errors->has('password') ? ' is-invalid' : null)]) }}

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Confirm password field -->
            <div class="form-group input-required">
                {{ Form::label('password_confirmation', 'Confirm password') }}
                {{ Form::password('password_confirmation', ['id'=>'password_confirmation', 'placeholder'=>'Type the chosen password again', 'class'=>'form-control ' .  ($errors->has('password_confirmation') ? ' is-invalid' : null)]) }}

                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button class="btn btn-primary btn-lg" type="submit">
                <i class="fas fa-user"></i>
                Create user account
            </button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
