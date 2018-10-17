<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>SDSSU</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta content="" name="keywords">
		<meta content="" name="description">
		<!-- Favicons -->
		<link href="{{ url('/storage/img/sdssu.png') }}" rel="icon">

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">
		<!-- Bootstrap CSS File -->
		<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- Libraries CSS Files -->
		<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="lib/animate/animate.min.css" rel="stylesheet">
		<link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
		<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
		<link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
		<link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
		<!-- Main Stylesheet File -->
		<link href="css/style.css" rel="stylesheet">
		<!-- =======================================================
		Theme Name: Reveal
		Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
		Author: BootstrapMade.com
		License: https://bootstrapmade.com/license/
		======================================================= -->
	</head>
	<body id="body">
		<!--==========================
		Top Bar
		============================-->
		<section id="topbar" class="d-none d-lg-block">
			<div class="container clearfix">
				<div class="contact-info float-left">
					<i class="fa fa-envelope-o"></i> <a href="mailto:contact@example.com">contact@example.com</a>
					<i class="fa fa-phone"></i> +1 5589 55488 55
				</div>
				<div class="social-links float-right">
					<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
					<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
					<a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
					<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
					<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
				</div>
			</div>
		</section>
		<!--==========================
		Header
		============================-->
		<header id="header">
			<div class="container">
				<div id="logo" class="pull-left">
					<h1><a href="/" class="scrollto">SDSSU</a></h1>
					<!-- Uncomment below if you prefer to use an image logo -->
					{{-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a> --}}
				</div>
				<nav id="nav-menu-container">
				<ul class="nav-menu">
					<li class="menu-active"><a href="/">Home</a></li>
					<li><a href="/about">About Us</a></li>
						<li class="menu-has-children"><a href="">Accounts</a>
						<ul>
							<li><a href="{{ url('/instructorlogin') }}">Instructor</a></li>
							<li><a href="{{ url('/parentlogin') }}">Parent</a></li>
							<li><a href="{{ url('/studentlogin') }}">Student</a></li>
						</ul>
					</li>
				</ul>
				</nav><!-- #nav-menu-container -->
			</div>
			</header><!-- #header -->
			@if (!\Request::is('instructorlogin'))
				@if (!\Request::is('parentlogin'))
					@if (!\Request::is('studentlogin'))
						@if (!\Request::is('adminlogin'))
							@if (!\Request::is('assistantdeanlogin'))
				{{-- expr --}}
				<!--==========================
				Intro Section
				============================-->
				<section id="intro">
					<div class="intro-content">
						<h2>Making your ideas <br>happen!</h2>
						<div>
							{{-- <a href="#about" class="btn-get-started scrollto">Get Started</a> --}}
							{{-- <a href="#portfolio" class="btn-projects scrollto">Our Projects</a> --}}
						</div>
					</div>
					<div id="intro-carousel" class="owl-carousel" >
						<div class="item" style="background-image: url({{url("/dashboard/sd-image/1.jpg")}});"></div>
						<div class="item" style="background-image: url({{url("/dashboard/sd-image/2.jpg")}});"></div>
						<div class="item" style="background-image: url({{url("/dashboard/sd-image/3.jpg")}});"></div>
						<div class="item" style="background-image: url({{url("/dashboard/sd-image/4.jpg")}});"></div>
						<div class="item" style="background-image: url({{url("/dashboard/sd-image/5.jpg")}});"></div>
					</div>
					</section><!-- #intro -->
								@endif
							@endif
						@endif
					@endif
				@endif
				<main id="main">
					@yield('content')
				</main>
				<!--==========================
				Footer
				============================-->
				<footer id="footer">
					<div class="container">
						<div class="copyright">
							&copy; Copyright <strong>Reveal</strong>. All Rights Reserved
						</div>
						<div class="credits">
							<!--
							All the links in the footer should remain intact.
							You can delete the links only if you purchased the pro version.
							Licensing information: https://bootstrapmade.com/license/
							Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Reveal
							-->
							Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
						</div>
					</div>
					</footer><!-- #footer -->
					<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
					<!-- JavaScript Libraries -->
					<script src="lib/jquery/jquery.min.js"></script>
					<script src="lib/jquery/jquery-migrate.min.js"></script>
					<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
					<script src="lib/easing/easing.min.js"></script>
					<script src="lib/superfish/hoverIntent.js"></script>
					<script src="lib/superfish/superfish.min.js"></script>
					<script src="lib/wow/wow.min.js"></script>
					<script src="lib/owlcarousel/owl.carousel.min.js"></script>
					<script src="lib/magnific-popup/magnific-popup.min.js"></script>
					<script src="lib/sticky/sticky.js"></script>
					<!-- Uncomment below if you want to use dynamic Google Maps -->
					<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script> -->
					<!-- Contact Form JavaScript File -->
					<script src="contactform/contactform.js"></script>
					<!-- Template Main Javascript File -->
					<script src="js/main.js"></script>
				</body>
			</html>
