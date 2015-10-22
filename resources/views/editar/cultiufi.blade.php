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
    $('#endDate').datetimepicker({
      format: 'YYYY/MM/DD',
      inline: true
    });
    $('#endDate').data("DateTimePicker").minDate('{{$cultiu->startDate}}');
    $('#Registra').click(function(e){
      e.preventDefault();
      $.ajax({type:'POST',
        url: '/home/cultiu/' + {{$cultiu->id}} + '/fi',
        data:$('#formu').serialize(),
        success: function(response) {
          $("#menuCrearEvents").hide()
          $('#info').load(window.location.pathname + '/info');
          $('#reload').load(window.location.pathname + '/reload');
          $('#llistat').load(window.location.pathname + '/llista');
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
      <form id="formu" method="post">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div align="center" class="form-group">
          {!! Form::label('calendari', 'Tria data de finalització') !!}
              <div class='input-group date' id='endDate'>
                  <input type='hidden' class="form-control" name='endDate'/>
              </div>
          </div>
      <button id="Registra" type="submit" class="btn btn-success">Registra</button>
      {!! Form::close() !!}
  </div>			<!-- /modal-footer -->
</body>
</html>
