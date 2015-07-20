<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CrearCampRequest;
use App\Http\Controllers\Controller;
use App\Camp;
use App\Cultiu;
use App\UserProfile;
use Illuminate\Http\Request;
use Auth;
use DB;

class CampController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('is_camp', ['only' => ['index', 'edit', 'show']]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($user)
	{
		$result = Camp::where('user_profile_id', '=', $user)->get();
		dd($result->toArray());
	//	return view('privat.camp')->with('name', 'Quatretonda');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$ubicacio = UserProfile::poblacio(UserProfile::perfilId(Auth::user()->id));
		$dades = ['ubicacio' => $ubicacio, 'ubicacio_centre' => 'no_valor'];
		return view('crear.camp', ['dades' => $dades]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CrearCampRequest $request)
	{

		$camp = new Camp($request->all());
		if(!($request->punts == "")){
			dd($request->poligon);
			$centre = GoogleMapsController::calcularCentrePoligon($request->punts);
			$arraycoords = GoogleMapsController::stringToArray($request->punts);
			//es forma el string per a insertar en mysql el linestring. Entre punt i
			//punt s'inserta una ',' excepte l'ultim punt (no es guarda si acaba en ',')
			$string = 'GeomFromText(\'LINESTRING(';
			for($i = 0; $i < count($arraycoords); $i++){
				$string = $string . $arraycoords[$i] . ' ';
				$i++;
				if(!($i < (count($arraycoords)-1))){
					$string = $string . $arraycoords[$i];
				}
				else{
					$string = $string . $arraycoords[$i] .',';
				}
			}

			$string = $string . ')\')';
			$camp->poligon = DB::raw($string);
			$camp->centre = DB::raw('PointFromText(\'POINT('.$centre[0].' '.$centre[1].')\')');
		}


		$camp->user_profile_id = UserProfile::perfilId(Auth::user()->id);
		$camp->save();
		return redirect('home/camp/'.$camp->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($camp)
	{
		$llistat = "";
		$centre = "";
		$info = Camp::infoCamp($camp);
		$ubicacio = Camp::coordenades($camp);
		if(!is_null($ubicacio['ubicacio'])){
			$coordenades[] = ['punts' => GoogleMapsController::formarPoligon($ubicacio['ubicacio']), 'color' => '#FF0000', 'info' => '<b>Hola</b><br><a href="http://www.google.es">link</a>'];
			$veins = Camp::campsVeins($camp);
			foreach ($veins as $vei) {
				$temp = Camp::coordenades($vei->id);
				$coordenades[] = ['punts' => GoogleMapsController::formarPoligon($temp['ubicacio']), 'color' => '#000000', 'info' => 'no_valor'];
			}
			//dd($coordenades);
			//$coordenades[] = GoogleMapsController::formarPoligon($ubicacio['ubicacio']);

			//dd($coordenades);
			/*$coordenades = GoogleMapsController::dibuixarCamp([$ubicacio['ubicacio']]);

			$coordenades = $coordenades . GoogleMapsController::eventOnClick("http://pfg.org/home/camp/17", "camp0");
			$veins = Camp::campsVeins($camp);
			foreach ($veins as $vei) {
				$temp = Camp::coordenades($vei->id);
				$poligon[] = $temp['ubicacio'];
			}
			$coordenades = $coordenades . GoogleMapsController::dibuixarCamp($poligon, '#000000');
			*/
			$ubicacio_centre['y'] = $ubicacio['centrey'];
			$ubicacio_centre['x'] = $ubicacio['centrex'];
		}
		else{
			$coordenades = null;
			$ubicacio_centre = 'no_valor';
		}

		$cultius = Cultiu::cultiusCamp($camp);
		if(!is_null($cultius)){
			$llistat = CampController::llistarCultius($cultius);
//dd($llistat);
		}
		$dades = ['ubicacio' => $info['poble'], 'ubicacio_centre' => $ubicacio_centre, 'info' => $info, 'id' => $camp, 'cultius' => $llistat, 'coordenades' => $coordenades];
		return view('privat.camp')->with('dades', $dades);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	private function llistarCultius($dades){
		foreach ($dades as $item) {
			//$llistat[] = '<tr><td><a href="/home/cultiu/'.$item['id'].'">'.$item['nom'].'</a></td><td>'.$item['descripcio'].'</td></tr>';
			$llistat[] = '
			<div class="row">
				<div class="col-sm-4 col-md-4"><a href="/home/cultiu/'.$item['id'].'">'.$item['nom'].'</a></div>
				<div class="col-sm-8 col-md-8">'.$item['descripcio'].'</div>
			</div>';
		}
		return $llistat;
	}



}
