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
						<div class="col-lg-12">
							<div class="page-header-title">
								<div class="d-inline">
									<h4>Leave Request Application</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				{!! Form::open(['url'=>'/employee_management/employee_save','method'=>'post', 'enctype'=>'multipart/form-data']) !!}		
				<div class="page-body">
					<div class="row">
						<div class="col-sm-6">

							<div class="card row">
								<div class="card-block">
									<h4 class="sub-title">Leave Details</h4>

									<div class="form-group row">
										<label class="col-sm-4 col-form-label">First Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Employee first name" name="emp_fname" id="field1" readonly="true" required>		
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Last Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Employee last name" name="emp_lname" id="field2"  readonly="true" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Email</label>
										<div class="col-sm-8">
											<input type="email" class="form-control" placeholder="Employee email" name="emp_email"  readonly="true" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Start on</label>
										<div class="col-sm-8">
											<select name="emp_dept_name" class="form-control departmentcategory" id="start" onclick="myFunction1()">
												<option value="0" disabled="true" selected="true">Select Start Time</option>
												<option value="1">Morning</option>
												<option value="2">Afternoon</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">End on</label>
										<div class="col-sm-8">
											<select name="emp_dept_name" class="form-control departmentcategory" id="end" onclick="myFunction1()">
												<option value="0" disabled="true" selected="true">Select End Time</option>
												<option value="1">Morning</option>
												<option value="2">Afternoon</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">From</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Enter start session" name="emp_date_of_birth" id="date1" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">To</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Enter end session" name="emp_date_of_birth" id="date2" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Duration</label>
										<span id='diff' style="padding-left: 15px;"></span>  <span> </span>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Leave Reason</label>
										<div class="col-sm-8">
											<select name="emp_dept_name" class="form-control departmentcategory" id="dept_cat_id">
												<option disabled="true" selected="true">Select Reason</option>
												<option value="m">Morning</option>
												<option value="af">Afternoon</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>				
				</div>

				<div style="float: left;">
					<button type="submit" class="btn btn-success btn-square pull-right mr-5"><i class="fa fa-paper-plane" aria-hidden="true"></i>Send Request</button>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection

@section('page_js')

<script type="text/javascript">

	var start,end;
	function myFunction1(){
		start = document.getElementById("start").value;
		end = document.getElementById("end").value;
		$('#date1').datepicker();
		$('#date2').datepicker();

		$('#date2').change(function () {
			var diff = $('#date1').datepicker("getDate") - $('#date2').datepicker("getDate");
			diff = diff / (1000 * 60 * 60 * 24) * -1;
			// diff = diff;
			if(diff<0){
				$('#diff').text("Date not correct!");
			}
			// else if((diff==0)&&(start!=end)){
			// 	$('#diff').text(diff+" days");
			// }
			// else if((diff==0)&&(start==end)){
			// 	$('#diff').text(diff+" days");
			// }
			// else if((diff>0)&&(start>end)){
			// 	diff = diff-(diff/2);
			// 	$('#diff').text(diff+" days");
			// }
			// else if((diff>0)&&(start!=end)){
			// 	$('#diff').text(diff+" days");
			// }
			// else if((diff=0)&&(start==end)){
			// 	diff = diff+0.5;
			// 	$('#diff').text(diff+" days");
			// }
			else if((diff==0)&&(start==1)&&(end==2)){
				diff = diff+1;
				$('#diff').text(diff+" days");
			}
			else if((diff>0)&&(start==2)&&(end==1)){
				$('#diff').text(diff+" days");
			}
			else if((diff>0)&&(start==2)&&(end==1)){
				diff = diff-0.5;
				$('#diff').text(diff+" days");
			}
			else if((diff>0)&&(start==1)&&(end==2)){
				diff = diff+1;
				$('#diff').text(diff+" days");
			}
			else if((diff>0)&&(start==2)&&(end==2)){
				$('#diff').text(diff+" days");
			}
			else if((diff>0)&&(start==end)){
				diff = diff+0.5;
				$('#diff').text(diff+" days");
			}
			else{
				diff = diff+0.5;
				$('#diff').text(diff+" days");
			}
		});
		// console.log(start);
	}
	// function myFunction2(){
	// 	end = document.getElementById("end").value;
	// 	// console.log(end);
	// }
	// console.log(start);
	// console.log(end);
	// $('#date1').datepicker();
	// $('#date2').datepicker();

	// $('#date2').change(function () {
	// 	var diff = $('#date1').datepicker("getDate") - $('#date2').datepicker("getDate");
	// 	diff = diff / (1000 * 60 * 60 * 24) * -1;
	// 	if(diff<0){
	// 		$('#diff').text("not correct!");
	// 	}
	// 	else{
	// 		$('#diff').text(diff+" days");
	// 	}
	// });

</script>
@endsection