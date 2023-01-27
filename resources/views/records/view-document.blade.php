@extends('records.layouts.master')

@section('content')

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-files-empty mr-2"></i> <span class="font-weight-semibold">Manage Document</span></h4>
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

            @if(session()->has('type') =='success')
            <script>
                Swal.fire({
                    title: 'Success!!',
                    icon: 'success',
                    text: 'Successfully received document!',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton : false
                    }).then((result) => {
                    })
            </script>
            @endif

            <div class="content">


				<!-- Control position -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Document Trails for <b> {{ $document->tracking_number }} </b></h5>
						<div class="header-elements">
							<div class="list-icons">
		      
		                	</div>
	                	</div>
					</div>

					<div class="card-body">

                            <div class="list-feed">
                                @foreach($tracking as $track)

                                <div class="list-feed-item border-warning-400">
                                    <div class="text-muted">{{ $track->created_at->format('F d,Y H:ia') }}</div>
                                     {{ $track->document_remarks }}
                                </div>

                                @endforeach
                            </div>


                        <fieldset class="card-body">
                            <h3 class="font-weight-semibold mt-1 mb-3">Document Details</h3>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><b>From (Office) : </b></label>
                                        <input type="text" class="form-control" value="{{ $document->from_office }}"  disabled>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><b>Document Type : </b></label>
                                        <input type="text" class="form-control" value="{{ $document->document_type }}"  disabled>

                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><b>Document Remarks : </b></label>
                                        <input type="text" class="form-control" value="{{ $document->document_remarks }}"  disabled>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><b>Email address : </b></label>
                                        <input type="text" class="form-control" value="{{ $document->email_address }}"  disabled>

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>Document Title :  </b></label>
                                        <input type="text"  class="form-control" value="{{ $document->document_title }}" disabled>
                                    </div>
                                </div>

                    
                            </div>

                        </fieldset>

                        <fieldset class="card-body">

                            <h3 class="font-weight-semibold mt-1 mb-3">Actions</h3>

                            <a href="{{ route('edit-document',['tracking_number' => $document->tracking_number]) }}" class="btn bg-primary">Edit Document <i class="icon-pencil ml-2"></i></a>
                            <button class="btn bg-danger" data-toggle="modal" data-target="#modal_theme_danger">Delete Document <i class="icon-trash ml-2"></i></button>
                            <button type="submit" data-toggle="modal" data-target="#modal-login" class="btn btn-success btn-receive">Receive Document <i class="icon-check ml-2"></i></button>
                            <a href="{{ route('print-document',['tracking_number' => $document->tracking_number]) }}" class="btn bg-warning">Print Document <i class="icon-printer ml-2"></i></a>

                        </fieldset>
					</div>


                    <div id="modal-login" class="modal fade" tabindex="-1">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">

                                <!-- Form -->
                                <form class="modal-body form-validate" method="POST" action="{{ route('receive-document') }}">
                                    @csrf
                                    <div class="text-center mb-3">
                                        <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                        <h5 class="mb-0">Please input your name</h5>
                                        <span class="d-block text-muted">Office : {{ Auth::user()->division_name }}</span>
    
                                    </div>
    
                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                        <input type="text" class="form-control" name="received_by" placeholder="Name of Receiver" required>
                                        <div class="form-control-feedback">
                                            <i class="icon-user text-muted"></i>
                                        </div>
                                    </div>
                                    <input type="hidden" name="division_name" value="{{ Auth::user()->division_name }}">
                                    <input type="hidden" name="tracking_number" value="{{ $document->tracking_number }}">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Submit <i class="icon-circle-right2 ml-2"></i></button>
                                    </div>
                                </form>
                                <!-- /form -->

                            </div>
                        </div>
                    </div>

                    <div id="modal_theme_danger" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="modal-body" method="POST" action="{{ route('delete-document') }}">
                                    @csrf
                                <div class="modal-header bg-danger">
                                    <h6 class="modal-title">Delete Document</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
    
                                <div class="modal-body">
                                    <h6 class="font-weight-semibold">Are you sure you want to delete this document?</h6>

                                </div>
                                <input type="hidden" name="tracking_number" value="{{ $document->tracking_number }}">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">No</button>
                                    <button type="submit" class="btn bg-danger">Yes, delete it</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>

				</div>
				<!-- /control position -->
            </div>
  
@endsection
