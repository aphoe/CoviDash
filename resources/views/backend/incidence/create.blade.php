@extends('theme.body')

@push('css')
    {!! themeVendorCss('flatpickr/flatpickr.min') !!}
@endpush

@push('js')
    {!! themeVendorJs('flatpickr/flatpickr.min') !!}
    {!! themeSectionJs('flatpickr-config') !!}
@endpush

@section('body')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Record Incidence</h6>
        </div>
        <div class="card-body">
            {!! Form::open(['url' => 'admin/incidence', 'method' => 'post']) !!}
            @csrf

            @include('partials.backend.incidence-form')

            <button class="btn btn-primary btn-lg" type="submit">
                <i class="fas fa-save"></i>
                Save
            </button>
            {!! Form::close() !!}
        </div>
    </div>
@stop
