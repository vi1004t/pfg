<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Remote file for Bootstrap Modal</title>
</head>
<body>
<script>
$(function(){
    $('#Registra').click(function(e){
      e.preventDefault();
      alert($('#headline').val());
      $.ajax({type:'POST', url: '/home/cultiu', data:$('#creaCultiu').serialize(), success: function(response) {
        window.parent.closeModal();
    },
    error: function(){
                  alert('Revisa els camps');
            }

    });
    });
});
</script>
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h4 class="modal-title">Crear nou cultiu</h4>
  </div>			<!-- /modal-header -->
  <div class="modal-body">
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


      <form id="creaCultiu" method="post">
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
      {!! Form::submit('Registra',array('class' => 'btn btn-success'))  !!}
      <button id="Registra" type="submit">Registra</button>

      {!! Form::close() !!}
  </div>			<!-- /modal-footer -->
</body>
</html>
