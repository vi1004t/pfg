@extends('app')
<!-- http://norfipc.com/inf/javascript-como-escribir-texto-elementos-paginas-web.html -->

@section('head')


<script type="text/javascript"
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAr79Hev0xfyNdjMx8fmCZqzARoZ3MnCjs">
   </script>
<!--   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script> -->
   <script>
   var geocoder;
   var map;
   function initialize() {
   geocoder = new google.maps.Geocoder();
   var latlng = new google.maps.LatLng(-34.397, 150.644);
   var mapOptions = {
   zoom: 14,
   mapTypeId: google.maps.MapTypeId.SATELLITE
   }
   map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
   geocoder.geocode( { 'address': "Quatretonda"}, function(results, status) {
   if (status == google.maps.GeocoderStatus.OK) {
     map.setCenter(results[0].geometry.location);
     var marker = new google.maps.Marker({
         map: map,
         position: results[0].geometry.location
     });
   } else {
     alert('Configura correctament el nom de la teva població: ' + status);
   }
   });
   }

   google.maps.event.addDomListener(window, 'load', initialize);


   </script>


@stop
@section('menuglobal')
  @parent
  <li><a href="/">Crear camp</a></li>
  <li><a href="/">Crear cultiu</a></li>
  <li><a href="/">Amics</a></li>
  <li><a href="/">Galeria</a></li>
  <li><a href="/">Missatgeria</a></li>
  <li class="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Consulta...<b class="caret"></b></a>
    <ul class="dropdown-menu" role="menu">
    <li><a href="#">Cultius</a></li>
    <li><a href="#">Malalties</a></li>
    <li><a href="#">Remeis</a></li>
    <li ><a href="#">Altres</a></li>
    </ul>
  </li>
@stop
@section('infoscroll')
<div class="display classic blue">
  <div class="inner stop">
    <marquee scrollamount="1">Default marquee text scrolls from right to left</marquee>
  </div>
</div>
@stop
@section('mapa')
	<div id="map-canvas"></div>

@stop
@section('esquerra')
  <div class="btn btn-default" onclick="divLogin('camps')">
    Els meus camps
  </div>
  <div id="camps" >
    Hola
  </div>
@stop
@section('dreta')
  @for ($i = 0; $i < 20; $i++)
    <li>The current value is {{ $i }}</li>
  @endfor
@stop
