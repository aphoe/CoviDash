@php
    $sn = startPageSn($newsItems);
@endphp

@extends('theme.body')

@push('css')
    {!! themeSectionCss(['admin']) !!}
    {!! themeVendorCss('sweet-alert2/sweetalert2.min') !!}
@endpush

@push('js')
    {!! themeSectionJs(['admin']) !!}
    {!! themeVendorJs('sweet-alert2/sweetalert2.all.min') !!}

    <script>
        activateUrl = baseUrl + 'admin/news/status';
    </script>
@endpush

@section('body')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">All news items</h6>
        </div>
        <div class="card-body">
            @if ($newsItems->count() < 1)
                {!! htmlAlert('info', 'There are no news items saved on ' . config('project.instanceName')) !!}
            @else
                <div class="table-responsive">
                    <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th style="min-width: 115px;">Date</th>
                            <th>Source</th>
                            <th>News</th>
                            <th>Active</th>
                            <th style="min-width: 280px;">&nbsp;</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Date</th>
                            <th>Source</th>
                            <th>News</th>
                            <th>Active</th>
                            <th>&nbsp;</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($newsItems as $newsItem)
                            <tr id="news-{{ $newsItem->id }}">
                                <td>{{ $sn++ }}</td>
                                <td>{{ $newsItem->date->format('j M, Y') }}</td>
                                <td>{{ $newsItem->source }}</td>
                                <td>
                                    <h6>{{ $newsItem->title }}</h6>
                                    {{ $newsItem->teaser }}<br>
                                    <strong>URL:</strong> <a href="{{ $newsItem->url }}" target="_blank">{{ $newsItem->url }}</a>
                                </td>
                                <td id="active-{{ $newsItem->id }}">{{ $newsItem->active_status }}</td>
                                <td>
                                    <div class="admin-list">
                                        <a href="{{ url('admin/news/' . $newsItem->id . '/edit') }}"><i
                                                class="far fa-edit"></i> Edit
                                        </a>
                                        <a href="#"
                                           class="admin-activate-item"
                                           data-id="{{ $newsItem->id }}"
                                           data-action="{{ ($newsItem->active == true) ? 'deactivate': 'activate' }}"
                                        >
                                            <i class="{{ ($newsItem->active == true) ? 'fas fa-ban': 'fas fa-check' }}"></i>
                                            <span>{{ ($newsItem->active == true) ? 'Deactivate': 'Activate' }}</span>
                                        </a>
                                        <a href="{{ url('admin/news/' . $newsItem->id) }}" class="text-danger admin-delete-item" data-id="{{ $newsItem->id }}" data-tag="{{ $newsItem->title }}">
                                            <i class="fas fa-times"></i>
                                            delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $newsItems->links() }}
                </div>
            @endif
        </div>
    </div>

    <script>
        deleteUrl = "{{ url('admin/news') }}";
        trId = 'news';
    </script>
@stop
