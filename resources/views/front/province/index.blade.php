@extends('theme.front')

@push('css')
    {!! themeSectionCss(['chart', 'news']) !!}
@endpush

@push('js')
    {!! themeVendorJs('chart.js/Chart.min') !!}
    {!! $lineChart->script() !!}

    <script>
        $('.chart-numbers .data, .chart-numbers .new, .chart-numbers .total, .show-tooltip').tooltip();
    </script>
@endpush

@section('front')
    <p class="mb-4">Aside the global numbers, the latest date of all records is <strong class="text-primary">{{ $day->format('jS F, Y') }}</strong></p>

    <div class="row">
        <div class="col-12">
            <a href="{{ url('states') }}" class="btn btn-sm btn-outline-primary float-right mb-4">
                <i class="fas fa-chess-rook"></i>
                All states/provinces
            </a>
        </div>
    </div>
    <div class="row">
        @if($incidence->tested !== null)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total tested</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($incidence->tested) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-vial fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($incidence->positive !== null)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Confirmed cases</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($incidence->positive) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-temperature-high fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($incidence->recovered !== null)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Recovered</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($incidence->recovered) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-glass-cheers fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($incidence->transferred !== null)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">transferred out</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($incidence->tranfered) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-ambulance fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($incidence->critical !== null)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Critical state</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($incidence->critical) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-procedures fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($incidence->died !== null)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Death recorded</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($incidence->died) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-heart-broken fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Cases</h6>
                    <p class="m-0">Click on any of the legends below to hide it in the chart. Click again to show it</p>
                </div>
                <div class="card-body">
                    {!! $lineChart->container() !!}
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12 card-deck">

            <div class="card shadow">
                <div class="card-header">
                    <div class="m-0 font-weight-bold text-uppercase text-warning"><i class="fas fa-temperature-high"></i> Confirmed</div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-sm">
                        <tbody>
                        @foreach($positionConfirmed as $key=>$confirmed)
                        <tr class="{{ $confirmed->province_id === $province->id ? 'focused-province' : '' }}">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $confirmed->province->name }}</td>
                            <td class="{{ $confirmed->province_id === $province->id ? '' : 'text-warning' }}">{{ number_format($confirmed->positive) }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header">
                    <div class="m-0 font-weight-bold text-uppercase text-danger"><i class="fas fa-heart-broken"></i> Death</div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-sm">
                        <tbody>
                        @foreach($positionDeath as $key=>$death)
                        <tr class="{{ $death->province_id === $province->id ? 'focused-province' : '' }}">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $death->province->name }}</td>
                            <td class="{{ $death->province_id === $province->id ? '' : 'text-danger' }}">{{ number_format($death->died) }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header">
                    <div class="m-0 font-weight-bold text-uppercase text-success"><i class="fas fa-glass-cheers"></i> Recovered</div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-sm">
                        <tbody>
                        @foreach($positionRecovered as $key=>$recovered)
                        <tr class="{{ $recovered->province_id === $province->id ? 'focused-province' : '' }}">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $recovered->province->name }}</td>
                            <td class="{{ $recovered->province_id === $province->id ? '' : 'text-success' }}">{{ number_format($recovered->recovered) }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
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
