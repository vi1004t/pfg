@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-headding">Crear nou usuari</div>
        <div class="panel-body">
            {!! Form::open(['route' => 'usuari.store', 'method' => 'POST']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              {!! Form::label('nick', 'Nick') !!}
              {!! Form::text('nick', null, ['class' => 'form-control', 'type'=>'text']) !!}
            </div>
{{--
            <div class="form-group">
              {!! Form::label('nom', 'Nom') !!}
              {!! Form::text('email', null, ['class' => 'form-control', 'type'=>'text']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('cognoms', 'Cognoms') !!}
              {!! Form::email('cognoms', null, ['class' => 'form-control', 'type'=>'email']) !!}
            </div>
--}}
            <div class="form-group">
              {!! Form::label('email', 'E-MaiL') !!}
              {!! Form::email('email', null, ['class' => 'form-control', 'type'=>'email']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('password', 'Contrasenya') !!}
              {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('password2', 'Confirma contrasenya') !!}
              {!! Form::password('password2', ['class' => 'form-control']) !!}
            </div>
{{--
            <div class="form-group">
              {!! Form::label('poblacio', 'Població') !!}
              {!! Form::email('poblacio', null, ['class' => 'form-control', 'type'=>'email']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('provincia', 'Província') !!}
              {!! Form::email('provincia', null, ['class' => 'form-control', 'type'=>'email']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('pais', 'Pais') !!}
              {!! Form::email('pais', null, ['class' => 'form-control', 'type'=>'email']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('visibilitat', 'Tipus de visibilitat') !!}
              {!! Form::select('visibilitat', [''=> 'Seleccione tipo', 'tots' => "Tot lo mon", 'ningu' => 'dengú'], '', ['class' => 'form-control', 'type'=>'email']) !!}
            </div>
--}}

            {!! Form::submit('Registra') !!}

            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
