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

}
