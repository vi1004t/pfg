@extends('privat.mapa')

@section('head')
@parent
<script>
function dibuixar(){
  @foreach ($dades["coordenades"] as $item)
    var coords = [{!!$item["punts"]!!}]
    var p = new google.maps.Polygon({
        paths:  coords,
        strokeWeight: 3,
        fillColor: '{!!$item["color"]!!}',
        fillOpacity: 0.35,
        strokeColor: '{!!$item["color"]!!}',
        strokeOpacity: 0.8,

    });
    p.setMap(map);
    @if($item['info'] != 'no_valor')
    google.maps.event.addListener(p, 'click', function(event){
      infoWindow.setContent('{!!$item["info"]!!}');
      infoWindow.setPosition(event.latLng);
      infoWindow.open(map);

    });
    infoWindow = new google.maps.InfoWindow();
    @endif
  @endforeach
}

google.maps.event.addDomListener(window, 'load', dibuixar);
</script>
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
