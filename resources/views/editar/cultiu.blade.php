<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Formulari cultiu</title>
</head>
<body>
<script>
$(function(){
    //per defecte amagar el div dels errors
    $("#errors").hide()
    $('#Registra').click(function(e){
      e.preventDefault();
      $.ajax({type:'POST',
        url: '/home/cultiu/' + {{$cultiu->id}},
        data:$('#editaCultiu').serialize(),
        success: function(response) {
          $('#info').load(window.location.pathname + '/info');
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
       <h4 class="modal-title">Modifica dades</h4>
  </div>			<!-- /modal-header -->
  <div class="modal-body">
      <div class="alert alert-danger" id="errors">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul id="lerrors">
        </ul>
      </div>
      <form id="editaCultiu" method="post">
        <input type="hidden" name="_method" value="PUT">
        @include('parcials.cultiu')
      <button id="Registra" type="submit" class="btn btn-success">Modifica</button>

      {!! Form::close() !!}
  </div>			<!-- /modal-footer -->
</body>
</html>
