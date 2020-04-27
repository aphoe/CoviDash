@php
    $sn = startPageSn($admins);
@endphp

@extends('theme.body')

@push('css')
    {!! themeSectionCss(['admin']) !!}
    {!! themeVendorCss('sweet-alert2/sweetalert2.min') !!}
@endpush

@push('js')
    {!! themeSectionJs(['admin', 'user']) !!}
    {!! themeVendorJs('sweet-alert2/sweetalert2.all.min') !!}

    <script>
        blockUrl = baseUrl + 'admin/user/block';
    </script>
@endpush

@section('body')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">List of registered users</h6>
        </div>
        <div class="card-body">
            @if ($admins->count() < 1)
                {!! htmlAlert('info', 'There are no users registered on ' . config('project.instanceName')) !!}
            @else
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Blocked</th>
                            <th>Created</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Blocked</th>
                            <th>Created</th>
                            <th>&nbsp;</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($admins as $admin)
                            <tr id="admin-{{ $admin->id }}">
                                <td>{{ $sn++ }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td id="active-{{ $admin->id }}">{{ $admin->blocked_status }}</td>
                                <td>{{ $admin->created_at->format('j M, Y - g:ia') }}</td>
                                <td>
                                    <div class="admin-list">
                                        <a href="{{ url('admin/user/' . $admin->id . '/edit') }}"><i
                                                class="far fa-edit"></i> Edit
                                        </a>

                                        <a href="#"
                                           class="admin-block-user"
                                           data-id="{{ $admin->id }}"
                                           data-action="{{ ($admin->blocked == false) ? 'block': 'unblock' }}"
                                        >
                                            <i class="{{ ($admin->blocked == false) ? 'fas fa-ban': 'fas fa-check' }}"></i>
                                            <span>{{ ($admin->blocked == false) ? 'Block': 'Unblock' }}</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $admins->links() }}
                </div>
            @endif
        </div>
    </div>

    <script>
        deleteUrl = "{{ url('admin/user') }}";
        trId = 'user';
    </script>
@stop

