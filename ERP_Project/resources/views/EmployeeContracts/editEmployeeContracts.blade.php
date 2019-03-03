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
                        <div class="col-lg-12 ml-3">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Edit Employee Contracts</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::open(['url'=>'/employee_management/employee_contracts_edit','method'=>'post', 'enctype'=>'multipart/form-data']) !!}
                <form action=""method="" >	
				<div class="page-body">
					<div class="row">
						<div class="col-sm-8 ml-4">
							<div class="card row">
								<div class="card-block">
									<h4 class="sub-title">Employee Contracts Details</h4>

                                    @foreach($dashboard_array['emp_contracts_info'] as $empContracts)

									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Employee Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Enter Your Employee Name" name="employee_name" value= "{{ $empContracts->contracts_name }}" required>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Company Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Enter Your company name" name="company_name" id="comp_name" value="{{$empContracts->company_name}}" required>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Department</label>
										<div class="col-sm-8">
											<select name="emp_dept_name" class="form-control departmentcategory" id="dept_cat_id">
												<option>{{$empContracts->dept_name}}</option>

												<!-- <option value="0" disabled="true" selected="true">Select Department</option> -->
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
												<option>{{$empContracts->deg_name}}</option>
												<!-- <option value="0" disabled="true" selected="true">Designation Name</option> -->

											</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Contract types</label>
										<div class="col-sm-8">
                                            <select name="contracts_types" class="form-control contractsTypes" id="deg_cat">
												<!-- <option value="0" disabled="true" selected="true">Contract types</option> -->
												<option >{{$empContracts->contacts_types}}</option>
                                                <option value="volvo">Volvo</option>
												<option value="saab">Saab</option>
												<option value="mercedes">Mercedes</option>
												<option value="audi">Audi</option>
											</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Strat Date</label>
										<div class="col-sm-8">
											<input type="date" class="form-control" placeholder="Enter Start Date" name="start_date"  value="{{$empContracts->start_date}}" required>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-4 col-form-label">End Date</label>
										<div class="col-sm-8">
											<input type="date" class="form-control" placeholder="Choose End Date" name="end_date" value="{{$empContracts->end_date}}" required>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Position</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" placeholder="Choose Your position" name="position" value="{{$empContracts->position}}" required>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Salary</label>
										<div class="col-sm-8">
											<input type="number" class="form-control" placeholder="Choose Your salary" name="salary" value="{{$empContracts->salary}}" required>
										</div>
									</div>

                                    <input type="hidden" name="empContractsId" value="{{$empContracts->id}}">

								</div>
                                @endforeach
                                <div class="mb-3 pl-3">
                                    <button type="submit" class="btn btn-success btn-square pull-right mr-5"> <i class="icofont icofont-check-circled">Update Employee Contracts</button>
                                </div>
								
							</div>
                        </div>
                    </div>
				</div>
                </form>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('page_js')
	<script type="text/javascript">

		$(document).ready(function(){

			$(document).on('change','.departmentcategory',function(){

				var dept_id = $(this).val();
				var op =" "; 

				$.ajax({
					type:'get',
					url:'{!!URL::to('findDesignationName')!!}',
					data:{'id':dept_id},
					success:function(data){
						console.log('success');
						console.log(data);
					op+='<option value="0" selected disabled>chose Designation</option>';
					for(var i=0;i<data.length;i++){
						op+='<option value="'+data[i].id+'">'+data[i].deg_name+'</option>';
					}
					$('.designationcategory').html(" ");
					$('.designationcategory').append(op);
				},
				error:function(){

				}
			});
			});
		});
	</script>

	@endsection
