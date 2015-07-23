<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Formulari cultiu</title>
  <script type="text/javascript" src="/js/moment.js"></script>
  <link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css" />


<script src="/js/bootstrap-datetimepicker.min.js"></script>
</head>
<body>
<script>
$(function(){
    //per defecte amagar el div dels errors
    $("#errors").hide()
    $('#startDate').datetimepicker({
      format: 'YYYY/MM/DD',
      inline: true
    });
    $('#Registra').click(function(e){
      e.preventDefault();
      $.ajax({type:'POST',
        url: '/home/cultiu',
        data:$('#creaCultiu').serialize(),
        success: function(response) {
          $('#llistat').load(window.location.pathname + '/llista');
          $('#mapa').load(window.location.pathname + '/mapa', redibuixa);
          window.parent.closeModal();
          },
        error: function(jqXHR){
          if (jqXHR.status == 422)
          {
            //si hi ha error en el formulari, omplir div
            $("#lerrors").html('');
            $.each(jqXHR.responseJSON, function (key, value) {
                // your code here
                $("#lerrors").append("<li>" + key + ": " + value + "</li>")
            });
            //mostrar div
            $("#errors").hide().fadeIn('fast');
          }
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
      <div class="alert alert-danger" id="errors">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul id="lerrors">
        </ul>
      </div>
      <form id="creaCultiu" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="camp_id" value="{!! $array['camp'] !!}">
      <input type="hidden" name="user_profile_id" value="{!! $array['user'] !!}">

      <div align="center" class="form-group">
        {!! Form::label('calendari', 'Tria data d\'inici') !!}
            <div class='input-group date' id='startDate'>
                <input type='hidden' class="form-control" name='startDate'/>
            </div>
        </div>
      <div class="form-group">
        {!! Form::label('headline', 'Nom') !!}
        {!! Form::text('headline', null, ['class' => 'form-control', 'type'=>'text']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('text', 'Descripció') !!}
        {!! Form::text('text', null, ['class' => 'form-control', 'type'=>'email']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('planta_id', 'Espècie') !!}
        {!! Form::select('planta_id', App\planta::listar(), '', ['class' => 'form-control', 'type'=>'email']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('visibilitat_id', 'Tipus de visibilitat') !!}
        {!! Form::select('visibilitat_id', App\Visibilitat::listar(), '', ['class' => 'form-control', 'type'=>'email']) !!}
      </div>
      <button id="Registra" type="submit" class="btn btn-success">Registra</button>

      {!! Form::close() !!}
  </div>			<!-- /modal-footer -->
</body>
</html>
