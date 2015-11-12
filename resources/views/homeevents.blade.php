Events

@if ($dades > 0)
  <div class="row">
    <div class="col-sm-2 col-md-2">Cultiu</div>
    <div class="col-sm-2 col-md-2">Tipus</div>
    <div class="col-sm-7 col-md-5">Descripcio</div>
    <div class="col-sm-2 col-md-2">Data</div>
    <div class="col-sm-1 col-md-1"></div>
  </div>
  @foreach ($dades as $item)
  <div class="row">
    <div class="col-sm-2 col-md-2">{{$item['cultiu_id']}}</div>
    <div class="col-sm-2 col-md-2">{{$item['headline']}}</div>
    <div class="col-sm-7 col-md-5">{{$item['text']}}</div>
    <div class="col-sm-2 col-md-2">{{$item['startDate']}}</div>
  </div>

  @endforeach
@else
    <p>Encara no tens events al cultiu</p>
@endif
