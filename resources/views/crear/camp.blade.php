@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-headding">Crear nou camp</div>
        <div class="panel-body">
            {!! Form::open(['route' => 'usuari.{user}.camp.store', 'method' => 'POST']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="user_profile_id" value="{!! $user !!}">
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
