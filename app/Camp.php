<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Camp extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'camps';

	protected $fillable = ['nom', 'descripcio', 'poble', 'visibilitat_id', 'user_profile_id', 'ubicacio'];

	public function visibilitats()
	{
			return $this->belongsTo('App\Visibilitat', 'visibilitat_id', 'id');
	}
	static public function perfilId($id){
		$result = Camp::select('user_profile_id')->where('id', '=', $id)->get();
		if(!is_null($result)){
			return $result->toArray()[0]['user_profile_id'];
		}
	}
	static public function campsUsuari($id)
	{
		$results = Camp::select('id', 'nom', 'descripcio', 'poble')->where('user_profile_id', '=', $id)->get();

		if(!is_null($results)){
			foreach ($results as $item) {
				$llistat[] = ['id' => $item->id, 'nom' => $item->nom, 'descripcio' => $item->descripcio, 'poble' => $item->poble];
			}
				return $llistat;
			}
	}
	static public function infoCamp($id)
	{
		$results = Camp::select('id', 'nom', 'descripcio', 'poble', 'ubicacio')->where('id', '=', $id)->first();
		if(!is_null($results)){
			$camp = ['id' => $results->id, 'nom' => $results->nom, 'descripcio' => $results->descripcio, 'poble' => $results->poble, 'ubicacio' => $results->ubicacio];
			return $camp;
		}
	}

}
