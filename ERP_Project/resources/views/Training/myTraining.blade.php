@extends('dashboard_master')

@section('page_title')
InfobizSoft-ERP
@endsection

@section('page_style')
<link rel="stylesheet" type="text/css" href="{{asset('dashboard/files/assets/css/style.css')}}">
@endsection

@section('dashboard_content')


<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
           
            <div class="panel-body col-md-12">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">

					
						
						
							<div class="adv-table editable-table" style="width: 90px;">
                                         <div class="space15"></div>
                                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                            	 <div class="col-lg-12">
									<thead>
										<tr>
											<th width="5%">#</th>
											<th width="5%">First</th>
											<th width="5%">Last</th>
											<th style="width: 100px !important;">Handle</th>
										</tr>
									</thead>
								</div>
									<tbody>
										<tr>
											<td scope="row">1</td>
											<td>Mark</td>
											<td>Otto</td>
											<td>@Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
										</tr>
										<tr>
											<th scope="row">2</th>
											<td>Jacob</td>
											<td>Thornton</td>
											<td>@fat</td>
										</tr>
										<tr>
											<th scope="row">3</th>
											<td>Larry</td>
											<td>the Bird</td>
											<td>@twitter</td>
										</tr>
									</tbody>
								</table>
							</div>
					

						</div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </section>


@endsection