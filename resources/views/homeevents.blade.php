Events

@if ($dades > 0)
  <div class="row">
    <div class="col-sm-2 col-md-2">Cultiu</div>
    <div class="col-sm-2 col-md-2">Camp</div>
    <div class="col-sm-2 col-md-2">Tipus</div>
    <div class="col-sm-7 col-md-4">Descripcio</div>
    <div class="col-sm-2 col-md-2">Data</div>
  </div>
  @foreach ($dades as $item)
  <div class="row">
    <div class="col-sm-2 col-md-2"><a href="/home/cultiu/{{$item['cultiu_id']}}">{{$item['cultiu_nom']}}</a></div>
    <div class="col-sm-2 col-md-2"><a href="/home/camp/{{$item['bancal_id']}}">{{$item['bancal_nom']}}</a></div>
    <div class="col-sm-2 col-md-2">{{$item['headline']}}</div>
    <div class="col-sm-7 col-md-4">{{$item['text']}}</div>
    <div class="col-sm-2 col-md-2">{{$item['startDate']}}</div>

  </div>

  @endforeach
@else
    <p>Encara no tens events al cultiu</p>
@endif
