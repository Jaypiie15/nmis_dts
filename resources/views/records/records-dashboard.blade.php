@extends('records.layouts.master')

@section('content')
			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-statistics mr-2"></i> <span class="font-weight-semibold">Dashboard</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Dashboard</span>
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

                        <div class="row">

                            <div class="col-lg-3">

								<div class="card bg-teal-300">
									<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0">{{ $count['count_total'] }}</h3>
					                	</div>
					                	
					                	<div>
											Overall total of Uploaded Documents
										</div>
									</div>

									<div class="container-fluid">
										<div id="members-online"></div>
									</div>
								</div>

							</div>

                            <div class="col-lg-3">

								<div class="card bg-orange-600">
									<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0">{{ $count['count_co'] }}</h3>
					                	</div>
					                	
					                	<div>
											Total no. of Documents from Central Office
										</div>
									</div>

									<div class="container-fluid">
										<div id="members-online"></div>
									</div>
								</div>

							</div>

							<div class="col-lg-3">

								<!-- Today's revenue -->
								<div class="card bg-pink-400">
									<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0">{{ $count['count_rtoc'] }}</h3>
					                	</div>
					                	
					                	<div>
											Total no. of Documents from RTOC
										</div>
									</div>

									<div id="today-revenue"></div>
								</div>
								<!-- /today's revenue -->

							</div>

                            <div class="col-lg-3">

								<!-- Members online -->
								<div class="card bg-blue-600">
									<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0">{{ $count['count_external'] }}</h3>
					                	</div>
					                	
					                	<div>
											Total no. of Documents from External
										</div>
									</div>

									<div class="container-fluid">
										<div id="members-online"></div>
									</div>
								</div>
								<!-- /members online -->

							</div>
						</div>


					</div>
				</div>
				<!-- /form validation -->

			</div>
			<!-- /content area -->

            @endsection



