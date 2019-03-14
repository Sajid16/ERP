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
									<h4>Add Employee</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				{!! Form::open(['url'=>'/employee_management/employee_edit','method'=>'post','enctype'=>'multipart/form-data']) !!}		
				<div class="page-body">
					<div class="row">
						<div class="col-sm-6">

							<div class="card row">
								<div class="card-block">
									<h4 class="sub-title">Personal Details</h4>

									@foreach($dashboard_array['emp_info'] as $empEdit)
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">First Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Enter Your Name" name="emp_fname" id="field1" value="{{$empEdit->emp_fname}}" required>
											<label><small>*your first name must match your NID name and contains the full length except the last name.</small></label>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Last Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Enter Your Name" name="emp_lname" id="field2" value="{{$empEdit->emp_lname}}" required>
											<label><small>*your last name must match your NID name.</small></label>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Father's Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Enter Your Father's Name" name="emp_father_name" value="{{$empEdit->emp_lname}}" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Email</label>
										<div class="col-sm-8">
											<input type="email" class="form-control" placeholder="Enter Your Email" name="emp_email" value="{{$empEdit->emp_email}}" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Date of Birth</label>
										<div class="col-sm-8">
											<input type="date" class="form-control" placeholder="Enter Your Date of Birth" name="emp_date_of_birth" value="{{$empEdit->emp_date_of_birth}}" required>
										</div>
									</div>
									<div class="row">
										<label class="col-sm-4 col-form-label">Gender</label>
										<div class="col-sm-8">
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input class="form-check-input" type="radio" name="emp_gender" id="gender-1" value="male"> Male
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input class="form-check-input" type="radio" name="emp_gender" id="gender-2" value="female"> Female
												</label>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Phone Number</label>
										<div class="col-sm-8">
											<input type="number" class="form-control" placeholder="Enter Your Phone Number" name="emp_phone_number" value="{{$empEdit->emp_phone_number}}" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Image</label>
										<div class="col-sm-8">
											<input type="file" class="form-control" placeholder="Choose Your image" name="emp_image" required><span>{{$empEdit->emp_image}}</span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Local Address</label>
										<div class="col-sm-8">
											<textarea rows="5" cols="5" class="form-control" placeholder="Enter Your Local Address" name="emp_local_address" required>{{$empEdit->emp_local_adds}}</textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Permanent Address</label>
										<div class="col-sm-8">
											<textarea rows="5" cols="5" class="form-control" placeholder="Enter Your Permanent Address" name="emp_permanent_address" required>{{$empEdit->emp_per_adds}}</textarea>
										</div>
									</div>
								</div>
								
							</div>

							<div class="card row">
								<div class="card-block">
									<h4 class="sub-title">Documents</h4>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Resume</label>
										<div class="col-sm-8">
											<input type="file" class="form-control" placeholder="Enter Your Resume" name="emp_resume" value="{{$empEdit->emp_resume}}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Joining Letter</label>
										<div class="col-sm-8">
											<input type="file" class="form-control" placeholder="Enter Your Joining Letter" name="emp_joining_letter" value="{{$empEdit->emp_joinLetter}}">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Contract & Agreement</label>
										<div class="col-sm-8">
											<input type="file" class="form-control"  name="emp_contract" value="{{$empEdit->emp_contract}}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Id Proof</label>
										<div class="col-sm-8">
											<input type="file" class="form-control"  name="emp_id_proof" value="{{$empEdit->emp_idProof}}">
										</div>
									</div>
								</div>
							</div>

						</div>

						<div class="col-sm-5 ml-4">

							<div class="card row">
								<div class="card-block">
									<h4 class="sub-title">Company Details</h4>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Employee ID</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Enter Your Employee ID" name="emp_id" value="{{$empEdit->emp_id}}" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Department</label>
										<div class="col-sm-8">
											<select name="emp_dept_name" class="form-control departmentcategory" id="dept_cat_id">
												<option value="0" disabled="true" selected="true">Select Department</option>
												@foreach($employee_array['department'] as $dept)
												<option value="{{$dept->id}}">{{$dept->dept_name}}</option>
												@endforeach
											</select>
										</div>
									</div>


									<div class="form-group row" >
										<label class="col-sm-4 col-form-label">Designation</label>
										<div class="col-sm-8">
											<select name="emp_deg_name" class="form-control designationcategory" id="deg_cat">
												<option value="0" disabled="true" selected="true">Designation Name</option>
											</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Joining Date</label>
										<div class="col-sm-8">
											<input type="date" class="form-control" placeholder="Enter Your Joining Date" name="emp_joining_date" value="{{$empEdit->emp_joinDate}}" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Joining Salary</label>
										<div class="col-sm-8">
											<input type="number" class="form-control" placeholder="Enter Your Joining Salary" name="emp_joining_salary" value="{{$empEdit->emp_joinSalary}}" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Team Leader</label>
										<div class="col-sm-8">
											<input type="email" class="form-control" placeholder="Enter team leader email" name="emp_team_leader" value="{{$empEdit->emp_leader_email}}">
										</div>
									</div>
								</div>
							</div>

							<div class="card row">
								<div class="card-block">
									<h4 class="sub-title">Bank Account</h4>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Account Holder Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Your Account Name" name="emp_account_name" id="result" required="true" readonly="true" value="{{$empEdit->emp_accName}}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Account Number</label>
										<div class="col-sm-8">
											<input type="number" class="form-control" placeholder="Enter Your Account Number" name="emp_account_number" value="{{$empEdit->emp_accNumber}}" required="true">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Bank Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Enter Your Bank Name" name="emp_bank_name" value="{{$empEdit->emp_bankName}}" required="true">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Branch</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Enter Your Branch" name="emp_branch" value="{{$empEdit->emp_bankBranch}}" required="true">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">SWIFT Code(optional)</label>
										<div class="col-sm-8">
											<input type="number" class="form-control" placeholder="Enter Your SWIFT Code" name="emp_swift_code" value="{{$empEdit->emp_swiftCode}}">
										</div>
									</div>
									<input type="hidden" name="empid" value="{{$empEdit->id}}">
								</div>
							</div>

							<div class="card row">
								<div class="card-block">
									<h4 class="sub-title">Leave Details</h4>
									<div class="form-group row" >
										<label class="col-sm-4 col-form-label">Annual Leave</label>
										<div class="col-sm-8">
											<select name="emp_annum_leave" class="form-control">
												<option value="{{$empEdit->annum_leave}}" selected="true">{{$empEdit->annum_leave}}</option>
												@for($j=1;$j<=31;$j++){
												<option value="{{$j}}">{{$j}}</option>;
											}
											@endfor
										</select>
									</div>
								</div>
								<div class="form-group row" >
									<label class="col-sm-4 col-form-label">Casual Leave</label>
									<div class="col-sm-8">
										<select name="emp_casual_leave" class="form-control">
											<option value="{{$empEdit->casual_leave}}" selected="true">{{$empEdit->casual_leave}}</option>
											@for($j=1;$j<=31;$j++){
											<option value="{{$j}}">{{$j}}</option>;
										}
										@endfor
									</select>
								</div>
							</div>
							<div class="form-group row" >
								<label class="col-sm-4 col-form-label">Sick Leave</label>
								<div class="col-sm-8">
									<select name="emp_sick_leave" class="form-control">
										<option value="{{$empEdit->sick_leave}}" selected="true">{{$empEdit->sick_leave}}</option>
										@for($j=1;$j<=31;$j++){
										<option value="{{$j}}">{{$j}}</option>;
									}
									@endfor
								</select>
							</div>
						</div>
						<div class="form-group row" >
							<label class="col-sm-4 col-form-label">Others Leave</label>
							<div class="col-sm-8">
								<select name="emp_others_leave" class="form-control">
									<option value="{{$empEdit->others_leave}}" selected="true">{{$empEdit->others_leave}}</option>
									@for($j=0;$j<=31;$j++){
									<option value="{{$j}}">{{$j}}</option>;
								}
								@endfor
							</select>
						</div>
					</div>
				</div>
				@endforeach
			</div>

		</div>

	</div>				
