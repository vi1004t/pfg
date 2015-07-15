@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-headding">Crear nou cultiu</div>
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
            {!! Form::open(['action' => 'CultiuController@store', 'method' => 'POST']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="camp_id" value="{!! $array['camp'] !!}">
            <input type="hidden" name="user_profile_id" value="{!! $array['user'] !!}">
            <div class="form-group">
              {!! Form::label('headline', 'Nom') !!}
              {!! Form::text('headline', null, ['class' => 'form-control', 'type'=>'text']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('text', 'Descripció') !!}
              {!! Form::text('text', null, ['class' => 'form-control', 'type'=>'email']) !!}
            </div>

            <div class="form-group">
              {!! Form::label('startDate', 'Data inici') !!}
              {!! Form::text('startDate', null, ['class' => 'form-control', 'type'=>'email']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('planta_id', 'Espècie') !!}
              {!! Form::select('planta_id', App\planta::listar(), '', ['class' => 'form-control', 'type'=>'email']) !!}
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
