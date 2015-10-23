<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="punts" id="map-coords" value=""/>

  <div class="row">
    <div class="col-sm-6 col-md-6">
          <div class="form-group">
            {!! Form::label('nom', 'Nom') !!}
            {!! Form::text('nom',  $camp->nom, ['class' => 'form-control', 'type'=>'text']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('descripcio', 'Descripció') !!}
            {!! Form::text('descripcio', $camp->descripcio, ['class' => 'form-control', 'type'=>'text']) !!}
          </div>
    </div>
    <div class="col-sm-6 col-md-6 ">
          <div class="form-group">
            {!! Form::label('poble', 'Població') !!}
            {!! Form::text('poble',  $camp->poble, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('visibilitat_id', 'Tipus de visibilitat') !!}
            {!! Form::select('visibilitat_id', App\Visibilitat::listar(), $camp->visibilitat_id, ['class' => 'form-control']) !!}
          </div>
    </div>
  </div>
