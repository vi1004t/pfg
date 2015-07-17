@extends('privat.mapa')

@section('head')
@parent
{!! $dades['coordenades']!!}
@stop
@section('menuglobal')
  <li><a href="../">Casa</a></li>
  <li>{!! Html::linkAction('CultiuController@create', 'Crear cultiu', array('id' => $dades['id'])) !!}</li>
  <li><a href="/">Editar</a></li>
  @parent
@stop
@section('content')
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
  <div class="container-fluid">
    @if ($dades['cultius'] > 0)
      <div class="row">
        <div class="col-sm-4 col-md-4">Nom</div>
        <div class="col-sm-8 col-md-8">Descrpició</div>
      </div>
      @foreach ($dades['cultius'] as $item)
          {!! $item !!}
      @endforeach
    @else
        <p>Encara no tens cultius en aquest camp</p>
    @endif
  </div>
</div>
@stop
