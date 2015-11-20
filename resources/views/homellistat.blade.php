<div class="row">
  <div class="col-sm-3 col-md-3"><img src='/imatges/perfils/image.jpg' width='150' height='150' title='Aci va la foto' class="img-responsive"> </div>
  <div class="col-sm-9 col-md-9">
    <div class="row">
      <div class="col-sm-4 col-md-4">Nicka: </div>
      <div class="col-sm-8 col-md-8">{{$dades['info']['nick']}}</div>
      <div class="col-sm-4 col-md-4">Nom i Cognoms: </div>
      <div class="col-sm-8 col-md-8">{{$dades['info']['nom']}} {{$dades['info']['cognoms']}}</div>
      <div class="col-sm-4 col-md-4">Data naiximent: </div>
      <div class="col-sm-8 col-md-8">{{$dades['info']['naiximent']}}</div>
      <div class="col-sm-4 col-md-4">Població: </div>
      <div class="col-sm-8 col-md-8">{{$dades['info']['poblacio']}}</div>
      <div class="col-sm-4 col-md-4">Terrenys: </div>
      <div class="col-sm-8 col-md-8">{{$dades['info']['numCamps']}}</div>
      <div class="col-sm-4 col-md-4">Cultius: </div>
      <div class="col-sm-8 col-md-8">{{$dades['info']['numCultius']}}</div>
    </div>
  </div>

</div>

<div class="btn btn-default" onclick="divLogin('llistat_ocult')">
  Els meus camps
</div>
<div id="llistat_ocult" >

@if ($dades['llistat'] > 0)
  <div class="row">
    <div class="col-sm-4 col-md-4">Nom</div>
    <div class="col-sm-5 col-md-5">Descrpició</div>
    <div class="col-sm-3 col-md-3">Població</div>
  </div>
  @foreach ($dades['llistat'] as $item)
      {!! $item !!}
  @endforeach
@else
    <p>Encara no tens cap camp</p>
@endif
</div>
