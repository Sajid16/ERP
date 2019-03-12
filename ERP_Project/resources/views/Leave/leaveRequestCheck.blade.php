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
				{!! Form::open(['url'=>'/leave_management/leave_status_update','method'=>'post', 'enctype'=>'multipart/form-data']) !!}		
				<div class="page-body">
					<div class="row">
						<div class="col-sm-6">

							<div class="card row">
								<div class="card-block">
									<h4 class="sub-title">Leave Request Details</h4>
									@foreach($array['leave_request'] as $leave_request)
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">First Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Enter Your First Name" name="emp_fname" id="field1" value="{{$leave_request->emp_fname}}" readonly="true">
										</div>
										<div id="fnameList"></div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Last Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Enter Your Last Name" name="emp_lname" id="field2" value="{{$leave_request->emp_lname}}" readonly="true">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Email</label>
										<div class="col-sm-8">
											<input type="email" class="form-control" placeholder="Enter Your Email" name="emp_email" value="{{$leave_request->emp_email}}" readonly="true">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Duration</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Enter Your Last Name" name="duration" id="field2" value="{{$leave_request->duration}}" readonly="true">
										</div>
									</div>	
									<div class="card row">
										<div class="card-block">
											<div class="form-group row">
												<label class="col-sm-4 col-form-label">Leave Reason</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Enter Your Employee ID" name="leave_reason" value="{{$leave_request->name}}" readonly="true" required>
												</div>
											</div>	
											<div class="form-group row">
												<label class="col-sm-4 col-form-label">Start Date</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Enter Your Joining Date" name="leaveStartDate" value="{{$leave_request->dateFrom}}" readonly="true" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-4 col-form-label">End Date</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Enter Your Joining Date" name="leaveEndDate" value="{{$leave_request->dateTo}}" readonly="true" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-4 col-form-label">Description</label>
												<div class="col-sm-8">
													<textarea type="text" class="form-control" placeholder="Leave description" name="leaveDescription" value="{{$leave_request->description}}" readonly="true"  required></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-4 col-form-label">Status</label>
												<div class="col-sm-8">
													<select name="leave_status" class="form-control" required="true">
														<option value="1">Approved</option>
														<option value="2">Declined</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-4 col-form-label">Comments</label>
												<div class="col-sm-8">
													<textarea type="text" class="form-control" placeholder="Write comments" name="leaveComments" required></textarea>
												</div>
											</div>
											<input type="hidden" name="leave_id" value="{{$leave_request->id}}">
										</div>
									</div>													
								</div>
							</div>

						</div>

						<div class="col-sm-5 ml-4" style="margin-top: 15%;">
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
									<div style="background-color: red; color: white;">
										<label>Total Extra Leave Days taken:</label> <span><?php echo ($leave_remain*-1)." days";?></span>
									</div>
									@else
									<label>Total Leave Days remaining:</label> <span><?php echo $leave_remain." days";?></span>
									@endif
									@endforeach

								</div>
							</div>
						</div>
						@endforeach
					</div>				
				</div>

				<div>
					<button type="submit" class="btn btn-success btn-square" style="width: 50%;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Review Leave</button>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection

@section('page_js')

@endsection