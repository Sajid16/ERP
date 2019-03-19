@extends('dashboard_master')

@section('page_title')
InfobizSoft-ERP
@endsection

@section('page_style')
<link rel="stylesheet" type="text/css" href="{{asset('dashboard/files/assets/css/style.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

@endsection

@section('dashboard_content')
<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				@if(Session::has('msg'))
				<script>
					$(document).ready(function(){
						swal("{{Session::get('message')}}");
					});
				</script>
				@endif
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-sm-2">
						</div>
						<div class="col-sm-6">
							<div class="page-header-title" style="padding-left: 22%;">
								<div class="d-inline">
									<img src="https://img.icons8.com/dusk/64/000000/classroom.png" style="padding-left: 35%"><h4> Request Training for employees</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				{!! Form::open(['url'=>'/training_management/employee_training_request_confirmation','method'=>'post', 'enctype'=>'multipart/form-data']) !!}		
				<div class="page-body">
					<div class="row">
						<div class="col-sm-2">
						</div>
						<div class="col-sm-6">
							<div class="card row">
								<div class="card-block">
									<h4 class="sub-title">Training Details</h4>
									@foreach($array['employee_training_view'] as $employee_training_view)
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Training Topics</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="topics" readonly="true" value="{{$employee_training_view->name}}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Employee Email</label>
										<div class="col-sm-8">
											<input type="email" class="form-control" name="emp_email" readonly="true" value="{{$employee_training_view->emp_email}}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Proposer Email</label>
										<div class="col-sm-8">
											<input type="email" class="form-control" name="proposer_email" readonly="true" value="{{$employee_training_view->proposer_email}}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Description</label>
										<div class="col-sm-8">
											<textarea type="text" class="form-control" name="trainingDescription" readonly="true">{{$employee_training_view->description}}</textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">From</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="training_from" value="{{$employee_training_view->from}}" readonly="true">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">To</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="training_to" value="{{$employee_training_view->to}}" readonly="true">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Duration</label>
										<span style="padding-left: 15px;"></span>  <span>{{$employee_training_view->duration}} days</span>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Status</label>
										<div class="col-sm-8">
											<select name="training_status" class="form-control" required="true">
												<option value="1">Accepted</option>
												<option value="4">Declined</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Reason to decline (if any)</label>
										<div class="col-sm-8">
											<textarea type="text" class="form-control" rows="5" name="trainingDeclinedReason"></textarea>
										</div>
									</div>
									<input type="hidden" name="training_id" value="{{$employee_training_view->id}}">
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
				<div style="padding-left: 15.5%;">
					<button type="submit" class="btn btn-success btn-square" style="width: 61%;"><i class="fa fa-check-square-o" aria-hidden="true"></i>Confirm Training</button>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
		@endsection

		@section('page_js')

		@endsection