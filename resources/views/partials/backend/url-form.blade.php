<!-- Title field -->
<div class="form-group input-required">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', old('title'), ['id'=>'title', 'placeholder'=>'External link title', 'class'=>'form-control ' .  ($errors->has('title') ? ' is-invalid' : null)]) }}

    @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Description field -->
<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::text('description', old('description'), ['id'=>'description', 'placeholder'=>'Short description', 'class'=>'form-control ' .  ($errors->has('description') ? ' is-invalid' : null)]) }}

    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Web link field -->
<div class="form-group input-required">
    {{ Form::label('url', 'Web link') }}
    {{ Form::text('url', old('url'), ['id'=>'url', 'placeholder'=>'Web link or URL', 'class'=>'form-control ' .  ($errors->has('url') ? ' is-invalid' : null)]) }}

    @error('url')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

