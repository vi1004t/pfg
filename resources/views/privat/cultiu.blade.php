@extends('app')
@section('head')
<style>
body{
  overflow:hidden;
}
</style>
<script>
$(function(){
  $(form).submit($('#flotant').modal('show');)
});
</script>
@stop
@section('menuglobal')
  <li>{!! Html::linkAction('CampController@show', 'Al camp', array('id' => $dades['info']['camp_id'])) !!}</li>
  <li><a href="/">Editar</a></li>
  @parent
@stop
@section('mapa')
<span id="reload">
      <!-- BEGIN Timeline Embed -->
      <div id="timeline-embed"></div>
      <script type="text/javascript">
        var timeline_config = {
         width: "100%",
         height: "50%",
         start_at_end:       true,
         lang:               'ca',
         start_zoom_adjust:  '-2',
         source: "{{ $dades['json'] }}"
         //source: "example_json.json"
        }
      </script>
      <script type="text/javascript" src="/js/storyjs-embed.js"></script>
      <!-- END Timeline Embed-->
</span>

@stop

@section('content')
<!--<div id="overlay4">

       <div>
           <h2>Some awesome title</h2>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquid perspiciatis maxime sint deleniti. Modi odio odit accusamus quam debitis amet obcaecati unde dolores dignissimos doloribus. Consequatur mollitia repellendus ut!</p>
       </div>
       <div class="background"></div>
   </div>-->

<div id="esquerra">
<!-- Informació del camp -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-md-6 text-right">Lloc de la fotografia</div>
      <div class="col-sm-6 col-md-6">{!! $dades['info']['nom'] !!}</div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-6 text-right">Nom del cultiu</div>
      <div class="col-sm-6 col-md-6">{!! $dades['info']['descripcio'] !!}</div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-6 text-right">Visibilitat del camp:</div>
      <div class="col-sm-6 col-md-6"></div>
    </div>
  </div>
</div>
<div id="dreta">
    <input type="hidden" id="cultiu" value="{!! $dades['info']['id'] !!}">
    <input type="hidden" id="dataCreacio" value="{!! $dades['info']['startDate'] !!}">
    {!! Form::select('tevent', App\Tevent::listar(), '', ['id' => 'tevent']) !!}
    {!! Html::linkAction('EventController@create', 'Crear', '' ,  array('class' => 'btn btn-success', 'data-toggle' => 'modal', 'data-target' => '#flotant')) !!}
<div>
@stop
