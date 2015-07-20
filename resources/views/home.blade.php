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
  @endforeach
}
google.maps.event.addDomListener(window, 'load', dibuixar);
</script>
<script>
  var clic = 1;
  function divLogin($id){
     if(clic==1){
     //document.getElementById($id).style.height = "100%";
     document.getElementById($id).style.display = "block";

     clic = clic + 1;
     } else{
    //     document.getElementById($id).style.height = "0px";
      document.getElementById($id).style.display = "none";
      clic = 1;
    }
  }
</script>
@stop
@section('menuglobal')
  <li>{!! Html::linkAction('CampController@create', 'Crear camp') !!}</li>
  @parent
@stop
@section('content')
<div id="esquerra">
  <div class="btn btn-default" onclick="divLogin('llistat_ocult')">
    Els meus camps
  </div>
  <div id="llistat_ocult" >
    <div class="container-fluid">
      @if ($dades['camps'] > 0)
        <div class="row">
          <div class="col-sm-4 col-md-4">Nom</div>
          <div class="col-sm-5 col-md-5">Descrpició</div>
          <div class="col-sm-3 col-md-3">Població</div>
        </div>
        @foreach ($dades['camps'] as $item)
            {!! $item !!}
        @endforeach
      @else
          <p>Encara no tens cap camp</p>
      @endif
    </div>
  </div>
</div>
<div id="dreta">
  @for ($i = 0; $i < 20; $i++)
    <li>The current value is {{ $i }}</li>
  @endfor
@stop
</div>
