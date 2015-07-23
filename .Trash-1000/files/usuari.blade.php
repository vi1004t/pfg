@extends('privat.mapa')

@section('menuglobal')
  <li><a href="{{ $dades['id'] }}/camp/create">Crear camp</a></li>
  @parent
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
