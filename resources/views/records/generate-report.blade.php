@extends('records.layouts.master')

@section('content')

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-files-empty mr-2"></i> <span class="font-weight-semibold">Generate Reoirt</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Manage Documents</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						
					</div>
				</div>
			</div>
			<!-- /page header -->


            <div class="content">


				<!-- Control position -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Filter Document Records</h5>
						<div class="header-elements">
							<div class="list-icons">
		      
		                	</div>
	                	</div>
					</div>
                <form method="POST" action="{{ route('filter-report') }}">
					<div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                            <label class="col-form-label"><b>Select Date range : </b><span class="text-danger">*</span></label>

                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="text" id="reportrange" class="form-control" name="datefilter" value="" autocomplete="off"/>
                                    <i class="fa fa-calendar"></i>&nbsp;
                                    <span></span> <i class="fa fa-caret-down"></i>
                                    <input type="hidden" name="start_date" id="start_date" value="">
                                    <input type="hidden" name="end_date" id="end_date" value="">
                                    <div class="form-control-feedback">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                            <label class="col-form-label"><b>Document Origin : </b><span class="text-danger">*</span></label>

                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <select class="form-control multiselect-select-all" multiple="multiple" data-fouc id="from_office" name="from_office">
                                        <option value="CO">Central Office</option>
                                        <option value="RTOC">RTOC</option>
                                        <option value="External">External</option>
                                    </select>
                                    <div class="form-control-feedback">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label class="col-form-label"><b>Document Type : </b><span class="text-danger">*</span></label>

                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <select class="form-control multiselect-select-all" multiple="multiple" data-fouc id="document_type" name="document_type">
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
											<option value="Notice of Meeting">Notice of Meeting</option>
											<option value="Project Brief">Project Brief</option>
											<option value="Purchase Request">Purchase Request</option>
											<option value="Reports">Reports</option>
                                    </select>
                                    <div class="form-control-feedback">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="submit_type" value="POST">

                        </div>


                        <div class="row">
                            <div class="col-md-3">
								{{-- <button type="submit" class="btn btn-success ml-3"> Filter <i class="icon-search4 ml-2"> </i></button> --}}

                                </div>
                        </div>

					</div>
                </form>


					<table class="table" id="report-table">
						{{-- <thead>
							<tr>

								<th>Timestamp</th>
								<th>Tracking # </th>
								<th>From (Office)</th>
								<th>Document Title</th>
								<th>Email address</th>
								<th>Document Type</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($documents as $document)
							<tr>
								<td>{{ Carbon\Carbon::parse($document->created_at)->format('F d,Y H:ia')}}</td>
								<td>{{ $document->tracking_number }}</td>
								<td>{{ $document->from_office }}</td>
								<td>{{ $document->document_title }}</td>
								<td>{{ $document->email_address }}</td>
								<td>{{ $document->document_type }}</td>

							</tr>
                            @endforeach

						</tbody> --}}
					</table>
				</div>
				<!-- /control position -->
            </div>
  
@endsection
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript">




    $(function() {


        $('.multiselect-select-all').multiselect({
            includeSelectAllOption: true
        });


  
 
        
        $('.select22').select2();
    
        var start = moment().subtract(29, 'days');
        var end = moment();
    
        // function cb(start, end) {
        //     $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //     console.log( $('#reportrange').val())
        // }
    
        $('#reportrange').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                format: 'DD/MM/YYYY',
                cancelLabel: 'Clear'
            }
            // ranges: {
            // //    'Today': [moment(), moment()],
            // //    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            // //    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            // //    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            //    'This Month': [moment().startOf('month'), moment().endOf('month')],
            // //    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            // }
        // }, cb);
            })

            $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            $('#start_date').val(picker.startDate.format('YYYY-MM-DD'))
            $('#end_date').val(picker.endDate.format('YYYY-MM-DD'))

            var start_date = picker.startDate.format('YYYY-MM-DD')
            var end_date = picker.endDate.format('YYYY-MM-DD')
            $("#report-table").empty();

            $.ajax({  
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type : 'POST',
            url : "{{ route('filter-report')}}",
            data : {start_date : start_date, end_date : end_date },
              success:function(data){
                
                $('#report-table').html(data);

                $('#report-table').DataTable( {
                    dom: 'Bfrtip',
                    "bDestroy": true,
                    buttons: {            
                            dom: {
                                button: {
                                    className: 'btn btn-success'
                                }
                            },
                            buttons: [
                                'csvHtml5',
                                'pdfHtml5'
                            ]
                        }
                } );


                }

              })

}); 

                $('#from_office').on('change', function (e) {   

                    e.preventDefault();
                    var start_date = $('#start_date').val()
                    var end_date = $('#end_date').val()
                    var from_office = $(this).val();

                    $("#report-table").empty();

                    $.ajax({  
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type : 'POST',
                        url : "{{ route('filter-report')}}",
                        data : { start_date : start_date, end_date : end_date, from_office : from_office },
                        success:function(data){
                            $('#report-table').html(data);

                            $('#report-table').DataTable( {
                            dom: 'Bfrtip',
                            "bDestroy": true,
                            buttons: {            
                                    dom: {
                                        button: {
                                            className: 'btn btn-success'
                                        }
                                    },
                                    buttons: [
                                        'csvHtml5',
                                        'pdfHtml5'
                                    ]
                                }
                        } );

                            }
                        })

                })

                $('#document_type').on('change', function (e) {   

                    e.preventDefault();
                    var start_date = $('#start_date').val()
                    var end_date = $('#end_date').val()
                    var document_type = $(this).val();

                    $("#report-table").empty();

                    $.ajax({  
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type : 'POST',
                        url : "{{ route('filter-report')}}",
                        data : { start_date : start_date, end_date : end_date, document_type : document_type },
                        success:function(data){

                            $('#report-table').html(data);

                            $('#report-table').DataTable( {
                            dom: 'Bfrtip',
                            "bDestroy": true,
                            buttons: {            
                                    dom: {
                                        button: {
                                            className: 'btn btn-success'
                                        }
                                    },
                                    buttons: [
                                        'csvHtml5',
                                        'pdfHtml5'
                                    ]
                                }
                        } );
                            }
                        })

                    })

 

        // cb(start, end);
    
    });
    </script>