</div>

<div class="mr-4 pr-3">
	<button type="submit" class="btn btn-success btn-square pull-right mr-5"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Update Employee Info</button>
	</div>

	{!! Form::close() !!}
</div>
<!-- <script type="text/javascript">
	
	document.forms['editForm'].elements['emp_gender1'].value ='{{$empEdit->emp_gender}}'

</script> -->
</div>
</div>
</div>
@endsection

@section('page_js')

<script type="text/javascript">
	
	$("#field1, #field2").keyup(function(){
		update();
	});

	function update() {
		$("#result").val($('#field1').val() + " " + $('#field2').val());
	}

</script>

<script type="text/javascript">

	$(document).ready(function(){

		$(document).on('change','.departmentcategory',function(){

				// console.log("it is working");

				var dept_id = $(this).val();
				// console.log(dept_id);

				
				var op =" "; 

				$.ajax({
					// console.log("sadasd");
					type:'get',
					url:'{!!URL::to('findDesignationName')!!}',
					data:{'id':dept_id},
					// console.log(data);
					success:function(data){
						console.log('success');

						console.log(data);

					//console.log(data.length);
					op+='<option value="0" selected disabled>chose Designation</option>';
					for(var i=0;i<data.length;i++){
						op+='<option value="'+data[i].id+'">'+data[i].deg_name+'</option>';
						console.log(data[i].id);
					}

					$('.designationcategory').html(" ");
					// div.find('.designationcategory').append(op);

					$('.designationcategory').append(op);
					// $(".designationcategory").html(" ");
				},
				error:function(){

				}
			});

			});

	});

</script>

@endsection
