<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Camp extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'camps';

	protected $fillable = ['nom', 'descripcio', 'poble', 'visibilitat_id', 'user_profile_id'];

	public function visibilitats()
	{
			return $this->belongsTo('App\Visibilitat', 'visibilitat_id', 'id');
	}

}
