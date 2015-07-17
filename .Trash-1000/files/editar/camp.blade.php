@extends('privat.mapa')

@section('dibuixar')
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
            {!! Form::open(['action' => 'CampController@store', 'method' => 'POST']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{-- <input type="hidden" name="user_profile_id" value="{!! $user !!}"> --}}
            <div class="form-group">
              {!! Form::label('nom', 'Nom') !!}
              {!! Form::text('nom', null, ['class' => 'form-control', 'type'=>'text']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('descripcio', 'Descripció') !!}
              {!! Form::text('descripcio', null, ['class' => 'form-control', 'type'=>'email']) !!}
            </div>

            <div class="form-group">
              {!! Form::label('poble', 'Població') !!}
              {!! Form::text('poble', null, ['class' => 'form-control', 'type'=>'email']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('visibilitat_id', 'Tipus de visibilitat') !!}
              {!! Form::select('visibilitat_id', App\Visibilitat::listar(), '', ['class' => 'form-control', 'type'=>'email']) !!}
            </div>


            {!! Form::submit('Registra') !!}

            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
