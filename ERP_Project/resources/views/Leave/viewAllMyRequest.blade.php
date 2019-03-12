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
					Leave Management
				</div>
				<br><br>
				<div class="form-group pull-left mt-2" style="width:450px"> 
					<input type="text" class="search form-control" placeholder="What you looking for?">
				</div>

				<div class="add_employee" style="text-align: right; padding-bottom: 20px;">
					<a href="{{Route('leaverequest')}}" class="btn btn-primary" role="button" title="Add Employee"><i class="fa fa-plus" aria-hidden="true"></i>Place New Request</a>
				</div>

				<span class="counter pull-right"></span>
				<div class="caption" style="padding-top: 15px; padding-bottom: 15px; background-color: 	#202020; font-size: 18px; color:white;">
					<i class="fa fa-cogs" style="padding-top: 8px; padding-bottom: 8px; padding-left: 5px"></i> Individual Leave Record List
				</div>
				<table class="table table-hover table-bordered results">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Employee Name</th>
							<th>Employee Email</th>
							<th>Leave Reason</th>
							<th>Start Session</th>
							<th>End Session</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>No of Days</th>
							<th>Status</th>
						</tr>
						<tr class="warning no-result">
							<td colspan="4"><i class="fa fa-warning"></i> No result</td>
						</tr>
					</thead>
					<tbody>
						<?php $i=0 ?>
						@foreach($array['leave_request'] as $leave_request)
						<tr>
							<td>{{++$i}}</td>
							<td>{{$leave_request->emp_fname." ".$leave_request->emp_lname}}</td>
							<td>{{$leave_request->emp_email}}</td>
							<td>{{$leave_request->name}}</td>
							@if($leave_request->sessionStart == 1)
							<td>Morning</td>
							@else
							<td>Afternoon</td>
							@endif
							@if($leave_request->sessionEnd == 1)
							<td>Morning</td>
							@else
							<td>Afternoon</td>
							@endif
							<td>{{$leave_request->dateFrom}}</td>
							<td>{{$leave_request->dateTo}}</td>
							<td>{{$leave_request->duration}} days</td>
							@if($leave_request->status == 0)
							<td><span class="badge badge-warning" style="font-size: 13px;">Pending</span></td>
							@elseif($leave_request->status == 1)
							<td><span class="badge badge-success" style="font-size: 13px;">Approved</span></td>
							@else
							<td><span class="badge badge-danger" style="font-size: 13px;">Declined</span></td>
							@endif
						</tr>
						<input type="hidden" name="taskid" value="{{$leave_request->id}}">		
						@endforeach
					</tbody>
				</table>
				{{$array['leave_request']->links()}}
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