@extends('app')
@section('head')
<style>
body{
  overflow:hidden;
}
</style>
@stop
@section('menuglobal')
  <li>{!! Html::linkAction('CampController@show', 'Al camp', array('id' => $dades['info']['camp_id'])) !!}</li>
  <li><a href="{{ $dades['info']['id'] }}/event/create">Crear event</a></li>
  <li><a href="/">Editar</a></li>
  @parent
@stop
@section('mapa')

      <!-- BEGIN Timeline Embed -->
      <div id="timeline-embed"></div>
      <script type="text/javascript">
        var timeline_config = {
         width: "100%",
         height: "50%",
         start_at_end:       true,
         lang:               'ca',
         start_zoom_adjust:  '4',
         source: "{{ $dades['json'] }}"
         //source: "example_json.json"
        }
      </script>
      <script type="text/javascript" src="/js/storyjs-embed.js"></script>
      <!-- END Timeline Embed-->

@stop
@section('content')
<!--<div id="overlay4">

       <div>
           <h2>Some awesome title</h2>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquid perspiciatis maxime sint deleniti. Modi odio odit accusamus quam debitis amet obcaecati unde dolores dignissimos doloribus. Consequatur mollitia repellendus ut!</p>
       </div>
       <div class="background"></div>
   </div>-->
@stop
@section('esquerra')
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
@stop
@section('dreta')
{!! Form::open(['action' => 'EventController@postcrear']) !!}

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="cultiu" value="{!! $dades['info']['id'] !!}">
    {!! Form::select('tevent', App\Tevent::listar(), '') !!}
    {!! Form::submit('Crea'); !!}
{!! Form::close() !!}
@stop
