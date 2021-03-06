@extends('app')
@section('head')
@parent

<script type="text/javascript" src="/js/moment.js"></script>
<script type="text/javascript" src="/js/moment/locale/ca.js"></script>
<link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css" />


<script src="/js/bootstrap-datetimepicker.min.js"></script>
@stop
@section('mapa')
<script type="text/javascript">
		$(function () {
				$('#iniciSembra').datetimepicker({
					format: 'DD-MM',
					locale: 'ca'
				});
				$("#iniciSembra").on("dp.change", function (e) {
								$('#fiSembra').data("DateTimePicker").minDate(e.date);
						});
				$('#fiSembra').datetimepicker({
					format: 'DD-MM',
					locale: 'ca'
				});
				$('#iniciPlanta').datetimepicker({
					format: 'DD-MM',
					locale: 'ca'
				});
				$("#iniciPlanta").on("dp.change", function (e) {
								$('#fiPlanta').data("DateTimePicker").minDate(e.date);
						});
				$('#fiPlanta').datetimepicker({
					format: 'DD-MM',
					locale: 'ca'
				});
				$('#iniciCollita').datetimepicker({
					format: 'DD-MM',
					locale: 'ca'
				});
				$("#iniciCollita").on("dp.change", function (e) {
								$('#fiCollita').data("DateTimePicker").minDate(e.date);
						});
				$('#fiCollita').datetimepicker({
					format: 'DD-MM',
					locale: 'ca'
				});
		});
</script>
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

          {!! Form::open(['action' => 'PlantaController@store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

          <div class="form-group">
            {!! Form::label(null, 'Nom popular del cultiu') !!}
            {!! Form::text('nom_del_cultiu', 'Nom del nou cultiu', ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('descripcio', 'Descripció') !!}
            {!! Form::textarea('descripcio', 'Breu descripció del cultiu', ['class' => 'form-control', 'size' => '50x3']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('cientific', 'Espècie (nom científic)') !!}
            {!! Form::text('cientific', 'Nom científic del cultiu', ['class' => 'form-control']) !!}
          </div>
					<div class="form-group">
						<div class="col-sm-4 col-md-4">
	            {!! Form::label(null, 'Dates per a sembrar') !!}<br>
	            Inici: {!! Form::date('sembra_inici', null, ['class' => 'form-control', 'id' => 'iniciSembra']) !!}
							Fi: {!! Form::date('sembra_fi', null, ['class' => 'form-control', 'id' => 'fiSembra']) !!}
	          </div>
	          <div class="col-sm-4 col-md-4">
	            {!! Form::label(null, 'Dates per a plantar') !!}<br>
	            Inici: {!! Form::date('planta_inici', null, ['class' => 'form-control', 'id' => 'iniciPlanta']) !!}
							Fi: {!! Form::date('planta_fi', null, ['class' => 'form-control', 'id' => 'fiPlanta']) !!}
	          </div>
	          <div class="col-sm-4 col-md-4">
	            {!! Form::label(null, 'Dates de collita') !!}<br>
	            Inici: {!! Form::date('fruta_inici', null, ['class' => 'form-control', 'id' => 'iniciCollita']) !!}
							Fi: {!! Form::date('fruta_fi', null, ['class' => 'form-control', 'id' => 'fiCollita']) !!}
	          </div>
					</div>
          <div class="form-group">
						{!! Form::checkbox('temporada') !!}
						És cultiu de temporada
          </div>
					<div class="form-group">
						{!! Form::checkbox('ministeri') !!}
						Informació extreta del ministeri
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
