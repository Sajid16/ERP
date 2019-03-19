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
				{!! Form::open(['url'=>'/training_management/training_request_save','method'=>'post', 'enctype'=>'multipart/form-data']) !!}		
				<div class="page-body">
					<div class="row">
						<div class="col-sm-2">
						</div>
						<div class="col-sm-6">
							<div class="card row">
								<div class="card-block">
									<h4 class="sub-title">Training Details</h4>

									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Training On</label>
										<div class="col-sm-8">
											<select name="training_topics" class="form-control" required="true">
												<option value="0" disabled="true" selected="true">Select Training Topics</option>
												@foreach($array['training_topics'] as $training_topics)
												<option value="{{$training_topics->id}}">{{$training_topics->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Employee Email</label>
										<div class="col-sm-8">
											<input type="email" class="form-control" placeholder="Enter team member Email" name="emp_email" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Proposed by</label>
										<div class="col-sm-8">
											@foreach($array['user_info'] as $user_info)
											<input type="email" class="form-control" placeholder="Enter Your Email" name="proposer_email" readonly="true" value="{{$user_info->emp_email}}" required>
											@endforeach
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Description</label>
										<div class="col-sm-8">
											<textarea type="text" class="form-control" rows="5" placeholder="Enter training description" name="trainingDescription" required></textarea>
										</div>
									</div>																
								</div>
							</div>
						</div>
					</div>				
				</div>

				<div style="padding-left: 15.5%;">
					<button type="submit" class="btn btn-success btn-square" style="width: 61%;"><i class="fa fa-paper-plane" aria-hidden="true"></i>Request Training</button>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection

@section('page_js')



@endsection