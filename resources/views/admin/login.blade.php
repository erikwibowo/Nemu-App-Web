<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>{{ $title }}</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('template/assets/img/icon.ico') }}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('template/assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["{{ asset('template/assets/css/fonts.min.css') }}"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('template/assets/css/atlantis.css') }}">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">{{ config('web-config.webname') }}</h3>
			<form class="login-form" action="{{ route('admin.auth') }}" method="POST">
                @csrf
				<div class="form-group form-floating-label">
					<input id="email" name="email" type="email" class="form-control input-border-bottom" required autofocus>
					<label for="email" class="placeholder">Email</label>
				</div>
				<div class="form-group form-floating-label">
					<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
					<label for="password" class="placeholder">Password</label>
					<div class="show-password">
						<i class="icon-eye"></i>
					</div>
				</div>
				{{-- <div class="row form-sub m-0">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="rememberme">
						<label class="custom-control-label" for="rememberme">Remember Me</label>
					</div>
					
					<a href="#" class="link float-right">Forget Password ?</a>
				</div> --}}
				<div class="form-action mb-3">
					<button type="submit" class="btn btn-primary btn-rounded btn-login">Masuk</button>
				</div>
			</form>
		</div>
	</div>
	<script src="{{ asset('template/assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('template/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('template/assets/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('template/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/atlantis.min.js') }}"></script>
	<!-- Bootstrap Notify -->
	<script src="{{ asset('template/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    @if(session("notif"))
    <script>
        $(document).ready(function() {
            $.notify({
                // options
                message: '{{ session("notif") }}',
                icon: 'fa fa-bell'
            },{
                // settings
                type: 'danger'
            });
        });
    </script>
    @endif
</body>
</html>