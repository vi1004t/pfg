<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Visibilitat extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'visibilitats';

  public function user_profiles(){

    //return $this->belongsTo('App\SinonimiaPlanta', 'id', 'planta_id');
    return $this->hasMany('App\UserProfile');

  }
  public function camps(){

		//return $this->belongsTo('App\SinonimiaPlanta', 'id', 'planta_id');
		return $this->hasMany('App\Camp');

	}
  public function cultius(){

		//return $this->belongsTo('App\SinonimiaPlanta', 'id', 'planta_id');
		return $this->hasMany('App\Cultiu');

	}

	static public function listar()
	{
		$results = Visibilitat::select('id', 'nom')->get();
		foreach ($results as $item) {
			$llistat[$item->id] = $item->nom;
		}
		return $llistat;
		//dd($result->toArray());
	}


}
