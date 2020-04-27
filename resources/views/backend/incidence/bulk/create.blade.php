@extends('theme.body')

@push('css')
    {!! themeVendorCss('flatpickr/flatpickr.min') !!}
@endpush

@push('js')
    {!! themeVendorJs('flatpickr/flatpickr.min') !!}
    {!! themeSectionJs('flatpickr-config') !!}
@endpush

@section('body')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Record incidences in bulk</h6>
        </div>
        <div class="card-body">
            {!! Form::open(['url' => 'admin/incidence/bulk/create', 'method' => 'post']) !!}
            @csrf

            <!-- Date of incidence field -->
            <div class="form-group input-required">
                {{ Form::label('day', 'Date of incidence') }}
                {{ Form::text('day', old('day'), ['id'=>'day', 'placeholder'=>'Day incidences occurred', 'class'=>'form-control flatpickr-date ' .  ($errors->has('day') ? ' is-invalid' : null)]) }}

                @error('day')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
                <h4 class="text-uppercase mt-5 mb-0">States/provinces</h4>
                <hr class="mt-0 mb-3">

            @foreach($provinces as $province)
                <h6 class="text-uppercase">{{ $province->name }}</h6>
                <div class="row">
                    <div class="col">
                        <!-- No tested field -->
                        <div class="form-group">
                            {{ Form::label($province->code . '-' . 'tested', 'No. tested') }}
                            {{ Form::text($province->code . '-' . 'tested', old($province->code . '-' . 'tested'), ['id'=>$province->code . '-' . 'tested', 'placeholder'=>'Number of people tested', 'class'=>'form-control ' .  ($errors->has($province->code . '-' . 'tested') ? ' is-invalid' : null)]) }}

                            @error($province->code . '-' . 'tested')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <!-- No. positive field -->
                        <div class="form-group">
                            {{ Form::label($province->code . '-' . 'positive', 'No. positive') }}
                            {{ Form::text($province->code . '-' . 'positive', old($province->code . '-' . 'positive'), ['id'=>$province->code . '-' . 'positive', 'placeholder'=>'Number tested positive', 'class'=>'form-control ' .  ($errors->has($province->code . '-' . 'positive') ? ' is-invalid' : null)]) }}

                            @error($province->code . '-' . 'positive')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <!-- No. recovered field -->
                        <div class="form-group">
                            {{ Form::label($province->code . '-' . 'recovered', 'No. recovered') }}
                            {{ Form::text($province->code . '-' . 'recovered', old($province->code . '-' . 'recovered'), ['id'=>$province->code . '-' . 'recovered', 'placeholder'=>'Number recovered', 'class'=>'form-control ' .  ($errors->has($province->code . '-' . 'recovered') ? ' is-invalid' : null)]) }}

                            @error($province->code . '-' . 'recovered')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <!-- No. transferred field -->
                        <div class="form-group">
                            {{ Form::label($province->code . '-' . 'transfered', 'No. transferred') }}
                            {{ Form::text($province->code . '-' . 'transfered', old($province->code . '-' . 'transfered'), ['id'=>$province->code . '-' . 'transfered', 'placeholder'=>'Number transferred', 'class'=>'form-control ' .  ($errors->has($province->code . '-' . 'transfered') ? ' is-invalid' : null)]) }}

                            @error($province->code . '-' . 'transfered')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <!-- No. critical field -->
                        <div class="form-group">
                            {{ Form::label($province->code . '-' . 'critical', 'No. critical') }}
                            {{ Form::text($province->code . '-' . 'critical', old($province->code . '-' . 'critical'), ['id'=>$province->code . '-' . 'critical', 'placeholder'=>'Number critical', 'class'=>'form-control ' .  ($errors->has($province->code . '-' . 'critical') ? ' is-invalid' : null)]) }}

                            @error($province->code . '-' . 'critical')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <!-- No. died field -->
                        <div class="form-group">
                            {{ Form::label($province->code . '-' . 'died', 'No. died') }}
                            {{ Form::text($province->code . '-' . 'died', old($province->code . '-' . 'died'), ['id'=>$province->code . '-' . 'died', 'placeholder'=>'Number died', 'class'=>'form-control ' .  ($errors->has($province->code . '-' . 'died') ? ' is-invalid' : null)]) }}

                            @error($province->code . '-' . 'died')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach

            <button class="btn btn-primary btn-lg" type="submit">
                <i class="fas fa-save"></i>
                Save all
            </button>
            {!! Form::close() !!}
        </div>
    </div>
@stop
