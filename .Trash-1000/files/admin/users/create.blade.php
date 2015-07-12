@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-headding">Crear nou usuari</div>
        <div class="panel-body">
            {!! Form::open(['route' => 'usuari.store'. 'method' => 'POST']) !!}

            <div class="form-group">
              {!! Form::label('lemail', 'E-MaiL') !!}
              {!! Form::email(email, null, ['class' => 'form-control', 'type'=>'email']) !!}            
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" id="exampleInputFile">
            <p class="help-block">Example block-level help text here.</p>
            </div>
            <div class="checkbox">
            <label>
              <input type="checkbox"> Check me out
            </label>
            </div>


            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
