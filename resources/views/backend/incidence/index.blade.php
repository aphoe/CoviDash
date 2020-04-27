@php
    $sn = startPageSn($incidences);
@endphp

@extends('theme.body')

@push('css')
    {!! themeSectionCss(['admin']) !!}
    {!! themeVendorCss('sweet-alert2/sweetalert2.min') !!}
@endpush

@push('js')
    {!! themeSectionJs(['admin']) !!}
    {!! themeVendorJs('sweet-alert2/sweetalert2.all.min') !!}
@endpush

@section('body')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">List of all incidences</h6>
        </div>
        <div class="card-body">
            @if ($incidences->count() < 1)
                {!! htmlAlert('info', 'There are no incidences recorded on ' . config('project.instanceName')) !!}
            @else
                <div class="table-responsive">
                    <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th style="min-width: 115px;">Day</th>
                            <th>Province</th>
                            <th>Tested</th>
                            <th>Positive</th>
                            <th>Recovered</th>
                            <th>Transfered</th>
                            <th>Critical</th>
                            <th>Died</th>
                            <th style="min-width: 170px;">&nbsp;</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Day</th>
                            <th>Province</th>
                            <th>Tested</th>
                            <th>Positive</th>
                            <th>Recovered</th>
                            <th>Transfered</th>
                            <th>Critical</th>
                            <th>Died</th>
                            <th>&nbsp;</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($incidences as $incidence)
                            <tr id="incidence-{{ $incidence->id }}">
                                <td>{{ $sn++ }}</td>
                                <td>{{ $incidence->day->format('j M Y') }}</td>
                                <td>{{ $incidence->province->code ?? '--' }}</td>
                                <td>{{ numberSuffix($incidence->tested) ?? '--' }}</td>
                                <td>{{ numberSuffix($incidence->positive) ?? '--' }}</td>
                                <td>{{ numberSuffix($incidence->recovered) ?? '--' }}</td>
                                <td>{{ numberSuffix($incidence->transfered) ?? '--' }}</td>
                                <td>{{ numberSuffix($incidence->critical) ?? '--' }}</td>
                                <td>{{ numberSuffix($incidence->died) ?? '--' }}</td>
                                <td>
                                    <div class="admin-list">
                                        <a href="{{ url('admin/incidence/' . $incidence->id . '/edit') }}"><i
                                                class="far fa-edit"></i> Edit
                                        </a>
                                        <a href="{{ url('admin/incidence/' . $incidence->id) }}" class="text-danger admin-delete-item" data-id="{{ $incidence->id }}" data-tag="{{ 'Incidence of ' . $incidence->day->format('j M, Y') }}">
                                            <i class="fas fa-times"></i>
                                            delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $incidences->links() }}
                </div>
            @endif
        </div>
    </div>

    <script>
        deleteUrl = "{{ url('admin/incidence') }}";
        trId = 'incidence';
    </script>
@stop
