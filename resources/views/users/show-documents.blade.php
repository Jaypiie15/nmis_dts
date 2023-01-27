@extends('users.layouts.master')

@section('content')

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-files-empty mr-2"></i> <span class="font-weight-semibold">Manage Documents</span></h4>
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
						<h5 class="card-title">Documents</h5>
						<div class="header-elements">
							<div class="list-icons">
		      
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
					</div>

					@if (session()->has('url'))
                    <script>
                        Swal.fire({
                            title: 'Success!!',
                            icon: 'success',
                            text: 'Document has been added!',
                            timer: 3000,
                            timerProgressBar: true,
                            showConfirmButton : false
                            }).then((result) => {
                                window.open('{{session()->get('url')}}', "_blank");
                            })
                    </script>
                     @endif
					<table class="table datatable-responsive-control-right">
						<thead>
							<tr>
			
								<th>Tracking # </th>
								<th>From (Office)</th>
								<th>Document Title</th>
								<th>Document Type</th>
								<th class="text-center">Actions</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
                            @foreach($documents as $document)
							<tr>

								<td>{{ $document->tracking_number }}</td>
								<td>{{ $document->from_office }}</td>
								<td>{{ $document->document_title }}</td>
								<td>{{ $document->document_type }}</td>

								<td class="text-center">
									<a href="{{ route('user-view-document',['tracking_number' => $document->tracking_number]) }}" class="btn btn-primary btn-view"><i class="icon-eye"></i> View</a>
										
								</td>
								<td></td>
							</tr>
                            @endforeach

						</tbody>
					</table>
				</div>
				<!-- /control position -->
            </div>
  
@endsection
