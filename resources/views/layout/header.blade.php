<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/nouislider.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <!-- Custom-Files -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!--Get your own code at fontawesome.com-->
    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +201026513696</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-envelope"></i> ahmosaleh1998@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Zagazig</a></li>
					</ul>
					@guest
					<ul class="header-links pull-right">
						<li><a href="{{ route('auth.login') }}"><i class="glyphicon glyphicon-user"></i> Login</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a><i></i> - </a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="{{ route('auth.register') }}"><i class="glyphicon glyphicon-user"></i> Register</a></li>
					</ul>
					@endguest
					@auth

                    <ul class="header-links pull-right">
						<li><a href="{{ route('auth.myprofile') }}"><i class="glyphicon glyphicon-user"></i> {{ Auth::user()->name }}</a></li>
					</ul>
                    <ul class="header-links pull-right">
						<li><a href="{{ route('auth.logout') }}"><i class="glyphicon glyphicon-user"></i>Logout-</a></li>
					</ul>
                    @endauth
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="{{ route('index') }}" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">All Categories</option>
										<option value="1">Category 01</option>
										<option value="1">Category 02</option>
									</select>
									<input class="input" placeholder="Search here">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Cart -->
                                <div class="dropdown">
                                    @auth
									<a href="{{ route('ordertemp',Auth::user()->id) }}" aria-expanded="true">
										<i class="fas fa-shopping-bag"></i>
										<span>Your Orders</span>
									</a>
                                    @endauth
								</div>
								<div class="dropdown">
                                    @auth
									<a href="{{ route('ordertemp',Auth::user()->id) }}" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
									</a>
                                    @endauth
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
		<!-- NAVIGATION -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div class="collapse navbar-collapse" id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="nav-item active"><a href="{{ route('index') }}">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Hot Deals</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Categories</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Laptops</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Smartphones</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Cameras</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Accessories</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
