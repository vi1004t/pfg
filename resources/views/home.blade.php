@extends('app')
@section('head')
@parent
<script>
  var clic = 1;
  function divLogin($id){
     if(clic==1){
     //document.getElementById($id).style.height = "100%";
     document.getElementById($id).style.display = "block";

     clic = clic + 1;
     } else{
    //     document.getElementById($id).style.height = "0px";
      document.getElementById($id).style.display = "none";
      clic = 1;
    }
  }
</script>
<script>
var p =[]; //variable on es guarden els poligons
$(function(){
  $('#llistat').load(window.location.pathname + '/llista');
  $('#events').load(window.location.pathname + '/events');
  $('#mapa').load(window.location.pathname + '/mapa',function(){
    var documentHead = document.head  ||  document.getElementsByTagName('head')[0];
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAr79Hev0xfyNdjMx8fmCZqzARoZ3MnCjs' +
        '&signed_in=false&callback=initialize';
    documentHead.appendChild(script);
  })

});
</script>
@stop
@section('menuglobal')
  <li>{!! Html::linkAction('CampController@create', 'Crear camp') !!}</li>
  @parent
@stop
@section('content')
<span id="mapa"></span>

<div id="esquerra">
    <div class="container-fluid" id="llistat"></div>
</div>
<div id="dreta">
<div class="container-fluid" id="events"></div>
@stop
</div>
