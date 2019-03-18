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
							Training Management
						</div>
						<br><br>
						<div class="form-group pull-left mt-2" style="width:450px"> 
							<input type="text" class="search form-control" placeholder="What you looking for?">
						</div>

						<div class="add_employee" style="text-align: right; padding-bottom: 20px;">
							<a href="{{Route('requestTraining')}}" class="btn btn-primary" role="button" title="Add Employee"><i class="fa fa-plus" aria-hidden="true"></i>Request New Training</a>
						</div>

						<span class="counter pull-right"></span>
						<div class="caption" style="padding-top: 15px; padding-bottom: 15px; background-color: 	#202020; font-size: 18px; color:white;">
							<i class="fa fa-cogs" style="padding-top: 8px; padding-bottom: 8px; padding-left: 5px"></i> Team training record
						</div>
						<div class="table-responsive">
							<div class="dt-responsive table-responsive">
								<table class="table table-hover table-bordered results">
									<thead>
										<tr>
											<th>Serial No.</th>
											<th>Training</th>
											<th>Employee Email</th>
											<th>Proposer Email</th>
											<th>Session</th>
											<th>From</th>
											<th>To</th>
											<th>Ratings</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
										<tr class="warning no-result">
											<td colspan="4"><i class="fa fa-warning"></i> No result</td>
										</tr>
									</thead>
									<tbody>
										<?php $i=0 ?>
										@foreach($array['team_training_requests'] as $team_training_requests)
										<tr>
											<td>{{++$i}}</td>
											<td>{{$team_training_requests->name}}</td>
											<td>{{$team_training_requests->emp_email}}</td>
											<td>{{$team_training_requests->proposer_email}}</td>
											<td>{{$team_training_requests->duration}} days</td>
											<td>{{$team_training_requests->from}}</td>
											<td>{{$team_training_requests->to}}</td>
											@if($team_training_requests->ratings == "")
											<td>N/A</td>
											@else
											<td>{{$team_training_requests->ratings}}</td>
											@endif
											@if($team_training_requests->status == 1)
											<td><span class="badge badge-success" style="font-size: 13px;">Accepted</span></td>
											<td style="text-align: center;">
												<a href="{{url('/training_management/all_training_request_view')}}/{{$team_training_requests->id}}" class="btn btn-info" role="button" title="Edit"><i class="fa fa-eye" aria-hidden="true"></i></i>View</a>
											</td>
											<td>{{$team_training_requests->ratings}}</td>
											<td>Review Completed</td>
											@elseif($team_training_requests->status == 2)
											<td><span class="badge badge-danger" style="font-size: 13px;">Refused</span></td>
											<td>Not Available</td>
											@elseif($team_training_requests->status == 3)
											<td><span class="badge badge-secondary" style="font-size: 13px;">Proposed</span></td>
											<td>Not Available</td>
											@elseif($team_training_requests->status == 4)
											<td><span class="badge badge-danger" style="font-size: 13px;">Declined</span></td>
											<td>Not Available</td>
											@else
											<td><span class="badge badge-warning" style="font-size: 13px;">Initiated</span></td>
											<td>Not Available</td>
											@endif
										</tr>
										<input type="hidden" name="taskid" value="{{$team_training_requests->id}}">		
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