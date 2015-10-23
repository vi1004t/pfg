@if($dades['editable'])
  {!! Form::select('tevent', App\Tevent::listar(), '', ['id' => 'tevent']) !!}
  {!! Html::linkAction('EventController@create', 'Crear', '' ,  array('class' => 'btn btn-success', 'data-toggle' => 'modal', 'data-target' => '#flotant')) !!}
@endif
@if (Session::has('message'))
<p class="alert alert-success">{{ Session::get('message')}}</p>
@endif
@if ($dades['events'] > 0)
  <div class="row">
    <div class="col-sm-2 col-md-2">Tipus</div>
    <div class="col-sm-7 col-md-7">Descripcio</div>
    <div class="col-sm-2 col-md-2">Data</div>
    <div class="col-sm-1 col-md-1"></div>
  </div>
  @foreach ($dades['events'] as $item)
  <div class="row">
    <div class="col-sm-2 col-md-2">{{$item['nom']}}</div>
    <div class="col-sm-7 col-md-7">{{$item['descripcio']}}</div>
    <div class="col-sm-2 col-md-2">{{$item['startDate']}}</div>
    @if($dades['editable'])
    <div class="col-sm-1 col-md-1">
      {!! Form::open(['route' => ['home.event.destroy', $item['id']], 'method' => 'DELETE', 'id' => $item['id']])!!}
      <button type="submit" class="btn btn-danger btn-xs" aria-label="Left Align" id="reload-llistat">
  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
</button>
      {!! Form::close() !!}

      <script>
        $(document).ready(function(){
            $('#' +{{$item['id']}}).submit(function(e){
              e.preventDefault();
                BootstrapDialog.confirm({
                    title: 'Eliminar',
                    message: 'Estàs segur?'
                    type: BootstrapDialog.TYPE_WARNING,
                    callback: function(result){
                    if(result) {
                        $.ajax({type:'DELETE',
                          url: $('#' +{{$item['id']}}).attr('action'),
                          data:$('#' +{{$item['id']}}).serialize(),
                          success: function(response) {
                            $('#llistat').load(window.location.pathname + '/llista');
                            },
                          error: function(jqXHR){

                          }
                        });
                    }
                }});
            });

        });
      </script>
    </div>
    @endif
  </div>

  @endforeach
@else
    <p>Encara no tens events al cultiu</p>
@endif
