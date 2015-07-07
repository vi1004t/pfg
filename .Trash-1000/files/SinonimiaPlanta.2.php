<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SinonimiaPlanta extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sinonimies_plantes';

	public function plantes()
  {
			return $this->belongsTo('App\planta', 'planta_id', 'id');
  }



}
