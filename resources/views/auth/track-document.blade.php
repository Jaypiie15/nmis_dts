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

				<!-- Registration form -->
				<div class="flex-fill">
					<div class="row">
						<div class="col-lg-6 offset-lg-3">
							<div class="card mb-0">
								<div class="card-body">
									<div class="text-center mb-3">
										<i class="icon-files-empty2 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
										<h4 class="mb-0">{{ $document->tracking_number }}</h4>
										<span class="d-block text-muted">NMIS Document Tracking System</span>
									</div>

									<button type="submit" data-toggle="modal" id="btn-receive" data-target="#modal-login" class="btn btn-success btn-receive">Receive Document <i class="icon-check ml-2"></i></button>
									<a href="{{ route('trackdocument') }}" class="btn btn-primary ">Track Another Document <i class="icon-search4 ml-2"></i></a>


                                    <h5 class="mb-0">Document Title</h5>
									<div class="form-group form-group-feedback form-group-feedback-right">
										<input type="text" class="form-control" value="{{ $document->document_title }}"  disabled>
										<div class="form-control-feedback">
										</div>
									</div>

									<div class="row">


									</div>


                                    <h5 class="mb-0">Document Origin & Type</h5>
									<div class="row">

										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="text" class="form-control" value="{{ $document->from_office }}" disabled>
												<div class="form-control-feedback">
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="text" class="form-control" value="{{ $document->document_type }}" disabled>
												<div class="form-control-feedback">
												</div>
											</div>
										</div>
                                        {{-- <div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="text" class="form-control" name="authorized_person_name" placeholder="Authorized Person Name" required>
												<div class="form-control-feedback">
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="text" class="form-control" name="authorized_person_contact" placeholder="Authorized Person Contact Number" required>
												<div class="form-control-feedback">
												</div>
											</div>
										</div> --}}

									</div>

                                    <h5 class="mb-0">Document Trails</h5>

                                        
                                        <div class="list-feed">
                                            @foreach($tracking as $track)

                                            <div class="list-feed-item border-warning-400">
                                                <div class="text-muted">{{ $track->created_at->format('F d,Y H:ia') }}</div>
                                                 {{ $track->document_remarks }}
                                            </div>
            
                                            @endforeach
                                        </div>


                                    


								

								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /registration form -->
            </div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
				@if($errors->has('login_receive'))
                <script>
					window.onload = function () {
					document.getElementById("btn-receive").click(); };
				</script>
				@endif

                @if($errors->has('check'))
                <script>
                    Swal.fire({
                        title: "{{ $errors->first('title') }}",
                        icon: "{{ $errors->first('type') }}",
                        text: "{{ $errors->first('check') }}",
                        timer: 3000,
                        timerProgressBar: true,
                        showConfirmButton : false
                        }).then((result) => {
                        })
                </script>

                @endif


	            <!-- Validation form -->
				<div id="modal-login" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">

                            @if (Auth::check())
							<!-- Form -->
                            <form class="modal-body form-validate" method="POST" action="{{ route('receive-document') }}">
                                @csrf
								<div class="text-center mb-3">
									<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
									<h5 class="mb-0">Please input your name and remarks</h5>
									<span class="d-block text-muted">Office : {{ Auth::user()->division_name }}</span>

								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
									<input type="text" class="form-control" name="received_by" placeholder="Name of Receiver" required>
									<div class="form-control-feedback">
										<i class="icon-user text-muted"></i>
									</div>
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
									<input type="text" class="form-control" name="remarks" placeholder="Remarks">
									<div class="form-control-feedback">
										<i class="icon-pencil text-muted"></i>
									</div>
								</div>
                                <input type="hidden" name="division_name" value="{{ Auth::user()->division_name }}">
                                <input type="hidden" name="tracking_number" value="{{ $document->tracking_number }}">
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block">Submit <i class="icon-circle-right2 ml-2"></i></button>
								</div>
							</form>
							<!-- /form -->
                            @else
							<form class="modal-body form-validate" method="POST" action="{{ route('authenticate') }}">
                                @csrf
								<div class="text-center mb-3">
									<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
									<h5 class="mb-0">Login to your account</h5>
									<span class="d-block text-muted">Your credentials</span>
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
									<input type="text" class="form-control" name="division_name" placeholder="Office / Division name" required>
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
                                <input type="hidden" name="tracking_number" value="{{ $document->tracking_number }}">
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
								</div>
							</form>
                          @endif
						</div>
					</div>
				</div>


				<!-- /validation form -->
	<!-- /page content -->

</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/login_tabbed.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Mar 2021 06:32:43 GMT -->
</html>



