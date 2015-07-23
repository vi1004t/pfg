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
  <!-- Informació del camp -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-2 col-md-2 text-right">Nom:</div>
      <div class="col-sm-10 col-md-10">{!! $dades['info']['nom'] !!}</div>
    </div>
    <div class="row">
      <div class="col-sm-2 col-md-2 text-right">Descripció:</div>
      <div class="col-sm-10 col-md-10">{!! $dades['info']['descripcio'] !!}</div>
    </div>
    <div class="row">
      <div class="col-sm-2 col-md-2 text-right">Població</div>
      <div class="col-sm-10 col-md-10">{!! $dades['info']['poble'] !!}</div>
    </div>
    <div class="row">
      <div class="col-sm-2 col-md-2 text-right">Visibilitat</div>
      <div class="col-sm-10 col-md-10"></div>
    </div>
  </div>
</div>
<div id="dreta">
  <div class="container-fluid" id="llistat">

  </div>
</div>

@stop
