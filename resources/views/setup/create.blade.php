@extends('theme.chassis')

@push('css')
    {!! themeVendorCss('select2/css/select2.min') !!}
@endpush

@push('js')
    {!! themeVendorJs('select2/js/select2.full.min') !!}
    {!! themeSectionJs('select2') !!}
@endpush

@section('chassis')
    <div class="container-fluid bg-gradient-primary text-center py-5">
        <h2 class="text-white">
            <img src="{{ themeImageUrl('logo-2x.png') }}" alt="{{ config('project.appName') }}"  class="mb-4"><br>
            {{ config('project.appName') }}
            <br><small>Setup</small>
        </h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="offset-3 col-6 pt-4">

                @include('partials.alert')

                {!! Form::open(['url' => 'setup', 'method' => 'post']) !!}
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="page-section">
                    <h6 class="heading">Database</h6>
                    <p class="sub-heading">Enter the database details. <span class="text-warning">{{ config('project.appName') }} will not work if any of the the info here is wrong</span></p>
                </div>

                <!-- Database name field -->
                <div class="form-group input-required">
                	{{ Form::label('database_name', 'Database name') }}
                	{{ Form::text('database_name', old('database_name'), ['id'=>'database_name', 'placeholder'=>'Name of database', 'class'=>'form-control ' .  ($errors->has('database_name') ? ' is-invalid' : null)]) }}

                	@error('database_name')
                		<span class="invalid-feedback" role="alert">
                			<strong>{{ $message }}</strong>
                		</span>
                	@enderror
                </div>

                <!-- Database user field -->
                <div class="form-group input-required">
                	{{ Form::label('database_user', 'Database user') }}
                	{{ Form::text('database_user', old('database_user'), ['id'=>'database_user', 'placeholder'=>'Name database user', 'class'=>'form-control ' .  ($errors->has('database_user') ? ' is-invalid' : null)]) }}

                	@error('database_user')
                		<span class="invalid-feedback" role="alert">
                			<strong>{{ $message }}</strong>
                		</span>
                	@enderror
                </div>

                <!-- Database user\'s password field -->
                <div class="form-group">
                	{{ Form::label('database_password', 'Database user\'s password (optional)') }}
                	{{ Form::password('database_password', ['id'=>'database_password', 'placeholder'=>'Password of database user', 'class'=>'form-control ' .  ($errors->has('database_password') ? ' is-invalid' : null)]) }}

                	@error('database_password')
                		<span class="invalid-feedback" role="alert">
                			<strong>{{ $message }}</strong>
                		</span>
                	@enderror
                </div>

                <!-- Database host field -->
                <div class="form-group input-required">
                	{{ Form::label('database_host', 'Database host') }}
                	{{ Form::text('database_host', old('database_host'), ['id'=>'database_host', 'placeholder'=>'Host address or IP of Database server eg. 127.0.0.1', 'class'=>'form-control ' .  ($errors->has('database_host') ? ' is-invalid' : null)]) }}

                	@error('database_host')
                		<span class="invalid-feedback" role="alert">
                			<strong>{{ $message }}</strong>
                		</span>
                	@enderror
                </div>

                <!-- Database port field -->
                <div class="form-group input-required">
                	{{ Form::label('database_port', 'Database port') }}
                	{{ Form::text('database_port', old('database_port'), ['id'=>'database_port', 'placeholder'=>'Database port... usually 3306', 'class'=>'form-control ' .  ($errors->has('database_port') ? ' is-invalid' : null)]) }}

                	@error('database_port')
                		<span class="invalid-feedback" role="alert">
                			<strong>{{ $message }}</strong>
                		</span>
                	@enderror
                </div>

                <div class="page-section">
                    <h6 class="heading">Instance details </h6>
                    <p class="sub-heading">Details of this instance (installation) of {{ config('project.appName') }}</p>
                </div>

                <!-- Site/Instance name field -->
                <div class="form-group input-required">
                	{{ Form::label('instance_name', 'Site/Instance name') }}
                	{{ Form::text('instance_name', old('instance_name'), ['id'=>'instance_name', 'placeholder'=>'Name shown to users of the app', 'class'=>'form-control ' .  ($errors->has('instance_name') ? ' is-invalid' : null)]) }}

                	@error('instance_name')
                		<span class="invalid-feedback" role="alert">
                			<strong>{{ $message }}</strong>
                		</span>
                	@enderror
                </div>

                <!-- Site/Instance\'s short name field -->
                <div class="form-group input-required">
                	{{ Form::label('instance_short_name', 'Site/Instance\'s short name') }}
                	{{ Form::text('instance_short_name', old('instance_short_name'), ['id'=>'instance_short_name', 'placeholder'=>'Short name or abbreviation of this instance', 'class'=>'form-control ' .  ($errors->has('instance_short_name') ? ' is-invalid' : null)]) }}

                	@error('instance_short_name')
                		<span class="invalid-feedback" role="alert">
                			<strong>{{ $message }}</strong>
                		</span>
                	@enderror
                </div>

                <!-- Slogan field -->
                <div class="form-group">
                	{{ Form::label('instance_slogan', 'Slogan (optional)') }}
                	{{ Form::text('instance_slogan', old('instance_slogan'), ['id'=>'instance_slogan', 'placeholder'=>'Slogan', 'class'=>'form-control ' .  ($errors->has('instance_slogan') ? ' is-invalid' : null)]) }}

                	@error('instance_slogan')
                		<span class="invalid-feedback" role="alert">
                			<strong>{{ $message }}</strong>
                		</span>
                	@enderror
                </div>

                <!-- Country field -->
                <div class="form-group input-required">
                	{{ Form::label('country', 'Country') }}
                	{{ Form::select('country', $countries, old('country'), ['id'=>'country', 'placeholder'=>'Select a country...', 'class'=>'form-control select2 ' .  ($errors->has('country') ? ' is-invalid' : null)]) }}

                	@error('country')
                		<span class="invalid-feedback" role="alert">
                			<strong>{{ $message }}</strong>
                		</span>
                	@enderror
                </div>

                <!-- URL of Instance field -->
                <div class="form-group input-required">
                	{{ Form::label('url', 'URL of Instance') }}
                	{{ Form::text('url', old('url'), ['id'=>'url', 'placeholder'=>'Enter the URL/web address this instance will be running from', 'class'=>'form-control ' .  ($errors->has('url') ? ' is-invalid' : null)]) }}

                	@error('url')
                		<span class="invalid-feedback" role="alert">
                			<strong>{{ $message }}</strong>
                		</span>
                	@enderror
                </div>

                <!-- Google analytics ID field -->
                <div class="form-group input-required">
                    {{ Form::label('google_tracking_id', 'Google analytics ID') }}
                    {{ Form::text('google_tracking_id', old('google_tracking_id'), ['id'=>'google_tracking_id', 'placeholder'=>'Enter your google analytics tracking ID', 'class'=>'form-control ' .  ($errors->has('google_tracking_id') ? ' is-invalid' : null)]) }}

                    @error('google_tracking_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="page-section">
                    <h6 class="heading">Admin User </h6>
                    <p class="sub-heading">Details of the [super] admin user</p>
                </div>

                <!-- Full name field -->
                <div class="form-group input-required">
                	{{ Form::label('name', 'Full name') }}
                	{{ Form::text('name', old('name'), ['id'=>'name', 'placeholder'=>'Full name of admin user', 'class'=>'form-control ' .  ($errors->has('name') ? ' is-invalid' : null)]) }}

                	@error('name')
                		<span class="invalid-feedback" role="alert">
                			<strong>{{ $message }}</strong>
                		</span>
                	@enderror
                </div>

                <!-- Email address field -->
                <div class="form-group input-required">
                	{{ Form::label('email', 'Email address') }}
                	{{ Form::email('email', old('email'), ['id'=>'email', 'placeholder'=>'Email of admin user', 'class'=>'form-control ' .  ($errors->has('email') ? ' is-invalid' : null)]) }}

                	@error('email')
                		<span class="invalid-feedback" role="alert">
                			<strong>{{ $message }}</strong>
                		</span>
                	@enderror
                </div>

                <!-- Password field -->
                <div class="form-group input-required">
                	{{ Form::label('password', 'Password') }}
                	{{ Form::password('password', ['id'=>'password', 'placeholder'=>'Enter a password', 'class'=>'form-control ' .  ($errors->has('password') ? ' is-invalid' : null)]) }}

                	@error('password')
                		<span class="invalid-feedback" role="alert">
                			<strong>{{ $message }}</strong>
                		</span>
                	@enderror
                </div>

                <!-- Confirm password field -->
                <div class="form-group input-required">
                	{{ Form::label('password_confirmation', 'Confirm password') }}
                	{{ Form::password('password_confirmation', ['id'=>'password_confirmation', 'placeholder'=>'Type your password again', 'class'=>'form-control ' .  ($errors->has('password_confirmation') ? ' is-invalid' : null)]) }}

                	@error('password_confirmation')
                		<span class="invalid-feedback" role="alert">
                			<strong>{{ $message }}</strong>
                		</span>
                	@enderror
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="agree" id="agree" value="yes">
                    <label class="custom-control-label" for="agree">I agree to the <a
                            href="{{ url('license') }}" target="_blank">License Agreement</a> of this app</label>
                </div>

                <button type="submit" class="btn btn-block btn-primary btn-lg mt-4 mb-5">
                    <i class="far fa-save"></i>
                    Create Instance of {{ config('project.appName') }}
                </button>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
