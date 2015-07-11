

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Geocoding service</title>
    <style>

    Skip to content
    This repository

        Explore
        Features
        Enterprise
        Blog

    1
    0

        2

    AngelSanchezAW/Ocultar-y-Mostrar-Div-JavaScript-CSS3

    Ocultar-y-Mostrar-Div-JavaScript-CSS3/css/style.css
    @AngelSanchezAW AngelSanchezAW on 26 Aug 2014 Ocultar y Mostrar Div JavaScript CSS3

    1 contributor
    68 lines (59 sloc) 0.884 kB
    *{
    	margin: 0;
    	padding: 0;
    }
    figure{
    	width: 180px;
    	display: inline-block;
    	margin-top: 10px;
    	float: right;
    }

    figure img{
    	width: 180px;
    }

    #contenedor{
    	width: 50%;
    	margin: auto;
    }

    #caja{
    	width: 100%;
    	margin: auto;
    	height: 0px;
    	background: #000;
    	box-shadow: 10px 10px 3px #D8D8D8;
    	transition: height .4s;
    }

    #caja2{
    	width: 100%;
    	margin: auto;
    	height: 0px;
    	background: #000;
    	box-shadow: 10px 10px 3px #D8D8D8;
    	transition: height .4s;
    }

    #boton2:hover + div#caja2{
    	height: 100px;
    }

    #boton2{
    	padding: 10px;
    	background: orange;
    	width: 95px;
    	cursor: pointer;
    	margin-top: 10px;
    	margin-bottom: 10px;
    	box-shadow: 0px 0px 1px #000;
    	display: inline-block;
    }


    #boton{
    	padding: 10px;
    	background: orange;
    	width: 95px;
    	cursor: pointer;
    	margin-top: 10px;
    	margin-bottom: 10px;
    	box-shadow: 0px 0px 1px #000;
    	display: inline-block;
    }

    #boton:hover{
    	opacity: .8;
    }


    </style>
<script src="js/general.js"></script>
  </head>
  <body>
  	<div id="contenedor">
  		<div id="boton" onclick="divLogin('caja')">
  			Mostrar/Ocultar
  		</div>
  		<figure>
  			<a href="http://www.azulweb.net/">
  				<img src="http://www.azulweb.net/generador-de-sombras-css3/img/logo.png" />
  			</a>
  		</figure>
  		<div id="caja">
        prova 1
  		</div>
  		<br/>
  		<figure>
  			<a href="http://www.azulweb.net/"><img src="http://www.azulweb.net/generador-de-sombras-css3/img/logo.png" /></a>
  		</figure>
  		<div id="boton2">Mostrar/Ocultar</div>
  		<div id="caja2">
  		</div>
  	</div>
  </body>
  </html>
