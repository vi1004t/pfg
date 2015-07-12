<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Visibilitat;
use Illuminate\Support\Facades\Request;

class VisibilitatController extends Controller {

  public function listar()
  {
    $result = Visibilitat::select('id', 'nom')->get();
    $result = Visibilitat::l();
    dd($result->toArray());
  }

}
