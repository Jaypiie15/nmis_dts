@extends('records.layouts.master')

@section('content')
			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-user-plus mr-2"></i> <span class="font-weight-semibold">Add User</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Add User</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Form validation -->
				<div class="card">
					<div class="card-header header-elements-inline">
				
					</div>

					<div class="card-body">

						<form class="form-validate-jquery" action="{{ route('store-user') }}" method="POST">
						@csrf	
                        <fieldset class="mb-3">
								<legend class="text-uppercase font-size-sm font-weight-bold">Input User details :</legend>

								<!-- Basic text input -->
								<div class="form-group row">
									<label class="col-form-label col-lg-3">Division name : <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<input type="text" name="division_name" class="form-control" required >
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-form-label col-lg-3">Division email :  <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<input type="text" name="division_email" class="form-control" required >
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-form-label col-lg-3">Account Password <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<input type="password" name="password" class="form-control" required >
									</div>
								</div>

     

                                <div class="form-group row">
									<label class="col-form-label col-lg-3"> <span class="text-danger"></span></label>
									<div class="col-lg-4">
								<button type="submit" class="btn btn-primary ml-3"><i class="icon-plus3 ml-2"> </i> Add User </button>

									</div>
								</div>

								<!-- /basic text input -->


							</fieldset>


							<div class="d-flex justify-content-end align-items-center">
							</div>
						</form>
					</div>
				</div>
				<!-- /form validation -->

			</div>
			<!-- /content area -->

            @endsection

