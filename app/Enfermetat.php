<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermetat extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'enfermetats';

	public function sinonims(){

		//return $this->belongsTo('App\SinonimiaPlanta', 'id', 'planta_id');
		return $this->hasMany('App\SinonimiesEnfermetat');

	}

}
