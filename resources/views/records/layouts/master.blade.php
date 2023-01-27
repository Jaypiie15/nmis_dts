<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/form_validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Mar 2021 06:18:47 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>NMIS - Document Tracking System</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('/resources/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/resources/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/resources/assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/resources/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/resources/assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/resources/assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<!-- Core JS files -->
	<script src="{{ asset('/resources/global_assets/js/main/jquery.min.js') }}"></script>
	<script src="{{ asset('/resources/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('/resources/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('/resources/global_assets/js/plugins/forms/validation/validate.min.js') }}"></script>
	<script src="{{ asset('/resources/global_assets/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
	{{-- <script src="{{ asset('/resources/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script> --}}
	<script src="{{ asset('/resources/global_assets/js/plugins/forms/styling/switch.min.js') }}"></script>
	<script src="{{ asset('/resources/global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
	<script src="{{ asset('/resources/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script src="{{ asset('/resources/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	{{-- <script src="{{ asset('/resources/global_assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js') }}"></script> --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	{{-- <script src="{{ asset('/resources/global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js') }}"></script> --}}
	<script src="{{ asset('/resources/global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js') }}"></script>
	<script src="{{ asset('/resources/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js') }}"></script>
	<script src="{{ asset('/resources/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>


	<script src="{{ asset('/resources/global_assets/js/plugins/ui/fullcalendar/core/main.min.js') }}"></script>
	<script src="{{ asset('/resources/global_assets/js/plugins/ui/fullcalendar/daygrid/main.min.js') }}"></script>
	<script src="{{ asset('/resources/global_assets/js/plugins/ui/fullcalendar/timegrid/main.min.js') }}"></script>
	<script src="{{ asset('/resources/global_assets/js/plugins/ui/fullcalendar/interaction/main.min.js') }}"></script>

	<script src="{{ asset('/resources/assets/js/app.js') }}"></script>
	<script src="{{ asset('/resources/global_assets/js/demo_pages/form_validation.js') }}"></script>
	<script src="{{ asset('/resources/global_assets/js/demo_pages/datatables_responsive.js') }}"></script>
	<script src="{{ asset('/resources/global_assets/js/demo_pages/user_pages_profile_tabbed.js') }}"></script>
	<script src="{{ asset('/resources/global_assets/js/demo_pages/extra_jgrowl_noty.js') }}"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<script src="{{ asset('/resources/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	
	<!-- <script src="{{ asset('/resources/global_assets/js/demo_pages/fullcalendar_basic.js') }}"></script> -->



	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
			<a href="index.html" class="d-inline-block">
				<!-- <img src="{{ asset('resources/global_assets/images/logo_light.png') }}" alt=""> -->

			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">

			<span class="badge bg-default ml-md-3 mr-md-auto"> </span>

			<ul class="navbar-nav">
			



				<li class="nav-item dropdown dropdown-user">
					<!-- <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown"> -->
						<!-- <img src="../../../../global_assets/images/demo/users/face11.jpg" class="rounded-circle mr-2" height="34" alt=""> -->
						<!-- <span>Victoria</span> -->
					<!-- </a> -->

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
						<a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
						<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-blue ml-auto">58</span></a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
						<a href="#" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>

						<li class="nav-item"><a href="{{ route('records-dashboard') }}" class="nav-link"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
						
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-files-empty"></i> <span>Document Management</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="{{ route('show-documents') }}" class="nav-link">Manage Documents</a></li>
								<li class="nav-item"><a href="{{ route('add-document') }}" class="nav-link">Add Document</a></li>
								<!-- <li class="nav-item"><a href="index.html" class="nav-link disabled">Add Record <span class="badge bg-transparent align-self-center ml-auto">Coming soon</span></a></a></li> -->
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-users4"></i> <span>User Management</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Themes">
								<li class="nav-item"><a href="{{ route('show-users') }}" class="nav-link">View Users</a></li>
								<li class="nav-item"><a href="{{ route('add-user') }}" class="nav-link">Add User</a></li>
							</ul>
						</li>
						
						<li class="nav-item"><a href="{{ route('generate-report') }}" class="nav-link"><i class="icon-file-pdf"></i> <span>Generate Report</span></a></li>

						<li class="nav-item"><a href="{{ route('logout') }}" class="nav-link"><i class="icon-switch2"></i> <span>Logout</span></a></li>

	
						<!-- /main -->

					

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">




@yield('content')


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
                    <b>National Meat Inspection Service  &copy; 2022. </b>
					</span>

				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/form_validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Mar 2021 06:18:48 GMT -->
</html>
