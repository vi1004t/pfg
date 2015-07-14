<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Comunitat Agrícola AGRECO</title>
	{!! Html::Style('/css/app.css') !!}
	{!! Html::Style('/css/aplicacio.css') !!}

	<!-- <link href="/css/app.css" rel="stylesheet"> -->

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="js/general.js"></script>
	<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$('a.modalButton').on('click', function(e) {
    var src = $(this).attr('data-src');
  //  var height = $(this).attr('data-height') || 300;
  //  var width = $(this).attr('data-width') || 400;

    $("#myModal iframe").attr({'src':src,
                        //'height': height,
                        //'width': width}
												);
});

});//]]>

</script>
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



						<li ><a data-toggle="modal" data-target="#DGeneral" href="#">Altres</a></li>
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
	    <marquee scrollamount="1">Default marquee text scrolls from right to left</marquee>
	  </div>
	</div>
		@yield('mapa')

		@yield('content')

	<div id="esquerra">
		@yield('esquerra')
	</div>
	<div id="dreta">
	  @yield('dreta')
	</div>
	<div class="modal fade" id="flotant" tabindex="-1" role="dialog" aria-labelledby="flotantfinestra">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <iframe frameborder="0"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
