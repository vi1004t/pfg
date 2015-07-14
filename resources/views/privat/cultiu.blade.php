@extends('app')
@section('head')
<style>
body{
  overflow:hidden;
}
</style>
@stop
@section('menuglobal')
  <li><a href="../">Al camp</a></li>
  <li><a href="{{ $array['cultiu'] }}/event/create">Crear event</a></li>
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
         source: "{{ $array['json'] }}"
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
<table id='infocamp'>
  <tr>
    <td>
      <p>Lloc de la fotografia </p>
    </td>
    <td>
      <p>Nom del cultiu </p>
    </td>
  </tr>
  <tr>
    <td>
      <p>Nom del bancal al que pertany </p>
    </td>
    <td>
      <p>15/05/2015 </p>
    </td>
  </tr>
  <tr>
    <td>
      <p>Visibilitat del camp: </p>
    </td>
    <td>
      <p>Amics </p>
    </td>
  </tr>
</table>
@stop
@section('dreta')
{!! Form::open(['action' => 'EventController@postcrear']) !!}

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="user" value="{!! $array['user'] !!}">
    <input type="hidden" name="camp" value="{!! $array['camp'] !!}">
    <input type="hidden" name="cultiu" value="{!! $array['cultiu'] !!}">
    {!! Form::select('tevent', App\Tevent::listar(), '') !!}
    {!! Form::submit('Crea'); !!}
{!! Form::close() !!}
@stop
