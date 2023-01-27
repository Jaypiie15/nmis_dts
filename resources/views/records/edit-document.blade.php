@extends('records.layouts.master')

@section('content')
			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-pencil mr-2"></i> <span class="font-weight-semibold">Edit Document</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Edit Document</span>
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

						<form class="form-validate-jquery" action="{{ route('update-document') }}" method="POST">
						@csrf	
                        <fieldset class="mb-3">
								<legend class="text-uppercase font-size-sm font-weight-bold">Edit Document details :</legend>

								<!-- Basic text input -->
								<div class="form-group row">
									<label class="col-form-label col-lg-3">Email address : <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<input type="text" name="email_address" class="form-control" value="{{ $document->email_address }}" required >
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-form-label col-lg-3">From (Office) :  <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<input type="text" name="from_office" class="form-control" value="{{ $document->from_office }}" required >
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-form-label col-lg-3">Document Type : <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<input type="text" name="document_type" class="form-control" value="{{ $document->document_type }}" required >
									</div>
								</div>

								<div class="form-group row">
									<label class="col-form-label col-lg-3">Document Title :  <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<input type="text" name="document_title" class="form-control" value="{{ $document->document_title }}" required >
									</div>
								</div>

								<div class="form-group row">
									<label class="col-form-label col-lg-3">Document remarks :  <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<input type="text" name="document_remarks" class="form-control" value="{{ $document->document_remarks }}" required >
									</div>
								</div>
                                <input type="hidden" name="tracking_number" value="{{ $document->tracking_number }}">
     

                                <div class="form-group row">
									<label class="col-form-label col-lg-3"> <span class="text-danger"></span></label>
									<div class="col-lg-4">
								<button type="submit" class="btn btn-primary ml-3"> Update Document <i class="icon-pencil ml-2"> </i></button>

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

