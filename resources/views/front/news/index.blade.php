@php
    $sn = startPageSn($newsItems);
@endphp

@extends('theme.body')

@push('css')
    {!! themeSectionCss(['news']) !!}
@endpush

@section('body')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">All news items and information links</h6>
        </div>
        <div class="card-body">
            @if ($newsItems->count() < 1)
                {!! htmlAlert('info', 'There are no news items and information on ' . config('project.instanceName')) !!}
            @else
                @each('partials.frontend.news-page', $newsItems, 'newsItem')

                {{ $newsItems->links() }}
            @endif
        </div>
    </div>
@stop
