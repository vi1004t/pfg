@extends('app')
@section('head')
@parent
<style>
body{
  overflow:hidden;
}
</style>
<script>
$(function(){
  $('body').on('hidden.bs.modal', '.modal', function () {
    $(this).removeData('bs.modal');
  });
  $('#reload').load(window.location.pathname + '/reload');
  $('#info').load(window.location.pathname + '/info');
  $('#llistat').load(window.location.pathname + '/llista');
//  $(form).submit($('#flotant').modal('show'));
});
</script>
@stop
@section('menuglobal')
  <li>{!! Html::linkAction('CampController@show', 'Al camp', array('id' => $dades['info']['camp_id'])) !!}</li>
  @if($dades['editable'])
  <li class="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Editar<b class="caret"></b></a>
    <ul class="dropdown-menu" role="menu">
      <li>{!! Html::linkAction('CultiuController@edit', 'Modifica', array('id' => $dades['info']['id']), array('data-toggle' => 'modal', 'data-target' => '#flotant')) !!}</li>
      <li><a href="#">Elimina</a></li>
    </ul>
  </li>
  <li>{!! Html::linkAction('CultiuController@finalitzar', 'Finalitzar cultiu', array('id' => $dades['info']['id']), array('data-toggle' => 'modal', 'data-target' => '#flotant')) !!}</li>
  @endif
  @parent
@stop
@section('mapa')
<span id="reload"></span>
@stop
@section('content')
<div id="esquerra">
<!-- Informació del camp -->
  <div class="container-fluid">
    <span id="info"></span>
    @if(!$dades['editable'])
    <div class="row">
      <div class="col-sm-2 col-md-2 text-right">Data finalització</div>
      <div class="col-sm-2 col-md-2">{!! $dades['info']['endDate'] !!}</div>
    </div>
    @endif
  </div>
</div>
<div id="dreta">
  <span id="menuCrearEvents">
    @if($dades['editable'])
      <input type="hidden" id="cultiu" value="{!! $dades['info']['id'] !!}">
      <input type="hidden" id="dataCreacio" value="{!! $dades['info']['startDate'] !!}">
      {!! Form::select('tevent', App\Tevent::listar(), '', ['id' => 'tevent']) !!}
      {!! Html::linkAction('EventController@create', 'Crear', '' ,  array('class' => 'btn btn-success', 'data-toggle' => 'modal', 'data-target' => '#flotant')) !!}
    @endif
  </span>
  <span id="llistat"></span>
<div>
@stop
