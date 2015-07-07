@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Nou cultiu</div>
				<div class="panel-body">

          {!! Form::open(['route' => 'plantes.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

          <div class="form-group">
            {!! Form::label(null, 'Espècie') !!}
            {!! Form::text('especie', 'Nom de la nova espècie', ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label(null, 'Descripció') !!}
            {!! Form::textarea('	descripcio', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label(null, 'Espècie') !!}
            {!! Form::text('especie', 'Nom de la nova espècie', ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label(null, 'Espècie') !!}
            {!! Form::text('especie', 'Nom de la nova espècie', ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label(null, 'Data inici sembra') !!}
            {!! Form::date('sembra_inici', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label(null, 'Data fi sembra') !!}
            {!! Form::date('sembra_fi', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label(null, 'Data inici planta') !!}
            {!! Form::date('planta_inici', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label(null, 'Data fi planta') !!}
            {!! Form::date('planta_fi', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label(null, 'Data inici recollida') !!}
            {!! Form::date('fruta_inici', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label(null, 'Data fi recollida') !!}
            {!! Form::date('fruta_fi', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::checkbox('cientific', 'És un nom científic') !!}
          </div>
          <div class="form-group">
            {!! Form::checkbox('temporada', 'És vegetal de temporada') !!}
          </div>
          <div class="form-group">
            {!! Form::checkbox('ministeri', 'Informació extreta del ministèri') !!}
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox"> Nom científic
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox"> Check me out
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox"> Check me out
            </label>
          </div>

          {!! Form::submit('Click Me!', ['class' => 'btn btn-default']) !!}
          {!! Form::close() !!}


          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
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
            <button type="submit" class="btn btn-default">Submit</button>
          </form>


        </div>
      </div>
    </div>
  </div>
</div>



@endsection
