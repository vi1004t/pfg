@if ($dades > 0)
  <div class="row">
    <div class="col-sm-10 col-md-10">Nom</div>
    <div class="col-sm-1 col-md-1">Editar</div>
    <div class="col-sm-1 col-md-1">Eliminar</div>
  </div>
  @foreach ($dades as $item)
      {!! $item !!}
  @endforeach
@else
    <p>Encara no tens events en aquest cultiu</p>
@endif
