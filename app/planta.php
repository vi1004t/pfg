<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class planta extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'plantes';

	public function sinonims(){

		//return $this->belongsTo('App\SinonimiaPlanta', 'id', 'planta_id');
		return $this->hasMany('App\SinonimiesPlanta');

	}
	static public function listar()
	{
		$results = planta::select('id', 'especie')->get();
		foreach ($results as $item) {
			$llistat[$item->id] = $item->especie;
		}
		return $llistat;
		//dd($result->toArray());
	}

}
