@extends('app')
@section('mapa')
@stop
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">

				<div class="panel-heading">Nou cultiu</div>
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
					@foreach ($dades['info'] as $item)
					<div class="row">
						<div class="col-sm-2 col-md-2">{{$item['nom']}}</div>

					</div>

					@endforeach
          {!! Form::open(['url' => '/plantes/'.$dades['id'].'/guardarnom', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

          <div class="form-group">
            {!! Form::label(null, 'Nom popular del cultiu') !!}
            {!! Form::text('nom_del_cultiu', 'Nom del nou cultiu', ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('cientific', 'Espècie (nom científic)') !!}
            {!! Form::text('cientific', 'Nom científic del cultiu', ['class' => 'form-control']) !!}
          </div>

          {!! Form::submit('Crea', ['class' => 'btn btn-default']) !!}
          {!! Form::close() !!}


  <!--        <form>
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
-->

        </div>
      </div>
    </div>
  </div>
</div>



@endsection
