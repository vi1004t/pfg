<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class cultiu extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cultius';

	public function events(){

		//return $this->belongsTo('App\SinonimiaPlanta', 'id', 'planta_id');
		return $this->hasMany('App\Event');

	}


}
