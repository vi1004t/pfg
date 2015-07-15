@extends('privat.mapa')

@section('dibuixar')
<script>
function dibuixa() {

     // Define the LatLng coordinates for the polygon.
     var triangleCoords = [
         new google.maps.LatLng(25.774252, -80.190262),
         new google.maps.LatLng(18.466465, -66.118292),
         new google.maps.LatLng(32.321384, -64.75737),
         new google.maps.LatLng(34.321384, -61.75737),
     ];

     // Construct the polygon.
     bermudaTriangle = new google.maps.Polygon({
       paths: triangleCoords,
       strokeColor: '#FF0000',
       strokeOpacity: 0.8,
       strokeWeight: 3,
       fillColor: '#FF0000',
       fillOpacity: 0.35
     });

     bermudaTriangle.setMap(map);

}
google.maps.event.addDomListener(window, 'load', dibuixa);
</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=drawing"></script>

<script>
function xxx() {
var drawingManager = new google.maps.drawing.DrawingManager({
  drawingMode: google.maps.drawing.OverlayType.MARKER,
  drawingControl: true,
  drawingControlOptions: {
    position: google.maps.ControlPosition.TOP_CENTER,
    drawingModes: [
      //google.maps.drawing.OverlayType.MARKER,
      //google.maps.drawing.OverlayType.CIRCLE,
      google.maps.drawing.OverlayType.POLYGON,
      //google.maps.drawing.OverlayType.POLYLINE,
      //google.maps.drawing.OverlayType.RECTANGLE
    ]
  },
  markerOptions: {
    icon: ''
  },
  circleOptions: {
    fillColor: '#ffff00',
    fillOpacity: 1,
    strokeWeight: 5,
    clickable: false,
    editable: true,
    zIndex: 1
  }
});
drawingManager.setMap(map);
}
google.maps.event.addDomListener(window, 'load', xxx);
</script>
@stop
@section('menuglobal')
  <li><a href="../">Casa</a></li>
  <li>{!! Html::linkAction('CultiuController@create', 'Crear cultiu', array('id' => $dades['id'])) !!}</li>
  <li><a href="/">Editar</a></li>
  @parent
@stop
@section('esquerra')
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
@stop
@section('dreta')
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
@stop
