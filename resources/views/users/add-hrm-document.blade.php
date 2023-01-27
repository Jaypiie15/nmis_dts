@extends('users.layouts.master')

@section('content')
			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-file-plus2 mr-2"></i> <span class="font-weight-semibold">Add Document</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Add Document</span>
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


						<form class="form-validate-jquery" action="{{ route('user-store-document') }}" method="POST" enctype="multipart/form-data">
						@csrf	
                        <fieldset class="mb-3">
								<legend class="text-uppercase font-size-sm font-weight-bold">Input Document details :</legend>

								<!-- Basic text input -->
								<div class="form-group row">
									<label class="col-form-label col-lg-3">Email address of originating : <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<input type="text" name="email_address" class="form-control" required >
									</div>
								</div>

								<div class="form-group row">
									<label class="col-form-label col-lg-3">Document Origin :  <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<select class="form-control select22" id="category_from" name="category_from" required>
											<option value="">-- Choose one --</option>
											<option value="CO">Central Office</option>
											<option value="RTOC">RTOC</option>
										</select>
									</div>
								</div>

                                <div class="form-group row from_office">
									<label class="col-form-label col-lg-3">From (Office) :  <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<input type="text" name="from_office" class="form-control" required >
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-form-label col-lg-3">Document Type : <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<select class="form-control select22" id="document_type" name="document_type" required>
											<option value="">-- Choose one --</option>
											<option value="Travel Order">Travel Order</option>
											<option value="Leave Accomplishment Form">Leave Accomplishment Form</option>
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-form-label col-lg-3">Document Title :  <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<input type="text" name="document_title" class="form-control" required >
									</div>
								</div>


     

                                <div class="form-group row">
									<label class="col-form-label col-lg-3"> <span class="text-danger"></span></label>
									<div class="col-lg-4">
								<button type="submit" class="btn btn-primary ml-3" onclick="this.disabled=true;this.value='Submitting...';this.form.submit();"><i class="icon-plus3 ml-2"> </i> Add Document </button>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script>
$(function(){
    $('.select22').select2();

	$('.from_office').hide()

	$('#category_from').change(function(){
		if($(this).val() == '')
		{
			$('.from_office').hide()
		}
		else{
			$('.from_office').show()
		}
	})
})
</script>

