@php
    $sn = startPageSn($provinces);
@endphp

@extends('theme.body')

@push('css')
    {!! themeSectionCss(['admin']) !!}
@endpush

@push('js')
    {!! themeSectionJs(['admin']) !!}
@endpush

@section('body')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">List of all states/provinces</h6>
        </div>
        <div class="card-body">
            @if ($provinces->count() < 1)
                {!! htmlAlert('info', 'There are no provinces available on ' . config('project.instanceName')) !!}
            @else
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Active</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Active</th>
                        <th>&nbsp;</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($provinces as $province)
                        <tr id="province-{{ $province->id }}">
                            <td>{{ $sn++ }}</td>
                            <td>{{ $province->code }}</td>
                            <td>{{ $province->name }}</td>
                            <td>{{ $province->active_status }}</td>
                            <td>
                                <div class="admin-list">
                                    <a href="{{ url('admin/province/' . $province->id . '/edit') }}"><i
                                            class="far fa-edit"></i> Edit
                                    </a>
                                    <a href="{{ url('admin/province/' . $province->id . '/activate') }}"><i
                                            class="fas fa-ban"></i> Deactivate
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $provinces->links() }}
            </div>
            @endif
        </div>
    </div>

    <script>
        deleteUrl = "{{ url('admin/province') }}";
        trId = 'province';
    </script>
@stop
