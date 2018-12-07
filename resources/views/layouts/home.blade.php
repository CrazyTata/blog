<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>tata-blog- @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />


  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="/css/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="/css/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="/css/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="/css/css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="/css/css/flexslider.css">
@yield('css')
	<!-- Theme style  -->
	<link rel="stylesheet" href="/css/css/style.css">

	<!-- Modernizr JS -->
	<script src="/js/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container-fluid">
			<div class="row">
				<div class="top-menu">
					<div class="container">
						<div class="row">
							<div class="col-sm-7 text-left menu-1">
								<ul>
									<li class="active"><a href="{{ URL::route('index') }}">Home</a></li>
									<li><a href="{{ URL::route('blog') }}">Lifestyle</a></li>
									<li class="has-dropdown">
										<a href="{{ URL::route('blog') }}">Blog</a>
										<ul class="dropdown">
											<li><a href="#">Web Design</a></li>
											<li><a href="#">eCommerce</a></li>
											<li><a href="#">Branding</a></li>
											<li><a href="#">API</a></li>
										</ul>
									</li>
									<li><a href="{{ URL::route('about') }}">About</a></li>
									<li><a href="{{ URL::route('blog') }}">Contact</a></li>
								</ul>
							</div>
							<div class="col-sm-5">
								<ul class="fh5co-social-icons">
									<li><a href="#"><i class="icon-twitter-with-circle"></i></a></li>
									<li><a href="#"><i class="icon-facebook-with-circle"></i></a></li>
									<li><a href="#"><i class="icon-linkedin-with-circle"></i></a></li>
									<li><a href="#"><i class="icon-dribbble-with-circle"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 text-center menu-2">
					<div id="fh5co-logo">
						<h1>
							<a href="index.html">
							Paper<span>.</span>
							<small>Blog Theme</small>
							</a>
						</h1>
					</div>
				</div>
			</div>
		</div>
	</nav>

@yield('content')


<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 fh5co-widget">
					<h4>Paper</h4>
					<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
				</div>
				<div class="col-md-4 col-md-push-1">
					<h4>Links</h4>
					<ul class="fh5co-footer-links">
						<li><a href="#">Home</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Lifestyle</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</div>

				<div class="col-md-4 col-md-push-1">
					<h4>Contact Information</h4>
					<ul class="fh5co-footer-links">
						<li>198 West 21th Street, <br> Suite 721 New York NY 10016</li>
						<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
						<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
						<li><a href="http://freehtml5.co">FreeHTML5.co</a></li>
					</ul>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="/js/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="/js/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="/js/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="/js/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="/js/js/jquery.flexslider-min.js"></script>
	<!-- Magnific Popup -->
	<script src="/js/js/jquery.magnific-popup.min.js"></script>
	<script src="/js/js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="/js/js/main.js"></script>
	<!-- vue -->
	<script src="/js/lib/vue/vue.js"></script>
	@yield('js')
	</body>
</html>
