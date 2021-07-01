<!doctype html>
<!--
* Workday - A time clock application for employees
* Email: official.codefactor@gmail.com
* Version: 1.1
* Author: Brian Luna
* Copyright 2020 Codefactor
-->
<html lang="en" class="fullscreen-bg">

<head>
	<title>Sign in | EIT HRM</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/assets/images/img/favicon-16x16.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/images/img/favicon-32x32.png') }}">
	<link rel="icon" type="image/x-icon" href="{{ asset('/assets/images/img/favicon.ico') }}">
    <link href="{{ asset('/assets/vendor/semantic-ui/semantic.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/assets/css/auth.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box">
					<div class="content">
						<div class="header">
							<div class="logo align-center"><img src="{{ asset('/assets/images/img/logo.png') }}" alt="Workday"></div>

							<div class="flash-message">
								@foreach (['danger', 'warning', 'success', 'info'] as $msg)
								  @if(Session::has('alert-' . $msg))
							
								  <p class="alert alert-{{ $msg }} ui success message" style="">{{ Session::get('alert-' . $msg) }} 
									{{-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> --}}
								
								  </p>
								  @endif
								@endforeach
							  </div> <!-- end .flash-message -->

							<p class="lead">{{ __('Sign in to your account') }} or <a href="employee-registration">Sign up</a></p>
							
						</div>

						@if ($errors->has('approve'))
						<span class="alert alert-danger">
							<strong>{{ $errors->first('approve') }}</strong>
						</span>
						@endif	

						<form class="form-auth-small ui form" action="{{ route('login') }}" method="POST">
                       		@csrf
							<div class="fields">
									<div class="form-row">
										<div class="col-md-6" style="margin-left: 150px;">
											<div class="sixteen wide field ">
											<label for="" class="color-white">{{ __('Select Role') }}</label>
											<select name="role">
											<option value="3" selected>Client</option>	
											<option value="2">Employee</option>	
											<option value="1">Admin</option>	
											</select>	
											</div>
										</div>
									</div>
								{{-- <div class="sixteen wide field {{ $errors->has('email') ? ' has-error' : '' }}">
									<label for="email" class="color-white">{{ __('Email') }}</label>
									<input id="email" type="email" class="" name="email" value="{{ old('email') }}" placeholder="{{ __('Enter your e-mail address') }}" required autofocus>
									@if ($errors->has('email'))
                                    <p class="ui danger message ">
                                      {{ $errors->first('email') }}
									</p>
                                	@endif	
								</div> --}}
							</div>
							<div class="fields">
								<div class="sixteen wide field {{ $errors->has('email') ? ' has-error' : '' }}">
									<label for="email" class="color-white">{{ __('Email') }}</label>
									<input id="email" type="email" class="" name="email" value="{{ old('email') }}" placeholder="{{ __('Enter your e-mail address') }}" required autofocus>
									@if ($errors->has('email'))
                                    <p class="ui danger message ">
                                      {{ $errors->first('email') }}
									</p>
                                	@endif	
								</div>
							</div>
							<div class="fields">
								<div class="sixteen wide field {{ $errors->has('password') ? ' has-error' : '' }}">
									<label for="password" class="color-white">{{ __('Password') }}</label>
                                	<input id="password" type="password" class="" name="password" placeholder="{{ __('Enter your password') }}" required>
                                	@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                	@endif
								</div>
							</div>
							<div class="fields">
								<div class="sixteen wide field">
									<div class="ui checkbox">
										<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
										<label class="color-white">{{ __('Remember me') }}</label>
									</div>
								</div>
							</div>
							<button type="submit" class="ui green button large fluid">{{ __('SIGN IN') }}</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

    <script src="{{ asset('/assets/vendor/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/semantic-ui/semantic.min.js') }}"></script>
	<script>
		$('.ui.checkbox').checkbox('uncheck', 'toggle');
	</script>
</body>

</html>
