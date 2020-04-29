@php
$sn = 1;
@endphp

@extends('theme.front')

@push('css')
    {!! themeVendorCss('datatables/dataTables.bootstrap4.min') !!}
@endpush

@push('js')
    {!! themeVendorJs(['datatables/jquery.dataTables.min', 'datatables/dataTables.bootstrap4.min']) !!}
    {!! themeSectionJs(['provinces']) !!}
@endpush

@section('front')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table
                    class="table table-sm table-hover" id="provincesTable" width="100%" cellspacing="0" >
                    <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th class="text-primary">No. Tested</th>
                        <th class="text-warning">Confirmed</th>
                        <th class="text-success">Recovered</th>
                        <th class="text-info">Transferred</th>
                        <th class="text-warning">Critical State</th>
                        <th class="text-danger">Deaths</th>
                        <th style="min-width: 45px;">&nbsp;</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th class="text-primary">No. Tested</th>
                        <th class="text-warning">Confirmed</th>
                        <th class="text-success">Recovered</th>
                        <th class="text-info">Transferred</th>
                        <th class="text-warning">Critical State</th>
                        <th class="text-danger">Deaths</th>
                        <th>&nbsp;</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($incidences as $incidence)
                    <tr>
                        <td>{{ $sn++ }}</td>
                        <th>{{ $incidence->province->name }}</th>
                        <td class="text-primary">{{ $incidence->tested ?? '--' }}</td>
                        <td class="text-warning">{{ $incidence->positive ?? '--' }}</td>
                        <td class="text-success">{{ $incidence->recovered ?? '--' }}</td>
                        <td class="text-info">{{ $incidence->transfered ?? '--' }}</td>
                        <td class="text-warning">{{ $incidence->critical ?? '--' }}</td>
                        <td class="text-danger">{{ $incidence->died ?? '--' }}</td>
                        <td>
                            <a href="{{ url('state/' . $incidence->province->slug) }}">
                                <i class="fas fa-chart-area"></i> View
                            </a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row card-deck my-5">
        <div class="col-7 card shadow">
            <div class="card-body">
                <h6 class="font-weight-bold text-primary card-title">News and Information</h6>
                @if($newsItems->count() < 1)
                    <p class="text-muted">No news items</p>
                @else
                    @each('partials.frontend.news-section', $newsItems, 'newsItem')

                    <div class="text-center">
                        <a href="{{ url('news') }}" class="btn btn-outline-secondary btn-sm text-uppercase ">See more...</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-5 card shadow">
            <div class="card-body">
                <h6 class="font-weight-bold text-primary card-title">Important links</h6>
                @if($links->count() < 1)
                    <p class="text-muted">No important links</p>
                @else
                    @foreach($links as $link)
                        <div class="mb-2">
                            &bull; <a href="{{ $link->url }}" target="_blank" class="font-weight-bold">{{ $link->title }}</a>
                            <small class="text-muted">{{ $link->description }}</small>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@stop
