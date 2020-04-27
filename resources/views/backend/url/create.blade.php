@extends('theme.body')

@section('body')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Create External link</h6>
        </div>
        <div class="card-body">
        {!! Form::open(['url' => 'admin/url', 'method' => 'post']) !!}
        @csrf

        @include('partials.backend.url-form')

        <button class="btn btn-primary btn-lg" type="submit">
            <i class="fas fa-save"></i>
            Create link
        </button>
        {!! Form::close() !!}
        </div>
    </div>
@endsection
