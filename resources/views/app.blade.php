<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title }}</title>

	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/jquery-ui.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/jquery-ui.theme.min.css') }}" rel="stylesheet">

	<!-- Fonts -->
	
        {!! HTML::style('font-awesome/css/font-awesome.min.css') !!}
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
        <script src="/js/jquery-2.1.3.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
        <script src="/js/jquery-ui.min.js"></script>
        <script src="/js/global.js"></script>
        @yield('customcss')
        @yield('customjs')
        <link href="/css/global.css" rel="stylesheet">
        <link href="/css/{{ $currentFolder }}/index.css" rel="stylesheet">
        <script src="/js/{{ $currentFolder }}/index.js"></script>
        
        
</head>
<body>
        
        <nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">{{ $myApp }}</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
                                    @if (Auth::check())
                                        @role('members') 
                                            @include('partials/membernavbar')
                                        @endrole                                                                                  
                                        @role('admins') 
                                            @include('partials/adminnavbar')
                                        @endrole
                                    @endif                                   
                                    
				</ul>

				@include('partials/navbarlogout')
			</div>
		</div>
	</nav>
        @if (\Session::has("flash_message"))
        <div class="alert alert-success">
            {!! \Session::get("flash_message") !!}
        </div>
        @endif
        @if (\Session::has("flash_message_danger"))
        <div class="alert alert-danger">
            {!! \Session::get("flash_message_danger") !!}
        </div>
        @endif
        <div id="pagewrap">
            <section id="content">
                <h2>1st Content Area</h2>
                <p>This page demonstrates a 3 column responsive layout, complete with responsive images and jquery slideshow.</p>
            </section> 
            <section id="middle">
                @yield('content')
            </section>
            <aside id="sidebar">
                <h2>3rd Content Area</h2>
                <p>Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                <p>Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
            </aside>
            <div class="clearfix"></div>
            <footer>
                <div style="text-align: center">
                    <p>Copyright © {{ $domainName }} <?php echo date("Y") ?> 
                </div>
            </footer>     
        </div>
        <div class="clearfix"></div>
	<!-- Scripts -->
</body>
</html>
