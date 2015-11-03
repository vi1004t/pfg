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

		$result = Cultiu::select('user_profile_id')->where('id', '=', $id)->first();
		if(!is_null($result)){
			//dd($result->toArray());
			return $result->user_profile_id;
		}
	}

	static public function cultiusCamp($id, $endDate = 0)
	{
		//$llistat = null;
		if($endDate){
			$results = Cultiu::select('id', 'headline as nom', 'text as descripcio', 'endDate as date')->where('camp_id', '=', $id)->where('endDate', '<>', '')->get();
		}
		else{
			$results = Cultiu::select('id', 'headline as nom', 'text as descripcio', 'startDate as date')->where('camp_id', '=', $id)->where('endDate', '=', null)->get();
		}

		if(!is_null($results)){
			/*foreach ($results as $item) {
				$llistat[] = ['id' => $item->id,
											'nom' => $item->headline,
											'date' => $item->date,
											'descripcio' => $item->text];
			}*/
			return $results;
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
		$results = Cultiu::select('id', 'headline as nom', 'text as descripcio', 'camp_id', 'startDate', 'endDate')->where('id', '=', $id)->first();
		if(!is_null($results)){
			/*$cultiu = ['id' => $results->id,
								'nom' => $results->headline,
								'descripcio' => $results->text,
								'startDate' => $results->startDate,
								'camp_id' => $results->camp_id,
								'endDate' => $results->endDate
							];*/
			return $cultiu;
		}
	}

	static public function idCultiusCamp($id)
	{

		$results = Cultiu::select('id')->where('camp_id', '=', $id)->get()->toArray();

		if(!is_null($results)){
			foreach ($results as $item) {
				$llistat[] = $item['id'];
			}
			//dd($llistat);

			}
			if(isset($llistat)){
				if(!is_null($llistat)){
				return $llistat;
				}
			}
	}

	static private function getVisibilitat($id){
		$result = Cultiu::select('visibilitat_id')->where('id', '=', $id)->get();
		if(!is_null($result)){
			return $result->toArray()[0]['visibilitat_id'];
		}
	}

	static public function esVisible($id, $profileIdVisualitzador){
		if(Cultiu::perfilId($id)==$profileIdVisualitzador){
			return true;
		}
		else{
			switch (Camp::getVisibilitat($id)) {
				case 1://Tots
					return true;
					break;
				case 2://Ningú
					return false;
					break;
				case 3://Amics
					dd('no definit');
					break;
				default:
					return false;
					break;
			}
		}
	}

	static public function esEditable($id){
		$result = Cultiu::select('endDate')->where('id', '=', $id)->first();
		if($result->endDate || is_null($result)){
			return false;
		}
		else{
			return true;
		}
	}
}
