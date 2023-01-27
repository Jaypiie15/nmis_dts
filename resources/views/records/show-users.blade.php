@extends('records.layouts.master')

@section('content')

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-users4 mr-2"></i> <span class="font-weight-semibold">Manage Users</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Manage Users</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						
					</div>
				</div>
			</div>
			<!-- /page header -->


            <div class="content">

                @if(session()->has('type') =='success')
                <script>
                    Swal.fire({
                        title: 'Success!!',
                        icon: 'success',
                        text: 'User Successfully Edited!',
                        timer: 3000,
                        timerProgressBar: true,
                        showConfirmButton : false
                        }).then((result) => {
                        })
                </script>
                @endif

				<!-- Control position -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Users</h5>
						<div class="header-elements">
							<div class="list-icons">
		      
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
					</div>

					<table class="table datatable-responsive-control-right">
						<thead>
							<tr>
			
								<th>Division Name </th>
								<th>Division Email</th>
								<th>Account Status</th>
								<th>Date Created</th>
								<th class="text-center">Actions</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
                            @foreach($users as $user)
							<tr>

								<td>{{ $user->division_name }}</td>
								<td>{{ $user->division_email }}</td>
								<td>@if($user->trashed()) <span class="badge badge-danger">Deactivated </span> @else <span class="badge badge-success">Active</span> @endif</td>
								<td>{{ Carbon\Carbon::parse($user->created_at)->format('F d,Y')}}</td>

								<td class="text-center">
									{{-- <button type="button" value="{{$employee->emp_id}}" class="btn btn-primary btn-view">View</button> --}}
									<a href="{{ route('edit-user',['division_name' => $user->division_name]) }}" class="btn btn-primary btn-view"><i class="icon-pencil"></i> Edit</a>
										
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
