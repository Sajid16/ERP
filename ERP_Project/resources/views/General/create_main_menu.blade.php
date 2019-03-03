@extends('dashboard_master')
@section('page_title')
InfobizSoft-ERP
@endsection
@section('page_style')
<link rel="stylesheet" type="text/css" href="{{asset('dashboard/files/assets/css/style.css')}}">
@endsection
@section('dashboard_content')

<div class="pcoded-content">
	<div class="pcoded-inner-content">

		<div class="main-body">
			<div class="page-wrapper">

				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<div class="d-inline">
									<h4><strong>Department management</strong></h4>
									<span>Department List</span>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="{{route('home')}}"> <i class="feather icon-home"></i> </a>
									</li>
									<li class="breadcrumb-item"><a href="{{route('createmainMenu')}}">create main menu</a>
									</li>
									
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="page-body">

					<div class="card">
						<div class="card-header">
							<h5><strong>Department Management</strong></h5>	
						</div>
						<div class="card-block table-border-style">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>ID</th>
											<th>Department Name</th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php $serial = 0 ?>
										@foreach($dashboard_array['main_menu'] as $menuList)	
										<tr>
											<td>{{++$serial}}</th>
												<td>{{$menuList->mainMenuName}}</td>
												@if($menuList->action == 1)
												<td><a href="#" class="btn btn-danger" role="button">Inactivate</a></td>

												@else
												<td><a href="#" class="btn btn-success" role="button">Activate</a></td>

												@endif	
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>		
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection

