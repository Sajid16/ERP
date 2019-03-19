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
				{!! Form::open(['url'=>'/training_management/all_training_request_check','method'=>'post', 'enctype'=>'multipart/form-data']) !!}		
				<div class="page-body">
					<div class="row">
						<div class="col-sm-2">
						</div>
						<div class="col-sm-6">
							<div class="card row">
								<div class="card-block">
									<h4 class="sub-title">Training Details</h4>
									@foreach($array['all_training_requests'] as $all_training_requests)
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Training Topics</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="topics" readonly="true" value="{{$all_training_requests->name}}" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Employee Email</label>
										<div class="col-sm-8">
											<input type="email" class="form-control" name="emp_email" readonly="true" value="{{$all_training_requests->emp_email}}" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Proposer Email</label>
										<div class="col-sm-8">
											<input type="email" class="form-control" name="proposer_email" readonly="true" value="{{$all_training_requests->proposer_email}}" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Description</label>
										<div class="col-sm-8">
											<textarea type="text" class="form-control" rows="5" name="trainingDescription" readonly="true" required>{{$all_training_requests->description}}</textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">From</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="mm/dd/yyyy" name="training_from" id="date1" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">To</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="mm/dd/yyyy" name="training_to" id="date2" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Duration</label>
										<span id='diff' style="padding-left: 15px;"></span>  <span> </span>
										<input type="hidden" name="duration" id="duration">
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Status</label>
										<div class="col-sm-8">
											<select name="training_status" class="form-control" required="true">
												<option value="3">Proposed</option>
												<option value="2">Refused</option>
											</select>
										</div>
									</div>
									<input type="hidden" name="training_id" value="{{$all_training_requests->id}}">
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
				<div style="padding-left: 15.5%;">
					<button type="submit" class="btn btn-success btn-square" style="width: 61%;"><i class="fa fa-check-square-o" aria-hidden="true"></i>Arrange Training</button>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
		@endsection

		@section('page_js')

		<script type="text/javascript">
			
			$('#date1').datepicker();
			$('#date2').datepicker();

			$('#date2').change(function() {
				var diff = $('#date1').datepicker("getDate") - $('#date2').datepicker("getDate");
				diff = (diff / (1000*60*60*24) * -1)+1;
				$('#diff').text(diff+" days");
				document.getElementById('duration').value = diff;
			});

		</script>

		@endsection