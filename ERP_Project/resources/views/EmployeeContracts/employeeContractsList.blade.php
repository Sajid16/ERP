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

                <div class="heading" style="height:25px; color: black; font-size: 35px; font-weight: bold;">
					Employee Contracts List
				</div>
				<br><br>
				<div class="form-group pull-left mt-2" style="width:450px"> 
					<input type="text" class="search form-control" placeholder="What you looking for?">
				</div>

				<div class="add_employee_contracts" style="text-align: right; padding-bottom: 20px;">
					<a href="{{Route('addEmployeeContracts')}}" class="btn btn-primary" role="button" title="Add Employee Contracts"><i class="fa fa-plus" aria-hidden="true"></i>Add Employee Contracts</a>
				</div>

				<span class="counter pull-right"></span>
				<table class="table table-hover table-bordered results">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Employee Name</th>
							<th>Company Name</th>
							<th>Department</th>
							<th>Designation</th>
							<th>Contracts Type</th>
							<th>Stat date</th>
							<th>End Date</th>
							<th>Salary</th>
							<th>Position</th>
							<th>Action</th>
						</tr>
						<tr class="warning no-result">
							<td colspan="4"><i class="fa fa-warning"></i> No result</td>
						</tr>
					</thead>
					<tbody>
					<?php
						$i=0;
					?>
					@foreach($dashboard_array['emp_contracts_info'] as $empcontracts)
						<tr>
						
							<td>{{++$i}}</td>
					
							<td>{{$empcontracts->contracts_name}}</td>
							<td>{{$empcontracts->company_name}}</td>
							<td>{{$empcontracts->dept_name}}</td>
							<td>{{$empcontracts->deg_name}}</td>
							<td>{{$empcontracts->contacts_types}}</td>
							<td>{{$empcontracts->start_date}}</td>
							<td>{{$empcontracts->end_date}}</td>
							<td>{{$empcontracts->salary}}</td>              
							<td>{{$empcontracts->position}}</td>              
							<td style="text-align: center;">
								<a href="{{url('employee_management/employee_contracts_edit')}}/{{$empcontracts->id}}" class="btn btn-primary" role="button" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
								<a href="{{url('employee_management/employee_contracts_delete')}}/{{$empcontracts->id}}" class="btn btn-danger" role="button" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
							</td>
						</tr>
						@endforeach	
					</tbody>
				</table>

            </div>
        </div>
    </div>
</div>
@endsection

@section('page_js')

<script type="text/javascript">
	
	$(document).ready(function() {
		$(".search").keyup(function () {
			var searchTerm = $(".search").val();
			var listItem = $('.results tbody').children('tr');
			var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
			
			$.extend($.expr[':'], {'containsi': function(elem, i, match, array){
				return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
			}
		});
			
			$(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
				$(this).attr('visible','false');
			});

			$(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
				$(this).attr('visible','true');
			});

			var jobCount = $('.results tbody tr[visible="true"]').length;
			$('.counter').text(jobCount + ' item');

			if(jobCount == '0') {$('.no-result').show();}
			else {$('.no-result').hide();}
		});
	});
	
</script>
@endsection