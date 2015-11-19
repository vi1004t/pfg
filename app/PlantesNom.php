<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantesNom extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'plantes_nom';

	public function plantes()
  {
			return $this->belongsTo('App\planta', 'planta_id', 'id');
  }

	static public function llistarNoms($id)
	{
		$results = PlantesNom::select('id', 'nom')->where('planta_id', '=', $id)->get()->toArray();
		//dd(count($results));
			if(count($results)>0){
				return $results;
			}
			else return null;

	}

}
