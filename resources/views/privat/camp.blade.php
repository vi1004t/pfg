@extends('privat.mapa')

@section('menuglobal')
  <li><a href="../">Casa</a></li>
  <li><a href="{{ $dades['id'] }}/cultiu/create" data-src="{{ $dades['id'] }}/cultiu/create" data-toggle="modal" data-target="#flotant">Crear cultiu</a></li>
  <li><a href="/">Editar</a></li>
  @parent
@stop
@section('esquerra')
<!-- Informació del camp -->
<table id='infocamp'>
  <tr>
    <td>
      <p>Nom: </p>
    </td>
    <td>
      <p>Benovaire </p>
    </td>
  </tr>
  <tr>
    <td>
      <p>Data de creació: </p>
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
