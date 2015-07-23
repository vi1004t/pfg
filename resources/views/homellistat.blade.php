@if ($dades > 0)
  <div class="row">
    <div class="col-sm-4 col-md-4">Nom</div>
    <div class="col-sm-5 col-md-5">Descrpició</div>
    <div class="col-sm-3 col-md-3">Població</div>
  </div>
  @foreach ($dades as $item)
      {!! $item !!}
  @endforeach
@else
    <p>Encara no tens cap camp</p>
@endif
