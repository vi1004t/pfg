<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Formulari event</title>
  <script type="text/javascript" src="/js/moment.js"></script>
  <link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css" />


<script src="/js/bootstrap-datetimepicker.min.js"></script>
<style>
#calendari1, #calendari2 {
    width: 50%;
    float: left;
}
</style>
</head>
<body>
<script>
$(function(){
    //per defecte amagar el div dels errors
    $('#cultiu_id').val($('#cultiu').val());
    $('#tevent_id').val($('#tevent').val());
    $('#headline').val($('#tevent option:selected').text());

    //alert($('#tevent option:selected').text());
    $("#errors").hide()
    $('#startDate').datetimepicker({
      format: 'YYYY/MM/DD',
      inline: true
    });
    $('#endDate').datetimepicker({
      format: 'YYYY/MM/DD',
      inline: true
    });
    $('#startDate').data("DateTimePicker").minDate($('#dataCreacio').val());
    $('#endDate').data("DateTimePicker").minDate($('#dataCreacio').val());
    $("#startDate").on("dp.change", function (e) {
            $('#endDate').data("DateTimePicker").minDate(e.date);
        });
    $('#Registra').click(function(e){

      e.preventDefault();
      $.ajax({type:'POST',
        url: '/home/event',
        data:$('#creaEvent').serialize(),
        success: function(response) {
          $('#reload').load(window.location.pathname + '/reload');
          $('#llistat').load(window.location.pathname + '/llista');
          window.parent.closeModal();
          },
        error: function(jqXHR){
          //alert($('#creaEvent').serialize());
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
       <h4 class="modal-title">Crear nou Event</h4>
  </div>			<!-- /modal-header -->
  <div class="modal-body">
      <div class="alert alert-danger" id="errors">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul id="lerrors">
        </ul>
      </div>
      <form id="creaEvent" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="cultiu_id" id="cultiu_id" value="">
      <input type="hidden" name="tevent_id" id="tevent_id"value="">
      <input type="hidden" name="headline" id="headline"value="">

      <div align="center" class="form-group" id="calendari1">
        {!! Form::label('calendari', 'Tria data d\'inici') !!}
            <div class='input-group date' id='startDate'>
                <input type='hidden' class="form-control" name='startDate'/>
            </div>
      </div>
      <div align="center" class="form-group" id="calendari2">
            {!! Form::label('calendari', 'Tria data de fi') !!}
            <div class='input-group date' id='endDate'>
                <input type='hidden' class="form-control" name='endDate'/>
            </div>
        </div>
      <div class="form-group">
        {!! Form::label('text', 'Descripció') !!}
        {!! Form::text('text', null, ['class' => 'form-control', 'type'=>'email']) !!}
      </div>
      <button id="Registra" type="submit" class="btn btn-success">Registra</button>

      {!! Form::close() !!}
  </div>			<!-- /modal-footer -->
</body>
</html>
