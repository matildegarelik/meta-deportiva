<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>{{ config('app.name') }} | @yield('pagetitle')</title>

		<!-- Latest compiled and minified CSS -->		
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-slider.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/jquery.scrolling-tabs.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-checkbox.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/flexslider.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/featherlight.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.offcanvas.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/core.css') }}">

		<link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/toastr/toastr.min.css') }}">
		<!-- SweetAlert2 -->
        <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
	

		<!-- Custom styles for this template -->
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" >
		<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" >

		<style>
			.logout-btn{
				color: #ff6600;
    			font-weight: 700;
				border: none;
				background:none;
				font-size: 12px;
				line-height: 12px;
				text-decoration: none;
				text-transform: uppercase;
				padding: 0 10px;
				display: block;
				font-family: 'Open Sans', sans-serif;
			}
		</style>

		@yield('css')

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="http://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
			<script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<header id="masthead" class="site-header fix-header header-1">
			<div class="top-header top-header-bg">
				<div class="container">
					<div class="row">
						<div class="top-left">
							<ul>
								<li>
									<a href="#">
										<i class="fa fa-phone"></i>
										+62274 889767
									</a>
								</li>
								<li>
									<a href="mailto:hello@myticket.com"> 
										<i class="fa fa-envelope-o"></i>
										hello@myticket.com
									</a>
								</li>
							</ul>
						</div>
						<div class="top-right">
							<ul>
								@if(Auth::user())
								<li>
									<form action="{{route('logout')}}" method="POST"> 
										@csrf
										<button class="logout-btn">Logout</button>
									</form>
								</li>
								@else
								<li>
									<a href="{{ route('login') }}">Sign In</a>
								</li>
								<li>
									<a href="{{ route('register') }}">Sign Up</a>
								</li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="main-header">
				<div class="container">
					<div class="row">
						<div class="site-branding col-md-3">
							<h1 class="site-title"><a href="{{route('home')}}" title="myticket" rel="home"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></a></h1>
						</div>

						<div class="col-md-9">
							<nav id="site-navigation" class="navbar">
								<div class="navbar-header">
									<div class="mobile-cart" ><a href="#">0</a></div>
									<button type="button" class="navbar-toggle offcanvas-toggle pull-right" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div class="navbar-offcanvas navbar-offcanvas-touch navbar-offcanvas-right" id="js-bootstrap-offcanvas">
									<button type="button" class="offcanvas-toggle closecanvas" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
									   <i class="fa fa-times fa-2x" aria-hidden="true"></i>
									</button>
									<ul class="nav navbar-nav navbar-right">
										<li class="active"><a href="{{ route('participante.upcoming') }}">Próximos</a></li>
										<li><a href="{{ route('participante.events') }}">Explorar</a></li>
										<li class="active"><a href="{{ route('participante.schedule') }}">Mi Agenda</a></li>
										<li><a href="{{ route('participante.profile') }}">Perfil</a></li>
										<li class="cart"><a href="#">0</a></li>
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
		
		@yield('content')
        @yield('modal')

		<footer id="colophon" class="site-footer">
			<div class="top-footer">
				<div class="container">
					<div class="row">
						
						<div class="col-md-8">
							<a href="#"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
						</div>
						<div class="col-md-4">
						
						<p>&copy; 2016 MYTICKET.COM. ALL RIGHTS RESEVED</p>
						</div>
					</div>
					
				</div>
			</div>
			<div class="main-footer">
				<div class="container">
					<div class="row">
						<div class="footer-1 col-md-9">
							<div class="about clearfix">
								<h3>About</h3>
								<ul>
									<li><a href="#">Our Company</a></li>
									<li><a href="#">Careers</a></li>
									<li><a href="#">Advertising</a></li>
									<li><a href="#">Press Room</a></li>
									<li><a href="#">Trademarks</a></li>
									<li><a href="#">Terms of Service</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>
							<div class="support clearfix">
								<h3>Support and Contact</h3>
								<ul>
									<li><a href="#">Customer Support Contacts</a></li>
									<li><a href="#">Feedback</a></li>
									<li><a href="#">Help</a></li>
									<li><a href="#">Sitemap</a></li>
								</ul>
							</div>
							<div class="social clearfix">
								<h3>Stay Connected</h3>
								<ul>
									<li class="facebook">
										<a href="#">
											<i class="fa fa-facebook" aria-hidden="true"></i>
											Facebook
										</a>
									</li>
									<li class="twitter">
										<a href="#">
											<i class="fa fa-twitter" aria-hidden="true"></i>
											Twitter
										</a>
									</li>
									<li class="linkedin">
										<a href="#">
											<i class="fa fa-linkedin-square" aria-hidden="true"></i>
											LinkedIn
										</a>
									</li>
									<li class="google">
										<a href="#">
											<i class="fa fa-google-plus-square" aria-hidden="true"></i>
											Google+
										</a>
									</li>
									<li class="rss">
										<a href="#">
											<i class="fa fa-rss-square" aria-hidden="true"></i>
											RSS
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="footer-2 col-md-3">
							<div class="footer-dashboard">
								<h3>MyTicket Dashboard</h3>
								<ul>
									<li><a href="#">Professional</a></li>
									<li><a href="#">Subscriber Login</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		
		<script src="{{ asset('assets/js/jquery-3.2.0.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap-slider.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.scrolling-tabs.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.flexslider-min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.imagemapster.min.js') }}"></script>
		<script src="{{ asset('assets/js/tooltip.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/featherlight.min.js') }}"></script>
		<script src="{{ asset('assets/js/featherlight.gallery.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.offcanvas.min.js') }}"></script>
		<script src="{{ asset('assets/js/main.js') }}"></script>

		<script src="{{ asset('assets/admin-lte/plugins/toastr/toastr.min.js')}}"></script>
		<!-- SweetAlert2 -->
        <script src="{{ asset('assets/admin-lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
		<script src="{{ asset('assets/admin-lte/dist/js/adminlte.js') }}"></script>

		@yield('js')
	
	</body>
</html>