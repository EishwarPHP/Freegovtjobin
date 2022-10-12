<!DOCTYPE html>
<html lang="en">
<head>
<title>Freegovtjob.in</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Freegovtjob.in provides all india job notifications" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- css -->
<link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" type="text/css" media="all" />
<link rel="stylesheet" 	href="{{asset('frontend/css/font-awesome.min.css')}}" type="text/css" media="all">
<!--// css -->
<!-- font -->
<link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="{{asset('frontend/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.js')}}"></script>
<style>
	h2{
		color: #fff;
		font-size: 1px;
	}
</style>
<h2>CGSOS छ.ग राज्य ओपन स्कूल रायपुर</h2>
<h2>CG Govt Jobs</h2>
<h2>Chhattisgarh Jobs</h2>
</head>
<body>
	<div class="main-w3">
		<div class="col-md-12 top-menu">
			<div class="col-md-3 col-sm-6"><img src="{{ asset('frontend/images/logo.jpeg') }}" alt="Freegovtjob.in" class="img-responsive"></div>
			<div class="col-md-12" style="background:#e8ae5b">
			<div class="top-nav">
				<nav class="navbar navbar-default cl-effect-13"  id="cl-effect-13">

					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="hover-effect  {{ Request::is('https://freegovtjob.in/') ? 'active' : '' }}"><a href="https://freegovtjob.in/">Home</a></li>
							<li class="hover-effect  {{ Request::is('about') ? 'active' : '' }}"><a href="#">About</a></li>
							<li class="hover-effect  {{ Request::is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>
                            <li class="hover-effect ">
                                @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                                    @else
                                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                            </li>
						</ul>
					</div>

				</nav>		
			</div>
			</div>	
			{{-- <div class="search">
				<form action="#" method="post">
					<input type="text" name="search" placeholder="Search here" required="">
					<input type="submit" value="">
				</form>
			</div> --}}
			<div class="clearfix"></div>
			<hr>
		</div>