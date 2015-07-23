@if ($dades > 0)
  <div class="row">
    <div class="col-sm-4 col-md-4">Nom</div>
    <div class="col-sm-8 col-md-8">Descrpició</div>
  </div>
  @foreach ($dades as $item)
      {!! $item !!}
  @endforeach
@else
    <p>Encara no tens cultius en aquest camp</p>
@endif
