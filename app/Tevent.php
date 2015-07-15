<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tevent extends Model {

	//


	static public function listar()
	{
		$results = Tevent::select('id', 'nom')->get();
		if(!is_null($results)){
			foreach ($results as $item) {
				$llistat[$item->id] = $item->nom;
			}
			return $llistat;
		}
	}

}
