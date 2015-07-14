@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-headding">Crear nou usuari</div>
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
            {!! Form::open(['route' => 'usuari.store', 'method' => 'POST']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="user_id" value="{!! $array['user'] !!}">
            <input type="hidden" name="camp_id" value="{!! $array['camp'] !!}">
            <input type="hidden" name="cultiu_id" value="{!! $array['cultiu'] !!}">
            <input type="hidden" name="tevent_id" value="{!! $array['tevent'] !!}">
            <div class="form-group">
              {!! Form::label('headline', 'Nick') !!}
              {!! Form::text('headline', null, ['class' => 'form-control', 'type'=>'text']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('text', 'Nick') !!}
              {!! Form::text('text', null, ['class' => 'form-control', 'type'=>'text']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('startDate', 'Nick') !!}
              {!! Form::text('startDate', null, ['class' => 'form-control', 'type'=>'text']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('endDate', 'Nick') !!}
              {!! Form::text('endDate', null, ['class' => 'form-control', 'type'=>'text']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('assetmedia', 'Nick') !!}
              {!! Form::text('assetmedia', null, ['class' => 'form-control', 'type'=>'text']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('assetcredit', 'Nick') !!}
              {!! Form::text('assetcredit', null, ['class' => 'form-control', 'type'=>'text']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('assetcaption	', 'Nick') !!}
              {!! Form::text('assetcaption	', null, ['class' => 'form-control', 'type'=>'text']) !!}
            </div>

            {!! Form::submit('Registra') !!}

            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
