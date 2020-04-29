<!-- State/province field -->
<div class="form-group">
    {{ Form::label('province_id', 'State/province') }}
    {{ Form::select('province_id', $provinces, old('province_id'), ['id'=>'province_id', 'placeholder'=>'Select a state/province...', 'class'=>'form-control ' .  ($errors->has('province_id') ? ' is-invalid' : null)]) }}

    @error('province_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Date of occurrence field -->
<div class="form-group input-required">
    {{ Form::label('day', 'Date of occurrence') }}
    {{ Form::text('day', old('day'), ['id'=>'day', 'placeholder'=>'Enter date', 'class'=>'form-control flatpickr-date ' .  ($errors->has('day') ? ' is-invalid' : null)]) }}

    @error('day')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- No. of tests carried out field -->
<div class="form-group">
    {{ Form::label('tested', 'No. of tests carried out') }}
    {{ Form::text('tested', old('tested'), ['id'=>'tested', 'placeholder'=>'Number of tests carried out', 'class'=>'form-control ' .  ($errors->has('tested') ? ' is-invalid' : null)]) }}

    @error('tested')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Confirmed positive field -->
<div class="form-group">
    {{ Form::label('positive', 'Confirmed positive') }}
    {{ Form::text('positive', old('positive'), ['id'=>'positive', 'placeholder'=>'Number of people confirmed positive', 'class'=>'form-control ' .  ($errors->has('positive') ? ' is-invalid' : null)]) }}

    @error('positive')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- No. recovered field -->
<div class="form-group">
    {{ Form::label('recovered', 'No. recovered') }}
    {{ Form::text('recovered', old('recovered'), ['id'=>'recovered', 'placeholder'=>'Number of patients that recovered', 'class'=>'form-control ' .  ($errors->has('recovered') ? ' is-invalid' : null)]) }}

    @error('recovered')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- No. of patients transferred field -->
<div class="form-group">
    {{ Form::label('transferred', 'No. of patients transferred') }}
    {{ Form::text('transferred', old('transferred'), ['id'=>'transferred', 'placeholder'=>'Number of patients transferred out', 'class'=>'form-control ' .  ($errors->has('transferred') ? ' is-invalid' : null)]) }}

    @error('transferred')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- No. of critical cases field -->
<div class="form-group">
    {{ Form::label('critical', 'No. of critical cases') }}
    {{ Form::text('critical', old('critical'), ['id'=>'critical', 'placeholder'=>'Number of patients in critical condition', 'class'=>'form-control ' .  ($errors->has('critical') ? ' is-invalid' : null)]) }}

    @error('critical')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Death recorded field -->
<div class="form-group">
    {{ Form::label('died', 'Death recorded') }}
    {{ Form::text('died', old('died'), ['id'=>'died', 'placeholder'=>'Number of deaths recorded as a result of incidence', 'class'=>'form-control ' .  ($errors->has('died') ? ' is-invalid' : null)]) }}

    @error('died')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
