@extends('theme.body')

@section('body')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Update details</h6>
        </div>
        <div class="card-body">
            {!! Form::model($user, ['url' => 'profile/setting/user', 'method' => 'put']) !!}
            @csrf

            <!-- Full name field -->
            <div class="form-group input-required">
                {{ Form::label('name', 'Full name') }}
                {{ Form::text('name', old('name'), ['id'=>'name', 'placeholder'=>'Enter your name', 'class'=>'form-control ' .  ($errors->has('name') ? ' is-invalid' : null)]) }}

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button class="btn btn-primary btn-lg" type="submit">
                <i class="fas fa-user"></i>
                Update details
            </button>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Change password</h6>
        </div>
        <div class="card-body">
            {!! Form::model($user, ['url' => 'profile/setting/password', 'method' => 'put']) !!}
            @csrf

            <!-- Current password field -->
            <div class="form-group input-required">
                {{ Form::label('current_password', 'Current password') }}
                {{ Form::password('current_password', ['id'=>'current_password', 'placeholder'=>'Enter your current password', 'class'=>'form-control ' .  ($errors->has('current_password') ? ' is-invalid' : null)]) }}

                @error('current_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- New password field -->
            <div class="form-group input-required">
                {{ Form::label('password', 'New password') }}
                {{ Form::password('password', ['id'=>'password', 'placeholder'=>'Enter new password', 'class'=>'form-control ' .  ($errors->has('password') ? ' is-invalid' : null)]) }}

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Confirm new passwords field -->
            <div class="form-group input-required">
                {{ Form::label('password_confirmation', 'Confirm new passwords') }}
                {{ Form::password('password_confirmation', ['id'=>'password_confirmation', 'placeholder'=>'Enter new password again', 'class'=>'form-control ' .  ($errors->has('password_confirmation') ? ' is-invalid' : null)]) }}

                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button class="btn btn-primary btn-lg" type="submit">
                <i class="fas fa-key"></i>
                Change password
            </button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
