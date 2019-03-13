<!DOCTYPE html>
<html lang="en">

<head>
	<title>@yield('page_title')</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="#">
	<meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
	<meta name="author" content="#">

	<link rel="icon" href="https://colorlib.com//polygon/adminty/files/assets/images/favicon.ico" type="image/x-icon">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="{{asset('dashboard/files/bower_components/bootstrap/css/bootstrap.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('dashboard/files/assets/icon/feather/css/feather.css')}}">
<!-- 	<link rel="stylesheet" type="text/css" href="{{asset('dashboard/files/assets/css/style.css')}}"> -->

	@yield('page_style')
	<link rel="stylesheet" type="text/css" href="{{asset('dashboard/files/assets/css/jquery.mCustomScrollbar.css')}}">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

	<div class="theme-loader">
		<div class="ball-scale">
			<div class='contain'>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
			</div>
		</div>
	</div>

	<div id="pcoded" class="pcoded">
		<div class="pcoded-overlay-box"></div>
		<div class="pcoded-container navbar-wrapper">
			
			<nav class="navbar header-navbar pcoded-header">
				<div class="navbar-wrapper">
					<div class="navbar-logo">
						<a class="mobile-menu" id="mobile-collapse" href="#!">
							<i class="feather icon-menu"></i>
						</a>
						<a href="{{route('home')}}">
							<img class="img-fluid" src="{{asset('dashboard/files/assets/images/infobiz_logo.png')}}" alt="Theme-Logo" />
						</a>
						<a class="mobile-options">
							<i class="feather icon-more-horizontal"></i>
						</a>
					</div>
					<div class="navbar-container container-fluid">
						<ul class="nav-right">
							<li class="header-notification">
								<div class="dropdown-primary dropdown">

								</div>
							</li>
							<li class="user-profile header-notification">
								<div class="dropdown-primary dropdown" style="padding-top: 18px;">
									<div class="dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-user fa-fw" style="font-size:15px;"></i>
										<span>{{ Auth::user()->email }}</span>
										<i class="feather icon-chevron-down" style="font-size: 15px;"></i>
									</div>
									<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
										<li>
											<a href="#!">
												<i class="feather icon-settings"></i> Settings
											</a>
										</li>
										<li>
											<a href="user-profile.html">
												<i class="feather icon-user"></i> Profile
											</a>
										</li>
										<li>
											<a href="email-inbox.html">
												<i class="feather icon-mail"></i> My Messages
											</a>
										</li>
										<li>
											<a href="auth-lock-screen.html">
												<i class="feather icon-lock"></i> Lock Screen
											</a>
										</li>
										<li>
											<a href="{{ route('logout') }}" onclick="event.preventDefault();
											document.getElementById('logout-form').submit();"><i class="feather icon-log-out"></i>
											{{ __('Logout') }}
										</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		@include('dashboard_sidebar_content');

	</div>
</div>


<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="{{asset('dashboard/files/bower_components/jquery/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/files/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/files/bower_components/popper.js/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/files/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>

<script type="text/javascript" src="{{asset('dashboard/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>

<script type="text/javascript" src="{{asset('dashboard/files/bower_components/modernizr/js/modernizr.js')}}"></script>

<script type="text/javascript" src="{{asset('dashboard/files/bower_components/chart.js/js/Chart.js')}}"></script>

<script src="{{asset('dashboard/files/assets/pages/widget/amchart/amcharts.js')}}"></script>
<script src="{{asset('dashboard/files/assets/pages/widget/amchart/serial.js')}}"></script>
<script src="{{asset('dashboard/files/assets/pages/widget/amchart/light.js')}}"></script>
<script src="{{asset('dashboard/files/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/files/assets/js/SmoothScroll.js')}}"></script>
<script src="{{asset('dashboard/files/assets/js/pcoded.min.js')}}"></script>

<script src="{{asset('dashboard/files/assets/js/vartical-layout.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/files/assets/pages/dashboard/custom-dashboard.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/files/assets/js/script.min.js')}}"></script>

<script type="text/javascript" src="jquery-1.7.2.min.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

@yield('page_js')

</body>
</html>
