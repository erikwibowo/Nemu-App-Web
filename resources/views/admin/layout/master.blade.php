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
		<!--   Core JS Files   -->
		<script src="{{ asset('template/assets/js/core/jquery.3.2.1.min.js') }}"></script>
		<script src="{{ asset('template/assets/js/core/popper.min.js') }}"></script>
		<script src="{{ asset('template/assets/js/core/bootstrap.min.js') }}"></script>
	</head>
	<body>
		<div class="wrapper">
			@include('admin.layout.navbar')

			<!-- Sidebar -->
			@include('admin.layout.sidebar')
			<!-- End Sidebar -->

			<div class="main-panel">
				<div class="container" style="min-height: 100%">
					@yield('content')
				</div>
				@include('admin.layout.footer')
			</div>
			
		</div>

		<!-- jQuery UI -->
		<script src="{{ asset('template/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
		<script src="{{ asset('template/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

		<!-- jQuery Scrollbar -->
		<script src="{{ asset('template/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

		<!-- Moment JS -->
		<script src="{{ asset('template/assets/js/plugin/moment/moment.min.js') }}"></script>

		<!-- Datatables -->
		<script src="{{ asset('template/assets/js/plugin/datatables/datatables.min.js') }}"></script>

		<!-- Bootstrap Notify -->
		<script src="{{ asset('template/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

		<!-- Bootstrap Toggle -->
		<script src="{{ asset('template/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>

		<!-- Summernote -->
		<script src="{{ asset('template/assets/js/plugin/summernote/summernote-bs4.min.js') }}"></script>

		<!-- Select2 -->
		<script src="{{ asset('template/assets/js/plugin/select2/select2.full.min.js') }}"></script>

		<!-- Atlantis JS -->
        <script src="{{ asset('template/assets/js/atlantis.min.js') }}"></script>
        @if(session("notif"))
        <script>
            $(document).ready(function() {
                $.notify({
                    // options
					title: 'Pemberitahuan',
                    message: '{{ session("notif") }}',
                    icon: 'fa fa-bell'
                },{
                    // settings
                    type: '{{ session("type") }}'
                });
            });
        </script>
        @endif @if(!$errors->isEmpty())
        <script>
            $(document).ready(function() {
                $.notify({
                    // options
					title: 'Pemberitahuan',
                    message: '{{ implode('\n', $errors->all()) }}',
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