<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cultiu extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cultius';

		protected $fillable = ['headline', 'text', 'startDate', 'visibilitat_id', 'camp_id', 'planta_id'];

	public function events(){

		//return $this->belongsTo('App\SinonimiaPlanta', 'id', 'planta_id');
		return $this->hasMany('App\Event');

	}
	public function visibilitats()
	{
			return $this->belongsTo('App\Visibilitat', 'visibilitat_id', 'id');
	}

}
