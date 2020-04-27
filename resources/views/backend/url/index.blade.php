@php
    $sn = startPageSn($urls);
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
        activateUrl = baseUrl + 'admin/url/status';
    </script>
@endpush

@section('body')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">List of all urls</h6>
        </div>
        <div class="card-body">
            @if ($urls->count() < 1)
                {!! htmlAlert('info', 'There are no external links stored on ' . config('project.instanceName')) !!}
            @else
                <div class="table-responsive">
                    <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Title</th>
                            <th>description</th>
                            <th>URL</th>
                            <th>Priority</th>
                            <th>Active</th>
                            <th style="min-width: 280px;">&nbsp;</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Title</th>
                            <th>description</th>
                            <th>URL</th>
                            <th>Priority</th>
                            <th>Active</th>
                            <th>&nbsp;</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($urls as $url)
                            <tr id="url-{{ $url->id }}">
                                <td>{{ $sn++ }}</td>
                                <td>{{ $url->title }}</td>
                                <td>{{ $url->description }}</td>
                                <td>{{ $url->url }}</td>
                                <td>{{ $url->priority }}</td>
                                <td id="active-{{ $url->id }}">{{ $url->active_status }}</td>
                                <td>
                                    <div class="admin-list">
                                        <a href="{{ url('admin/url/' . $url->id . '/edit') }}"><i
                                                class="far fa-edit"></i> Edit
                                        </a>
                                        <a href="#"
                                           class="admin-activate-item"
                                           data-id="{{ $url->id }}"
                                           data-action="{{ ($url->active == true) ? 'deactivate': 'activate' }}"
                                        >
                                            <i class="{{ ($url->active == true) ? 'fas fa-ban': 'fas fa-check' }}"></i>
                                            <span>{{ ($url->active == true) ? 'Deactivate': 'Activate' }}</span>
                                        </a>
                                        <a href="{{ url('admin/url/' . $url->id) }}" class="text-danger admin-delete-item" data-id="{{ $url->id }}" data-tag="{{ $url->title }}">
                                            <i class="fas fa-times"></i>
                                            delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $urls->links() }}
                </div>
            @endif
        </div>
    </div>

    <script>
        deleteUrl = "{{ url('admin/url') }}";
        trId = 'url';
    </script>
@stop
