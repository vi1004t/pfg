<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Comunitat Agrícola AGRECO</title>
	{!! Html::Style('/css/app.css') !!}
	{!! Html::Style('/css/aplicacio.css') !!}
	<link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />

	<!-- <link href="/css/app.css" rel="stylesheet"> -->

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	@yield('head')
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
				<a class="navbar-brand" href="#">AGRECO</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav">
					@section('menuglobal')
					<li><a href="/">Amics</a></li>
					<li><a href="/">Galeria</a></li>
					<li><a href="/">Missatgeria</a></li>
					<li class="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Consulta...<b class="caret"></b></a>
						<ul class="dropdown-menu" role="menu">
						<li><a href="#">Cultius</a></li>
						<li><a href="#">Malalties</a></li>
						<li><a href="#">Remeis</a></li>



						<li ><a href="/">Altres</a></li>
						</ul>
					</li>
					@show
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="/auth/login">Login</a></li>
						<li><a href="/auth/register">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/auth/logout">Preferències</a></li>
								<li><a href="/auth/logout">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	<div>
	  <div>
			{{ date("d/M"). ' Eixida : ' .date_sunrise(time(), SUNFUNCS_RET_STRING, 38.4, -9, 90, 1) . ' Posta: ' .date_sunset(time(), SUNFUNCS_RET_STRING, 38.4, -9, 90, 1)}}
	    <marquee scrollamount="1">Default marquee text scrolls from right to left</marquee>
	  </div>
	</div>
		@section('mapa')
		<div id="map-canvas"></div>
		@show
		@yield('content')


		<script>
		window.closeModal = function(){
		    $('#flotant').modal('hide');
		};
		window.reloadMapa = function(){
		  redibuixa();
		}
		</script>

		<div class="modal fade" id="flotant" tabindex="-1" role="dialog" aria-labelledby="flotantfinestra">
		  <div class="modal-dialog">
		      <div class="modal-content">
		      </div> <!-- /.modal-content -->
		  </div> <!-- /.modal-dialog -->
		</div>
</body>
</html>
