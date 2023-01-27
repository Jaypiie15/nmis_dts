<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/login_tabbed.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Mar 2021 06:32:43 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>NMIS - Document Tracking System</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('resources/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('resources/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('resources/assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('resources/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('resources/assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('resources/assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ asset('resources/global_assets/js/main/jquery.min.js') }}"></script>
	<script src="{{ asset('resources/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('resources/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
	{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
	<script src="{{ asset('resources/global_assets/js/plugins/forms/validation/validate.min.js') }}"></script>
	<script src="{{ asset('resources/global_assets/js/demo_pages/form_validation.js') }}"></script>

	<!-- Theme JS files -->
	<script src="{{ asset('resources/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	{{-- <script src="{{ asset('resources/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script> --}}
	
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<script src="{{ asset('resources/assets/js/app.js') }}"></script>
	<script src="{{ asset('resources/global_assets/js/demo_pages/login.js') }}"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src={{ asset('resources/global_assets/js/demo_pages/login_validation.js') }}></script>

	<!-- /theme JS files -->

</head>

<body>

	<!-- Page content -->
	<div class="page-content login-cover">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				@if (session()->has('type') =='error')
				<script>
					Swal.fire({
						title: 'Error!!',
						icon: 'error',
						text: 'Incorrect Username or Password',
						timer: 3000,
						timerProgressBar: true,
						showConfirmButton : false
						}).then((result) => {
						})
				</script>
				 @endif

				<!-- Login form -->
				<form class="login-form wmin-sm-400 form-validate" action="{{ route('authenticate') }}" method="POST">
					@csrf
					<div class="card mb-0">
						<ul class="nav nav-tabs nav-justified alpha-grey mb-0">
						
							
						</ul>

						<div class="tab-content card-body">
							<div class="tab-pane fade show active" id="login-tab1">
								<div class="text-center mb-3">
									<i class="icon-files-empty2 icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
									<h5 class="mb-0">NMIS - Document Tracking System</h5>
									<span class="d-block text-muted">Login your account</span>
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
									<input type="text" class="form-control" name="division_name" placeholder="Division Name" required>
									<div class="form-control-feedback">
										<i class="icon-user text-muted"></i>
									</div>
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
									<input type="password" class="form-control" name="password" placeholder="Password" required>
									<div class="form-control-feedback">
										<i class="icon-lock2 text-muted"></i>
									</div>
								</div>
								<div class="form-group d-flex align-items-center">
									
									<div class="form-check mb-0">
									<a href="{{ route('trackdocument') }}" class="ml-auto">Track Document?</a>
							
									</div>

								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block">Sign in</button>
								</div>

						</div>

						
					</div>
				</form>
				<!-- /login form -->

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/login_tabbed.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Mar 2021 06:32:43 GMT -->
</html>
