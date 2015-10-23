<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
  {!! Form::label('headline', 'Nom') !!}
  {!! Form::text('headline', $cultiu->headline, ['class' => 'form-control', 'type'=>'text']) !!}
</div>
<div class="form-group">
  {!! Form::label('text', 'Descripció') !!}
  {!! Form::text('text', $cultiu->text, ['class' => 'form-control', 'type'=>'email']) !!}
</div>
<div class="form-group">
  {!! Form::label('planta_id', 'Espècie') !!}
  {!! Form::select('planta_id', App\planta::listar(), $cultiu->planta_id, ['class' => 'form-control', 'type'=>'email']) !!}
</div>
<div class="form-group">
  {!! Form::label('visibilitat_id', 'Tipus de visibilitat') !!}
  {!! Form::select('visibilitat_id', App\Visibilitat::listar(), $cultiu->visibilitat_id, ['class' => 'form-control', 'type'=>'email']) !!}
</div>
