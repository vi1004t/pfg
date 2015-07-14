@extends('privat.mapa')

@section('menuglobal')
  <li>{!! Html::linkAction('CampController@create', 'Crear camp') !!}</li>
  @parent
@stop
@section('esquerra')
	{{Auth::user()->email}}
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
