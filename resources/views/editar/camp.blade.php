<script>
$(function(){
    //per defecte amagar el div dels errors
    $("#errors").hide()
    $('#startDate').datetimepicker({
      format: 'YYYY/MM/DD',
      inline: true
    });
    $('#submit_button').click(function(e) {
      e.preventDefault();
      alert($('#form').serialize())
      $.ajax({type:'PUT',
        url: '/home/cultiu/' +  {!! $camp->id !!},
        data:$('#form').serialize(),
        success: function(response) {
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
    {!! Form::model($camp, ['action' => ['CampController@update', $camp->id], 'method' => 'PUT', 'id' => 'form']) !!}
    @include('parcials.camp')
    {!! Form::submit('Modifica', array('id' => 'submit_button')) !!}
    {!! Form::close() !!}

</div>			<!-- /modal-footer -->
