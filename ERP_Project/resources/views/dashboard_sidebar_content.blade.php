<div class="pcoded-main-container" style="margin-top: -21px;">
	<div class="pcoded-wrapper">
		<nav class="pcoded-navbar">
			<div class="pcoded-inner-navbar main-menu">
				@foreach($dashboard_array['main_menu'] as $mainmenu)
				<ul class="pcoded-item pcoded-left-item">
					<li class="pcoded-hasmenu active pcoded-trigger" style="margin-top: 5px;">
						<a href="javascript:void(0)">
							<span class=""><i class="feather icon-home"></i></span>
							<span class="">{{$mainmenu->name}}</span>
						</a>
						@foreach($dashboard_array['sub_menu'] as $submenu)
						<ul class="pcoded-submenu">		
							<li class="pcoded-hasmenu active pcoded-trigger" style="margin-top: 0px;">

								@if($submenu->parentId == $mainmenu->access_Id)
								<a href="javascript:void(0)">
									<span class="">{{$submenu->name}}</span>
								</a>
								@foreach($dashboard_array['sub_menu_list'] as $submenulist)
								@if($submenulist->parentId == $submenu->access_Id)
								<ul class="pcoded-submenu">
									<li>
										<a href="{{route($submenulist->links)}}">
											{{$submenulist->name}}
										</a>
									</li>	
								</ul>
								@endif
								@endforeach
								@endif	
							</li>				
						</ul>
						@endforeach		
					</li>
				</ul>	
				@endforeach
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