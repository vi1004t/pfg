@extends('privat.mapa')

@section('head')
@parent
<style>
body{
  overflow:scroll;
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=drawing"></script>

<script type="text/javascript">
var drawingManager;
var selectedShape;
var coordenades = "sssss";

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
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{-- <input type="hidden" name="user_profile_id" value="{!! $user !!}"> --}}
            <input type="hidden" name="ubicacio" id="map-coords" value=""/>

              <div class="row">
                <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        {!! Form::label('nom', 'Nom') !!}
                        {!! Form::text('nom', null, ['class' => 'form-control', 'type'=>'text']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('descripcio', 'Descripció') !!}
                        {!! Form::text('descripcio', null, ['class' => 'form-control', 'type'=>'email']) !!}
                      </div>
                </div>
                <div class="col-sm-6 col-md-6 ">
                      <div class="form-group">
                        {!! Form::label('poble', 'Població') !!}
                        {!! Form::text('poble', null, ['class' => 'form-control', 'type'=>'email']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('visibilitat_id', 'Tipus de visibilitat') !!}
                        {!! Form::select('visibilitat_id', App\Visibilitat::listar(), '', ['class' => 'form-control', 'type'=>'email']) !!}
                      </div>
                      {!! Form::submit('Registra', array('id' => 'submit_button')) !!}
                      {!! Form::close() !!}

                </div>
              </div>
            <button id="delete-button">Eliminar dibuix</button>
        </div>
      </div>
    </div>
    <div class="col-md-2">

    </div>
  </div>
</div>
@endsection
