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
						<div class="col-lg-12">
							<div class="page-header-title">
								<div class="d-inline">
									<h4>Privilege Settings</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
				{!! Form::open(['url'=>'/previledge/superAdmin','method'=>'post', 'role'=>'form ']) !!}
					<div class="page-body">
						<div class="col-sm-12 col-xl-6 m-b-30">

							<div class="form-group row md-4">
								<label class="col-sm-2 col-form-label">User Email</label>
								<div class="col-sm-8">
									<select name="email" class="form-control">
										<option value="0">Select an Email</option>
										@foreach($dashboard_array['test_email'] as $user_email)
										<option value="{{$user_email->email}}" name="email">{{$user_email->email}}</option>
										@endforeach
									</select>

								</div>
							</div>
							<div class="mt-3">
								<h4>Menu</h4>
							</div>
							<hr>
						</div>
						
						<div class="container">
							<div class="row">	
								<div class="col-sm-4">
									@foreach($dashboard_array['main_menu'] as $mainmenu)
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="{{$mainmenu->id}}" id="defaultCheck1" name="Privilege_main_menu">
										<label class="form-check-label" for="defaultCheck1">
											{{$mainmenu->name}}
										</label><br>
									</div>
									@endforeach
								</div>
								
								
							</div>
						</div>
					</div>
					<div class="container">
						<div class="row">
							<div class="col-sm-12" style="margin-top: 40px; float: right;">
								<button type="submit" class="btn btn-success btn-square pull-right mr-5" style="width: 130px;"> Permission </button>
							</div>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection