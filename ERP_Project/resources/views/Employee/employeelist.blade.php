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
					Employee Management
				</div>
				<br><br>
				<div class="form-group pull-left mt-2" style="width:450px"> 
					<input type="text" class="search form-control" placeholder="What you looking for?">
				</div>

				<div class="add_employee" style="text-align: right; padding-bottom: 20px;">
					<a href="{{Route('addemployee')}}" class="btn btn-primary" role="button" title="Add Employee"><i class="fa fa-plus" aria-hidden="true"></i>Add Employee</a>
				</div>

				<span class="counter pull-right"></span>
				<table class="table table-hover table-bordered results">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Profile Image</th>
							<th>Name</th>
							<th>Employee Email</th>
							<th>Department & Designation</th>
							<th>Joining Date</th>
							<th>Contact No.</th>
							<th>Action</th>
						</tr>
						<tr class="warning no-result">
							<td colspan="4"><i class="fa fa-warning"></i> No result</td>
						</tr>
					</thead>
					<tbody>
						<?php $i=0;?>
						@foreach($dashboard_array['emp_info'] as $empinfo)
						<tr>
							<th scope="row">{{++$i}}</th>
							<td style="height: 100px; width:100px;"><img src="{{asset($empinfo->emp_image)}}" style="height: 100%; width: 100%;"></td>
							<td>{{$empinfo->emp_fname." ".$empinfo->emp_lname}}</td>
							<td>{{$empinfo->emp_email}}</td>
							<td>{{$empinfo->dept_name}}<br>
								{{$empinfo->deg_name}}</td>
								<td>{{$empinfo->emp_joinDate}}</td>
								<td>{{$empinfo->emp_phone_number}}</td>
								<td style="text-align: center;">
									<a href="{{url('employee_management/employee_edit')}}/{{$empinfo->id}}" class="btn btn-primary" role="button" title="Edit"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
									<a href="{{url('employee_management/employee_edit')}}/{{$empinfo->id}}" class="btn btn-success" role="button" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
									<a href="{{url('employee_management/employee_delete')}}/{{$empinfo->id}}" class="btn btn-danger" role="button" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
								</td>
							</tr>
							@endforeach		
						</tbody>
					</table>
					<div class="page-header">
						<div class="row align-items-end">
						</div>
					</div>
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