<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'events';

	public function cultius()
  {
			return $this->belongsTo('App\Cultiu', 'cultiu_id', 'id');
  }


}
