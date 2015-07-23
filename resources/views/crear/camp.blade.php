@extends('app')

@section('head')
@parent
<style>
body{
  overflow:scroll;
}
</style>
<script type="text/javascript"
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAr79Hev0xfyNdjMx8fmCZqzARoZ3MnCjs">
   </script>
<!--   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script> -->
   <script>
   var geocoder;
   var map;
   function initialize() {
     var latlng = new google.maps.LatLng(-34.397, 150.644);
     var mapOptions = {
       center: latlng,
       zoom: 14,
       streetViewControl: false,
       mapTypeId: google.maps.MapTypeId.SATELLITE
     }
     map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
   }

   google.maps.event.addDomListener(window, 'load', initialize);
   </script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=drawing"></script>

<script type="text/javascript">
var drawingManager;
var selectedShape;
var coordenades = "";

function clearSelection() {
  if (selectedShape) {
    selectedShape.setEditable(false);
    selectedShape = null;
    //coordenades = "";
  }
}

function setSelection(shape) {
  clearSelection();
  selectedShape = shape;
  coordenades = selectedShape.getPath().getArray();
  shape.setEditable(true);
  selectColor(shape.get('fillColor') || shape.get('strokeColor'));
}

function deleteSelectedShape() {
  if (selectedShape) {
    selectedShape.setMap(null);
    coordenades = "";
    drawingManager.setOptions({
      drawingControl: true,
      drawingModes: [
        //google.maps.drawing.OverlayType.MARKER,
        //google.maps.drawing.OverlayType.CIRCLE,
        google.maps.drawing.OverlayType.POLYGON,
        //google.maps.drawing.OverlayType.POLYLINE,
        //google.maps.drawing.OverlayType.RECTANGLE
      ]
    });
  }
}
function xxx() {

drawingManager = new google.maps.drawing.DrawingManager({
  drawingMode: google.maps.drawing.OverlayType.POLYGON,
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
google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
    drawingManager.setOptions({
      drawingControl: false
    });
    if (e.type != google.maps.drawing.OverlayType.MARKER) {
    // Switch back to non-drawing mode after drawing a shape.
    drawingManager.setDrawingMode(null);

    // Add an event listener that selects the newly-drawn shape when the user
    // mouses down on it.
    var newShape = e.overlay;
    newShape.type = e.type;
    google.maps.event.addListener(newShape, 'click', function() {
      setSelection(newShape);
    });
    setSelection(newShape);

  }
});


google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
google.maps.event.addListener(map, 'click', clearSelection);
google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);
google.maps.event.addDomListener(document.getElementById('submit_button'), 'click', function(){
    document.getElementById('map-coords').value = coordenades;
});

drawingManager.setMap(map);
}
google.maps.event.addDomListener(window, 'load', xxx);
</script>
@if($dades['ubicacio_centre'] == 'no_valor')
  <script>
  function ubica(){
    geocoder = new google.maps.Geocoder();
    if (typeof("{{ $dades['ubicacio'] }}") != '[object Array]'){
      geocoder.geocode( { 'address': "{{ $dades['ubicacio'] }}" }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });
      } else {
        alert('Configura correctament el nom de la teva població: ' + status);
      }
      });
    }

  }
  google.maps.event.addDomListener(window, 'load', ubica);
  </script>
@else
  <script>
  function ubica(){
    var latlng = new google.maps.LatLng({{ $dades['ubicacio_centre']['y'] }}, {{ $dades['ubicacio_centre']['x'] }});
    map.setCenter(latlng);
    map.setZoom(18);
    var marker = new google.maps.Marker({
        map: map,
        position: latlng
    });

  }
  google.maps.event.addDomListener(window, 'load', ubica);
  </script>
@endif

@stop
@section('menuglobal')
  <li><a href="../../home">Casa</a></li>
  @parent
@stop
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-headding">Crear nou camp</div>
        <div class="panel-body">
          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
            {!! Form::open(['action' => 'CampController@store', 'method' => 'POST', 'id' => 'map-form']) !!}
            @include('parcials.camp')
            {!! Form::submit('Registra', array('id' => 'submit_button')) !!}
            {!! Form::close() !!}
            <button id="delete-button">Eliminar dibuix</button>
        </div>
      </div>
    </div>
    <div class="col-md-2">

    </div>
  </div>
</div>
@endsection
