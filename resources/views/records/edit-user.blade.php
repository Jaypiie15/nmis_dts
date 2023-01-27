@extends('records.layouts.master')

@section('content')
			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-pencil mr-2"></i> <span class="font-weight-semibold">Edit User</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Edit User</span>
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

						<form class="form-validate-jquery" action="{{ route('update-user') }}" method="POST">
						@csrf	
                        <fieldset class="mb-3">
								<legend class="text-uppercase font-size-sm font-weight-bold">Edit User details :</legend>

								<!-- Basic text input -->
								<div class="form-group row">
									<label class="col-form-label col-lg-3">Division name : <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<input type="text" name="division_name" class="form-control" value="{{ $user->division_name }}" required >
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-form-label col-lg-3">Division email :  <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<input type="text" name="division_email" class="form-control" value="{{ $user->division_email }}" required >
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-form-label col-lg-3">Account Password <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<input type="password" name="password" class="form-control" value="{{ $user->password }}" required >
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-form-label col-lg-3">Account Status :  <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<select name="account_status" class="form-control" >
                                            <option value="Activate" @if($user->deleted_at == NULL) selected @endif> Activate</option>
                                            <option value="Deactivate" @if($user->deleted_at != NULL) selected @endif> Deactivate</option>
                                        </select>
									</div>
								</div>
                                <input type="hidden" name="div_name" value="{{ $user->division_name }}">
     

                                <div class="form-group row">
									<label class="col-form-label col-lg-3"> <span class="text-danger"></span></label>
									<div class="col-lg-4">
								<button type="submit" class="btn btn-primary ml-3"><i class="icon-pencil ml-2"> </i> Update User </button>

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

