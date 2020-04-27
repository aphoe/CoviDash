<!-- Full name field -->
<div class="form-group input-required">
    {{ Form::label('name', 'Full name') }}
    {{ Form::text('name', old('name'), ['id'=>'name', 'placeholder'=>'Full name of new user', 'class'=>'form-control ' .  ($errors->has('name') ? ' is-invalid' : null)]) }}

    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Email address field -->
<div class="form-group input-required">
    {{ Form::label('email', 'Email address') }}
    {{ Form::text('email', old('email'), ['id'=>'email', 'placeholder'=>'Emaill address', 'class'=>'form-control ' .  ($errors->has('email') ? ' is-invalid' : null)]) }}

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
