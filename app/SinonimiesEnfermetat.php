<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SinonimiesEnfermetat extends Model {

	/**
	* The database table used by the model.
	*
	* @var string
	*/
	protected $table = 'sinonimies_enfermetat';

	public function plantes()
	{
			return $this->belongsTo('App\Enfermetat', 'enfermetat_id', 'id');
	}

}
