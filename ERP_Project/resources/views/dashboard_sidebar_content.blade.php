<div class="pcoded-main-container" style="margin-top: -21px;">
	<div class="pcoded-wrapper">
		<nav class="pcoded-navbar">
			<div class="pcoded-inner-navbar main-menu">
				<ul class="pcoded-item pcoded-left-item">
					@foreach($dashboard_array['main_menu'] as $mainmenu)
					<li class="pcoded-hasmenu active pcoded-trigger" style="margin-top: 5px;">
						<a href="javascript:void(0)">
							<span class="pcoded-micon"><i class="feather icon-home"></i></span>
							<span class="pcoded-mtext">{{$mainmenu->name}}</span>
						</a>
						<ul class="pcoded-submenu">		
							<li class="pcoded-hasmenu active pcoded-trigger" style="margin-top: 0px;">
								@foreach($dashboard_array['sub_menu'] as $submenu)
								<a href="javascript:void(0)">
									<span class="pcoded-micon"><i class="feather icon-home"></i></span>
									@if($submenu->parentId == $mainmenu->access_Id)
									<span class="pcoded-mtext">{{$submenu->name}}</span>
									<ul class="pcoded-submenu">
										@foreach($dashboard_array['sub_menu_list'] as $submenulist)
										@if($submenulist->parentId == $submenu->access_Id)
										<li>
											<a href="{{route($submenulist->links)}}">
												<span class="">{{$submenulist->name}}</span>
											</a>
										</li>
										@endif
										@endforeach
									</ul>
									@endif
								</a>
								@endforeach
							</li>
							
						</ul>
					</li>
					@endforeach
				</ul>	
			</div>
		</nav>
		@yield('dashboard_content');
	</div>
</div>

@section('page_js')

<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-23581568-13');
</script>

@endsection