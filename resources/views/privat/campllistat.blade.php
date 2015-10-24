@if ($dades['actius'] > 0)
<span>Cultius actuals</span>
  <div class="row">
    <div class="col-sm-3 col-md-3">Nom</div>
    <div class="col-sm-6 col-md-6">Descrpició</div>
    <div class="col-sm-3 col-md-3">Data Inici</div>
  </div>
  @foreach ($dades['actius'] as $item)
      {!! $item !!}
  @endforeach
@else
    <p>Encara no tens cultius en aquest camp</p>
@endif

@if ($dades['historic'] > 0)
<br><span>Cultius anteriors</span>
  <div class="row">
    <div class="col-sm-3 col-md-3">Nom</div>
    <div class="col-sm-6 col-md-6">Descrpició</div>
    <div class="col-sm-3 col-md-3">Data Fi</div>
  </div>
  @foreach ($dades['historic'] as $item)
      {!! $item !!}
  @endforeach
@endif
