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
				<div class="card">
					<div class="card-block">
						<div class="heading" style="height:25px; color: black; font-size: 35px; font-weight: bold;">
							Task Management
						</div>
						<br><br>
						<div class="form-group pull-left mt-2" style="width:450px"> 
							<input type="text" class="search form-control" placeholder="What you looking for?">
						</div>

						<div class="add_employee" style="text-align: right; padding-bottom: 20px;">
							<a href="{{Route('taskadd')}}" class="btn btn-primary" role="button" title="Add Employee"><i class="fa fa-plus" aria-hidden="true"></i>Add New Task</a>
						</div>

						<span class="counter pull-right"></span>
						<div class="caption" style="padding-top: 15px; padding-bottom: 15px; background-color: 	#202020; font-size: 18px; color:white;">
							<i class="fa fa-cogs" style="padding-top: 8px; padding-bottom: 8px; padding-left: 5px"></i> Task Mangement Table
						</div>
						<div class="table-responsive">
							<div class="dt-responsive table-responsive">
								<table class="table table-hover table-bordered results">
									<thead>
										<tr>
											<th>Serial No.</th>
											<th>Employee Name</th>
											<th>Employee Email</th>
											<th>Employee Department</th>
											<th>Employee ID</th>
											<th>Description</th>
											<th>Start Date</th>
											<th>End Date</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
										<tr class="warning no-result">
											<td colspan="4"><i class="fa fa-warning"></i> No result</td>
										</tr>
									</thead>
									<tbody>
										<?php $i=0 ?>
										@foreach($array['taskInfo'] as $taskinfo)
										<tr>
											<td>{{++$i}}</td>
											<td>{{$taskinfo->emp_fname." ".$taskinfo->emp_lname}}</td>
											<td>{{$taskinfo->emp_email}}</td>
											<td>{{$taskinfo->dept_name}}</td>
											<td>{{$taskinfo->emp_id}}</td>
											<td>{{$taskinfo->emp_taskDescription}}</td>
											<td>{{$taskinfo->emp_startDate}}</td>
											<td>{{$taskinfo->emp_endDate}}</td>
											@if($taskinfo->status == 1)
											<td><span class="badge badge-primary" style="font-size: 13px;">On Progress</span></td>
											@elseif($taskinfo->status == 2)
											<td><span class="badge badge-success" style="font-size: 13px;">Completed</span></td>
											@else
											<td><span class="badge badge-warning" style="font-size: 13px;">Assigned</span></td>
											@endif
											<td style="text-align: center;">
												<a href="{{url('/task_management/task_edit')}}/{{$taskinfo->id}}" class="btn btn-info" role="button" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
												<a href="{{url('/task_management/task_delete')}}/{{$taskinfo->id}}" class="btn btn-danger" role="button" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
											</td>
										</tr>
										<input type="hidden" name="taskid" value="{{$taskinfo->id}}">		
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