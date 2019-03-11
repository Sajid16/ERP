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
				{!! Form::open(['url'=>'/leave_management/leave_request_send','method'=>'post', 'enctype'=>'multipart/form-data']) !!}		
				<div class="page-body">
					<div class="row">
						<div class="col-sm-6">

							<div class="card row">
								<div class="card-block">
									<h4 class="sub-title">Leave Details</h4>
									@foreach($array['user_info'] as $user_info)
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">First Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Employee first name" name="emp_fname" id="field1" readonly="true" value="{{$user_info->emp_fname}}" required>		
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Last Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Employee last name" name="emp_lname" id="field2"  readonly="true" value="{{$user_info->emp_lname}}" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Email</label>
										<div class="col-sm-8">
											<input type="email" class="form-control" placeholder="Employee email" name="emp_email"  readonly="true" value="{{$user_info->emp_email}}" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Start on</label>
										<div class="col-sm-8">
											<select name="leave_start" class="form-control departmentcategory" id="start" onclick="myFunction1()">
												<option value="0" disabled="true" selected="true">Select Start Time</option>
												<option value="1">Morning</option>
												<option value="2">Afternoon</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">End on</label>
										<div class="col-sm-8">
											<select name="leave_end" class="form-control departmentcategory" id="end" onclick="myFunction1()">
												<option value="0" disabled="true" selected="true">Select End Time</option>
												<option value="1">Morning</option>
												<option value="2">Afternoon</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">From</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Enter start session" name="leave_from" id="date1" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">To</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Enter end session" name="leave_to" id="date2" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Duration</label>
										<span id='diff' style="padding-left: 15px;"></span>  <span> </span>
										<input type="hidden" name="duration" id="duration">
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Leave Reason</label>
										<div class="col-sm-8">
											<select name="leave_reason" class="form-control departmentcategory" id="dept_cat_id">
												<option disabled="true" selected="true">Select Reason</option>
												@foreach($array['leave_type'] as $leave_type)
												<option value="{{$leave_type->id}}">{{$leave_type->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Reviewer</label>
										<div class="col-sm-8">
											<input type="email" class="form-control" placeholder="Reviewer Email" name="reviewer_mail" id="review_mail" value="{{$user_info->emp_leader_email}}" readonly="true" required>
											<div id="reviewer_list"></div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>

						<div class="col-sm-1">
							
						</div>
						
						<div class="col-sm-4" style="margin-top: 150px;">

							<div class="card row">
								<div class="card-block">
									<h4 class="sub-title">Leave Details</h4>

									@foreach($array['user_info'] as $user_info)
									<label>Annual Leave: </label><span> {{$user_info->annum_leave}} days</span><br>
									<label>Sick Leave:</label><span> {{$user_info->sick_leave}} days</span><br>
									<label>Casual Leave: </label><span> {{$user_info->casual_leave}} days</span><br>
									@if($user_info->others_leave == "")
									<label>Other Leaves:</label><span> Not applicable</span><br>
									@else
									<label>Other Leaves:</label><span> {{$user_info->others_leave}} days</span><br>			
									@endif
									<label>Total Leave Days Taken:</label> <span><?php echo" ".$leave_count." days"; ?></span><br>
									<?php $leave_remain = 0; 
									$leave_remain = $user_leave-$leave_count;
									?>
									@if($leave_remain < 0)
									<label>Total Leave Days Remaining:</label> <span><?php echo " No leaves are remaining";?></span>
									<label>Total Extra Leave Days taken:</label> <span><?php echo ($leave_remain*-1)." days";?></span>
									@else
									<label>Total Leave Days remaining:</label> <span><?php echo $leave_remain." days";?></span>
									@endif
									@endforeach

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
				document.getElementById('duration').value = "Incorrect Date";
			}
			else if((diff==0)&&(start==1)&&(end==2)){
				diff = diff+1;
				$('#diff').text(diff+" days");
				document.getElementById('duration').value = diff;
			}
			else if((diff>0)&&(start==2)&&(end==1)){
				$('#diff').text(diff+" days");
				document.getElementById('duration').value = diff;
			}
			else if((diff>0)&&(start==2)&&(end==1)){
				diff = diff-0.5;
				$('#diff').text(diff+" days");
				document.getElementById('duration').value = diff;
			}
			else if((diff>0)&&(start==1)&&(end==2)){
				diff = diff+1;
				$('#diff').text(diff+" days");
				document.getElementById('duration').value = diff;
			}
			else if((diff>0)&&(start==2)&&(end==2)){
				$('#diff').text(diff+" days");
				document.getElementById('duration').value = diff;
			}
			else if((diff>0)&&(start==end)){
				diff = diff+0.5;
				$('#diff').text(diff+" days");
				document.getElementById('duration').value = diff;
			}
			else{
				diff = diff+0.5;
				$('#diff').text(diff+" days");
				document.getElementById('duration').value = diff;
			}
		});
	}

</script>
@endsection