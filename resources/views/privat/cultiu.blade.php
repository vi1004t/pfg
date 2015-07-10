@extends('app')
@section('mapa')
  <body>
      <!-- BEGIN Timeline Embed -->
      <div id="timeline-embed"></div>
      <script type="text/javascript">
        var timeline_config = {
         width: "100%",
         height: "50%",
         source: 'example_json.json'
        }
      </script>
      <script type="text/javascript" src="/js/storyjs-embed.js"></script>
      <!-- END Timeline Embed-->
  </body>
@stop
@section('esquerra')
<!-- Informació del camp -->
<table id='infocamp'>
  <tr>
    <td>
      <p>Lloc de la fotografia </p>
    </td>
    <td>
      <p>Nom del cultiu </p>
    </td>
  </tr>
  <tr>
    <td>
      <p>Nom del bancal al que pertany </p>
    </td>
    <td>
      <p>15/05/2015 </p>
    </td>
  </tr>
  <tr>
    <td>
      <p>Visibilitat del camp: </p>
    </td>
    <td>
      <p>Amics </p>
    </td>
  </tr>
</table>


@stop
@section('dreta')
  @for ($i = 0; $i < 20; $i++)
    <li>The current value is {{ $i }}</li>
  @endfor
@stop
