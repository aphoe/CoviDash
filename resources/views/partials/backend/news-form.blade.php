<!-- Date field -->
<div class="form-group input-required">
    {{ Form::label('date', 'Date') }}
    {{ Form::text('date', old('date'), ['id'=>'date', 'placeholder'=>'Date of news', 'class'=>'form-control flatpickr-date ' .  ($errors->has('date') ? ' is-invalid' : null)]) }}

    @error('date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Source field -->
<div class="form-group">
    {{ Form::label('source', 'Source') }}
    {{ Form::text('source', old('source'), ['id'=>'source', 'placeholder'=>'Source of news', 'class'=>'form-control ' .  ($errors->has('source') ? ' is-invalid' : null)]) }}

    @error('source')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Title field -->
<div class="form-group input-required">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', old('title'), ['id'=>'title', 'placeholder'=>'Title of news', 'class'=>'form-control ' .  ($errors->has('title') ? ' is-invalid' : null)]) }}

    @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Teaser field -->
<div class="form-group">
    {{ Form::label('teaser', 'Teaser') }}
    {{ Form::text('teaser', old('teaser'), ['id'=>'teaser', 'placeholder'=>'Teaser or summary of news', 'class'=>'form-control ' .  ($errors->has('teaser') ? ' is-invalid' : null)]) }}

    @error('teaser')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- News link field -->
<div class="form-group input-required">
    {{ Form::label('url', 'News link') }}
    {{ Form::text('url', old('url'), ['id'=>'url', 'placeholder'=>'URL or link of news item', 'class'=>'form-control ' .  ($errors->has('url') ? ' is-invalid' : null)]) }}

    @error('url')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
