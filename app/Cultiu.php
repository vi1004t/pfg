<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cultiu extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cultius';

		protected $fillable = ['headline', 'text', 'startDate', 'visibilitat_id', 'camp_id', 'planta_id', 'user_profile_id'];

	public function events(){

		//return $this->belongsTo('App\SinonimiaPlanta', 'id', 'planta_id');
		return $this->hasMany('App\Event');

	}
	public function visibilitats()
	{
			return $this->belongsTo('App\Visibilitat', 'visibilitat_id', 'id');
	}
	static public function perfilId($id){
		$result = Cultiu::select('user_profile_id')->where('id', '=', $id)->get();
		if(!is_null($result)){
			return $result->toArray()[0]['user_profile_id'];
		}
	}
	static public function cultiusCamp($id)
	{
		$results = Cultiu::select('id', 'headline', 'text')->where('camp_id', '=', $id)->get();
		if(!is_null($results)){
			foreach ($results as $item) {
				$llistat[] = ['id' => $item->id, 'nom' => $item->headline, 'descripcio' => $item->text];
				return $llistat;
			}
		}
	}

	static public function campID($id){
		$result = Cultiu::select('camp_id')->where('id', '=', $id)->get();
		if(!is_null($results)){
			return $result->toArray()[0]['camp_id'];
		}
	}
	static public function infoCultiu($id)
	{
		$results = Cultiu::select('id', 'headline', 'text', 'camp_id')->where('id', '=', $id)->first();
		if(!is_null($results)){
			$cultiu = ['id' => $results->id, 'nom' => $results->headline, 'descripcio' => $results->text, 'camp_id' => $results->camp_id];
			return $cultiu;
		}
	}

}
