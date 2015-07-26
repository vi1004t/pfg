@extends('app')
@section('head')
@parent

<!--   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script> -->

<script>
var p =[]; //variable on es guarden els poligons
$(function(){
  $('body').on('hidden.bs.modal', '.modal', function () {
    $(this).removeData('bs.modal');
});
  $('#llistat').load(window.location.pathname + '/llista');
  $('#info').load(window.location.pathname + '/info');
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
  <li><a href="../../home">Casa</a></li>
  <li>{!! Html::linkAction('CultiuController@create', 'Crear cultiu', array('id' => $dades['id']), array('data-toggle' => 'modal', 'data-target' => '#flotant')) !!}</li>
  <li>{!! Html::linkAction('CampController@edit', 'Edita', array('id' => $dades['id']), array('data-toggle' => 'modal', 'data-target' => '#flotant')) !!}</li>
  @parent
@stop
@section('content')
<span id="mapa"></span>
<div id="esquerra">
  <div class="container-fluid" id="info"></div>
</div>
<div id="dreta">
  <div class="container-fluid" id="llistat">
  </div>
</div>

@stop
