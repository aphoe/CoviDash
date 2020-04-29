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

        @if($incidence->transfered !== null)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Transfered out</div>
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
                    <div class="m-0 font-weight-bold text-primary"><i class="fas fa-globe"></i> Global numbers</div>
                </div>
                <div class="card-body">
                    @if($globalData)
                    <div class="row">
                        <div class="col-12 chart-numbers">
                            <div class="icon">
                                <i class="fas fa-vial"></i>
                            </div>
                            <div class="right-hand">
                                <div class="title text-warning">Confirmed</div>
                                <div class="numbers">
                                    <div class="new" data-toggle="tooltip" title="{{ number_format($globalData->NewConfirmed) }}">
                                        <div class="data">
                                            {{ numberSuffix($globalData->NewConfirmed, 3) }}
                                        </div>
                                        <div class="label text-warning">New</div>
                                    </div>
                                    <div class="total" data-toggle="tooltip" title="{{ number_format($globalData->TotalConfirmed) }}">
                                        <div class="data">
                                            {{ numberSuffix($globalData->TotalConfirmed, 3 )}}
                                        </div>
                                        <div class="label text-warning">Total</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 chart-numbers">
                            <div class="icon">
                                <i class="fas fa-heart-broken"></i>
                            </div>
                            <div class="right-hand">
                                <div class="title text-danger">Deaths</div>
                                <div class="numbers">
                                    <div class="new" data-toggle="tooltip" title="{{ number_format($globalData->NewDeaths) }}">
                                        <div class="data">
                                            {{ numberSuffix($globalData->NewDeaths, 3) }}
                                        </div>
                                        <div class="label text-danger">New</div>
                                    </div>
                                    <div class="total" data-toggle="tooltip" title="{{ number_format($globalData->TotalDeaths) }}">
                                        <div class="data">
                                            {{ numberSuffix($globalData->TotalDeaths, 3 )}}
                                        </div>
                                        <div class="label text-danger">Total</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 chart-numbers">
                            <div class="icon">
                                <i class="fas fa-glass-cheers"></i>
                            </div>
                            <div class="right-hand">
                                <div class="title text-success">Recovered</div>
                                <div class="numbers">
                                    <div class="new" data-toggle="tooltip" title="{{ number_format($globalData->NewRecovered) }}">
                                        <div class="data">
                                            {{ numberSuffix($globalData->NewRecovered, 3) }}
                                        </div>
                                        <div class="label text-success">New</div>
                                    </div>
                                    <div class="total" data-toggle="tooltip" title="{{ number_format($globalData->TotalRecovered) }}">
                                        <div class="data">
                                            {{ numberSuffix($globalData->TotalRecovered, 3 )}}
                                        </div>
                                        <div class="label text-success">Total</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                        {!! htmlAlert('info', 'Not available at the moment.') !!}
                    @endif
                </div>
                <div class="card-footer text-muted">
                    Powered by <a href="https://covid19api.com/" target="_blank">covid19api.com</a>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header">
                    <div class="m-0 font-weight-bold text-primary">Top states</div>
                </div>
                <div class="card-body">
                    <div class="table-reponsive">
                        <table class="table table-hover table-sm table-borderless">
                            <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th class="show-tooltip text-warning" data-toggle="tooltip" title="Confirmed cases">C</th>
                                <th class="show-tooltip text-danger" data-toggle="tooltip" title="Dead">D</th>
                                <th class="show-tooltip text-success" data-toggle="tooltip" title="Recoveries">R</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $sn = 1;
                            @endphp
                            @foreach($topIncidentStates as $state)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $state->province->name }}</td>
                                    <td class="show-tooltip text-warning" data-toggle="tooltip" title="{{ $state->province->name }}, confirmed: {{ number_format($state->positive) }}">
                                        {{ numberSuffix($state->positive, 3) }}
                                    </td>
                                    <td class="show-tooltip text-danger" data-toggle="tooltip" title="{{ $state->province->name }}, dead: {{ number_format($state->died) }}">
                                        {{ numberSuffix($state->died, 3) }}
                                    </td>
                                    <td class="show-tooltip text-success" data-toggle="tooltip" title="{{ $state->province->name }}, recovered: {{ number_format($state->recovered) }}">
                                        {{ numberSuffix($state->recovered, 3) }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header">
                    <div class="m-0 font-weight-bold text-primary">Daily progress</div>
                </div>
                <div class="card-body">
                    <div class="info-progress">
                        <div class="title text-warning">Confirmed</div>
                        <div class="numbers">
                            <div class="number show-tooltip" data-toggle="tooltip" title="{{ number_format($incidence->positive) }}">
                                {{ numberSuffix($incidence->positive, 3) }}
                            </div>
                            <div class="diff">
                                <i class="fas fa-caret-up text-warning"></i>
                                {{ number_format($currentStats->positive) }}
                            </div>
                        </div>
                    </div>
                    <div class="info-progress">
                        <div class="title text-danger">Death</div>
                        <div class="numbers">
                            <div class="number show-tooltip" data-toggle="tooltip" title="{{ number_format($incidence->died) }}">
                                {{ numberSuffix($incidence->died, 3) }}
                            </div>
                            <div class="diff">
                                <i class="fas fa-caret-up text-danger"></i>
                                {{ number_format($currentStats->died) }}</div>
                        </div>
                    </div>
                    <div class="info-progress">
                        <div class="title text-success">Recovered</div>
                        <div class="numbers">
                            <div class="number show-tooltip" data-toggle="tooltip" title="{{ number_format($incidence->recovered) }}">
                                {{ numberSuffix($incidence->recovered, 3) }}
                            </div>
                            <div class="diff">
                                <i class="fas fa-caret-up text-success"></i>
                                {{ number_format($currentStats->recovered) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row card-deck my-5">
        <div class="col-7 card shadow">
            <div class="card-body">
                <h6 class="font-weight-bold text-primary card-title">News update</h6>
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
