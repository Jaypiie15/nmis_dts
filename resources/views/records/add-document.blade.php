@extends('records.layouts.master')

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


						<form class="form-validate-jquery" action="{{ route('store-document') }}" method="POST" enctype="multipart/form-data">
						@csrf	
                        <fieldset class="mb-3">
								<legend class="text-uppercase font-size-sm font-weight-bold">Input Document details :</legend>

								<!-- Basic text input -->
								<div class="form-group row">
									<label class="col-form-label col-lg-3">Email address of originating : <span class="text-danger">*</span></label>
									<div class="col-lg-3">
										<input type="text" name="email_address" class="form-control" required >
									</div>
									<div class="col-lg-4">
										<label class="col-form-label col-lg-3"> Notify User? </label>
										<input type="checkbox" name="notify_user" checked > 
								</div>
								</div>

								<!-- <div class="form-group row">
									<label class="col-form-label col-lg-3">Document Origin :  <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<select class="form-control select22" id="category_from" name="category_from" required>
											<option value="">-- Choose one --</option>
											<option value="CO">Central Office</option>
											<option value="RTOC">RTOC</option>
											<option value="External">External</option>
										</select>
									</div>
								</div> -->

                                <div class="form-group row from_office">
									<label class="col-form-label col-lg-3">From (Office) :  <span class="text-danger">*</span></label>
									<div class="col-lg-4">
									<select class="form-control select22" id="from_office" name="from_office" required>
											<option value="">-- Choose one --</option>
											<option value="ACCOUNTING">ACCOUNTING</option>
											<option value="ADMIN">ADMIN</option>
											<option value="ARD">ARD</option>
											<option value="BAC">BAC</option>
											<option value="BUDGET">BUDGET</option>
											<option value="CASHIER">CASHIER</option>
											<option value="COA">COA</option>
											<option value="ENGINEERING">ENGINEERING</option>
											<option value="External">EXTERNAL</option>
											<option value="FMO">FMO</option>
											<option value="HRD">HRD</option>
											<option value="HRM">HRM</option>
											<option value="LABORATORY">LABORATORY</option>
											<option value="MIED">MIED</option>
											<option value="MOTORPOOL">MOTORPOOL</option>
											<option value="MSDCPD">MSDCPD</option>
											<option value="OED">OED</option>
											<option value="ODED">ODED</option>
											<option value="PIMD">PIMD</option>
											<option value="PIMD-IT">PIMD-IT</option>
											<option value="PMO">PMO</option>
											<option value="PROPERTY">PROPERTY</option>
											<option value="POSMD">POSMD</option>
											<option value="QMS">QMS</option>
											<option value="RECORDS">RECORDS</option>
											<option value="SCO">SCO</option>
											<option value="RTOC CAR">RTOC CAR</option>
											<option value="RTOC NCR">RTOC NCR</option>
											<option value="RTOC 1">RTOC 1</option>
											<option value="RTOC 2">RTOC 2</option>
											<option value="RTOC 3">RTOC 3</option>
											<option value="RTOC 4A">RTOC 4A</option>
											<option value="RTOC 4B">RTOC 4B</option>
											<option value="RTOC 5">RTOC 5</option>
											<option value="RTOC 6">RTOC 6</option>
											<option value="RTOC 7">RTOC 7</option>
											<option value="RTOC 8">RTOC 8</option>
											<option value="RTOC 9">RTOC 9</option>
											<option value="RTOC 10">RTOC 10</option>
											<option value="RTOC 11">RTOC 11</option>
											<option value="RTOC 12">RTOC 12</option>
											<option value="RTOC CARAGA">RTOC CARAGA</option>
										</select>
									</div>
								</div>

								<div class="form-group row external_document">
									<label class="col-form-label col-lg-3">Input External Agency/Company Name :  <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<input type="text" name="external_document" class="form-control" >
									</div>
								</div>

                                <div class="form-group row">
									<label class="col-form-label col-lg-3">Document Type : <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<select class="form-control select22" id="document_type" name="document_type" required>
											<option value="">-- Choose one --</option>
											<!-- <option value="Memorandum">Memorandum (Memo)</option>
											<option value="Memorandum Order">Memorandum Order (MO)</option>
											<option value="Memorandum Circular">Memorandum Circular (MC)</option>
											<option value="Special Order">Special Order (SO)</option>
											<option value="DA-NMIS Deputation Order">DA-NMIS Deputation Order (DA-NMIS DO)</option>
											<option value="Alert Order (AO)">Alert Order (AO)</option>
											<option value="Praise Resolution">Praise Resolution</option>
											<option value="SCPMT Resolution">SCPMT Resolution</option>
											<option value="Letters">Letters</option>
											<option value="Endorsement">Endorsement for Accreditation, Registration, Licensing and Permits</option> -->
											<option value="Administrative Circular">Administrative Circular</option>
											<option value="Administrative Order">Administrative Order</option>
											<option value="Announcement">Announcement</option>
											<option value="Disbursement Voucher">Disbursement Voucher</option>
											<option value="Endorsement">Endorsement for Accreditation, Registration, Licensing and Permits</option>
											<option value="Letters">Letters</option>
											<option value="Memorandum">Memorandum</option>
											<option value="Memorandum Order">Memorandum Order (MO)</option>
											<option value="Memorandum Circular">Memorandum Circular (MC)</option>
											<option value="Notice of Meeting">Notice of Meeting</option>
											<option value="Project Brief">Project Brief</option>
											<option value="Purchase Request">Purchase Request</option>
											<option value="Reports">Reports</option>
											<option value="Special Order">Special Order (SO)</option>

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
									<label class="col-form-label col-lg-3">Document remarks :  <span class="text-danger">*</span></label>
									<div class="col-lg-4">
										<input type="text" name="document_remarks" class="form-control" >
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

	$('.external_document').hide()

	$('#from_office').change(function(){
		if($(this).val() == 'External')
		{
			$('.external_document').show()
		}
		else{
			$('.external_document').hide()
		}
	})

})
</script>

