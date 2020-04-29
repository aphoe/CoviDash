@extends('theme.body')

@section('body')
    <h5 class="mb-4">Brought to you by <span class="font-weight-bold">{{ config('project.instanceName') }}</span></h5>

    @yield('front')
@stop
