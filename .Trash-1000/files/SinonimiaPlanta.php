<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SinonimiaPlante extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sinonimies_plantes';

	public function foo()
   {
      return $this->hasMany('App\plante');
   }
}
