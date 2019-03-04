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
						<div class="col-lg-12">
							<div class="page-header-title">
								<div class="d-inline">
									<h4>Add Tasks to Employees</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				{!! Form::open(['url'=>'/task_management/individual_task_update','method'=>'post', 'enctype'=>'multipart/form-data']) !!}		
				<div class="page-body">
					<div class="row">
						<div class="col-sm-6">

							<div class="card row">
								<div class="card-block">
									<h4 class="sub-title">Personal Details</h4>
									@foreach($array['task'] as $task)
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Department</label>
										<div class="col-sm-8">
											<select name="emp_dept_name" class="form-control departmentcategory" id="dept_cat_id" required="true" readonly>
												<option value="{{$task->deptId}}">{{$task->dept_name}}</option>
											</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-4 col-form-label">First Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Enter Your First Name" name="emp_fname" id="field1" value="{{$task->emp_fname}}" required readonly="true">
											<label><small>*your first name must match your NID name and contains the full length except the last name.</small></label>
										</div>
										<div id="fnameList"></div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Last Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Enter Your Last Name" name="emp_lname" id="field2" value="{{$task->emp_lname}}" required readonly="true">
											<label><small>*your last name must match your NID name.</small></label>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Email</label>
										<div class="col-sm-8">
											<input type="email" class="form-control" placeholder="Enter Your Email" name="emp_email" value="{{$task->emp_email}}" required readonly="true">
										</div>
									</div>																
								</div>
							</div>

						</div>

						<div class="col-sm-5 ml-4">
							<div class="card row">
								<div class="card-block">
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Employee ID</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Enter Your Employee ID" name="emp_id" value="{{$task->emp_id}}"  required readonly="true">
										</div>
									</div>	
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Issue Date</label>
										<div class="col-sm-8">
											<input type="date" class="form-control" placeholder="Enter Your Joining Date" name="taskStartDate" value="{{$task->emp_startDate}}"  required readonly="true">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">End Date</label>
										<div class="col-sm-8">
											<input type="date" class="form-control" placeholder="Enter Your Joining Date" name="taskEndDate" value="{{$task->emp_endDate}}"  required readonly="true">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Description</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Enter task description" name="taskDescription" value="{{$task->emp_taskDescription}}"  required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Department</label>
										<div class="col-sm-8">
											<select name="task_status" class="form-control departmentcategory" id="dept_cat_id" required="true" readonly>
												<option value="1">On Progress</option>
												<option value="2">Completed</option>
											</select>
										</div>
									</div>
									<input type="hidden" name="task_id" value="{{$task->id}}">
								</div>
							</div>
						</div>
						@endforeach
					</div>				
				</div>

				<div class="mr-4 pr-3">
					<button type="submit" class="btn btn-success btn-square pull-right mr-5"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Update task Status</button>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection

@section('page_js')

@endsection