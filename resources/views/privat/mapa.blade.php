@extends('app')
<!-- http://norfipc.com/inf/javascript-como-escribir-texto-elementos-paginas-web.html -->

@section('head')
<style>
body{
  overflow:hidden;
}
</style>
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
   if (typeof("{{ $dades['ubicacio'] }}") != '[object Array]'){
     geocoder.geocode( { 'address': "{{ $dades['ubicacio'] }}" }, function(results, status) {
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


   }

   google.maps.event.addDomListener(window, 'load', initialize);
   </script>
 
   @yield('dibuixar')
@stop
@section('mapa')
	<div id="map-canvas"></div>
@stop
