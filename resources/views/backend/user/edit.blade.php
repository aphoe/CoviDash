@extends('theme.body')

@section('body')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Edit {{ $admin->name }}</h6>
        </div>
        <div class="card-body">
            {!! Form::model($admin, ['url' => 'admin/user/' . $admin->id, 'method' => 'put']) !!}
            @csrf

            @include('partials.backend.user-form')

            <button class="btn btn-primary btn-lg" type="submit">
                <i class="fas fa-user"></i>
                Update user
            </button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
