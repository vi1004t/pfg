<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\GoogleMapsController;
use DB;

class Camp extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'camps';

	protected $fillable = ['nom', 'descripcio', 'poble', 'visibilitat_id', 'user_profile_id', 'poligon'];

	public function visibilitats()
	{
			return $this->belongsTo('App\Visibilitat', 'visibilitat_id', 'id');
	}

	/*
	*
	* Retorna l'id del perfil de l'amo del camp
	*
	*/
	static public function perfilId($id){
		$result = Camp::select('user_profile_id')->where('id', '=', $id)->get();
		if(!is_null($result)){
			return $result->toArray()[0]['user_profile_id'];
		}
	}

	/*
	*
	* Retorna informació dels camps de l'usuari
	*
	*/
	static public function campsUsuari($id)
	{
		$results = Camp::select('id', 'nom', 'descripcio', 'poble')->where('user_profile_id', '=', $id)->get();
		//dd($results->toArray());
		if(!$results->isEmpty()){
/*			foreach ($results as $item) {
				$llistat[] = ['id' => $item->id,
											'nom' => $item->nom,
											'descripcio' => $item->descripcio,
											'poble' => $item->poble];
			}*/
				return $results;
			}
	}

	static public function idCampsUsuari($id)
	{
		$results = Camp::select('id')->where('user_profile_id', '=', $id)->get();

		if(!$results->isEmpty()){
			foreach ($results as $item) {
				$llistat[] = $item->id;
			}
			//dd($llistat);
				return $llistat;
			}
	}

	/*
	*
	* Retorna informació del camp
	*
	*/
	static public function infoCamp($id)
	{
		$results = Camp::select('id', 'nom', 'descripcio', 'poble')->where('id', '=', $id)->first();
		if(!is_null($results)){
	/*		$camp = ['id' => $results->id,
							'nom' => $results->nom,
							'descripcio' => $results->descripcio,
							'poble' => $results->poble];*/
			return $results;
		}
	}

	static public function getNom($id){
		$result = Camp::select('nom')->where('id', '=', $id)->get();
		if(!is_null($result)){
			return $result->toArray()[0]['nom'];
		}
	}

	/*
	*
	* Retorna les dades d'ubicació del camp
	*
	*/
	static public function coordenades($id)
	{
		$results = Camp::select(DB::raw('AsText(poligon) as ubicacio'), DB::raw('X(centre) as centrex'), DB::raw('Y(centre) as centrey'))->where('id', '=', $id)->first();
		if(!is_null($results->ubicacio)){
			$coordenades = GoogleMapsController::linestringToArray($results->ubicacio);
			$dades = ['ubicacio' => $coordenades,
								'centrex' => $results->centrex,
								'centrey' => $results->centrey];
			return $dades;
		}
	}

	/*
	*
	* Retorna els id's dels camps veins (més prop de 1km)
	*
	*/
	static public function campsVeins($id, $distancia = 1)
	{
		$results = Camp::select(DB::raw('X(centre) as centrex'), DB::raw('Y(centre) as centrey'))->where('id', '=', $id)->first();
		if(!is_null($results)){
			$box = GoogleMapsController::getBoundaries($results->centrey, $results->centrex, 1);

			$dades = DB::select('select id, (6371 * ACOS(
											SIN(RADIANS(Y(centre)))
											* SIN(RADIANS(' . floatval($results->centrey) . '))
											+ COS(RADIANS(X(centre) - ' . floatval($results->centrex) . '))
											* COS(RADIANS(Y(centre)))
											* COS(RADIANS(' . floatval($results->centrey) . '))
											)
											) AS distance
											FROM camps

											WHERE (Y(centre) BETWEEN ' . $box['min_lat']. ' AND ' . $box['max_lat'] . ')
			AND (X(centre) BETWEEN ' . $box['min_lng']. ' AND ' . $box['max_lng']. ')
			HAVING distance < ' . $distancia . ' AND distance > 0
			ORDER BY distance ASC');
			return $dades;
		}
	}

	static private function getVisibilitat($id){
		$result = Camp::select('visibilitat_id')->where('id', '=', $id)->get();
		if(!is_null($result)){
			return $result->toArray()[0]['visibilitat_id'];
		}
	}

	static public function esVisible($id, $profileIdVisualitzador){
		if(Camp::perfilId($id)==$profileIdVisualitzador){
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


}
