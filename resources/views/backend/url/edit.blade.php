@extends('theme.body')

@section('body')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Create External link</h6>
        </div>
        <div class="card-body">
            {!! Form::model($url, ['url' => 'admin/url/' . $url->id, 'method' => 'put']) !!}
            @csrf

            @include('partials.backend.url-form')

            <!-- Priority field -->
            <div class="form-group input-required">
                {{ Form::label('priority', 'Priority') }}
                {{ Form::text('priority', old('priority'), ['id'=>'priority', 'placeholder'=>'A number between 1 and 100', 'class'=>'form-control ' .  ($errors->has('priority') ? ' is-invalid' : null)]) }}
                <span class="help-block">Number between 1 and 100. Higher priority items will be listed</span>

                @error('priority')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button class="btn btn-primary btn-lg" type="submit">
                <i class="fas fa-save"></i>
                Update link
            </button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
