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
use Illuminate\Support\Facades\Redirect;

class CampController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('is_camp', ['only' => ['index', 'edit', 'show', 'actualitzarLlistat']]);
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
		$camp = new Camp;
		$ubicacio = UserProfile::poblacio(UserProfile::perfilId(Auth::user()->id));
		$dades = ['ubicacio' => $ubicacio, 'ubicacio_centre' => 'no_valor'];
		return view('crear.camp', ['dades' => $dades, 'camp' => $camp]);
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
			//dd($request->poligon);
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
		$dades = ['info' => $info,
							'id' => $camp];
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
		$camp = Camp::findOrFail($id);

		return view('editar.camp', compact('camp'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CrearCampRequest $request )
	{
		//dd($id);
		$camp = Camp::findOrFail($id);
		$camp->fill($request->all());
		$camp->save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		dd('fet!');
	}

	static public function llistarCultius($id, $historic = 0){
		$llistat = "";
		$cultius = Cultiu::cultiusCamp($id, $historic);
		if(!is_null($cultius)){
			foreach ($cultius as $item) {
				//$llistat[] = '<tr><td><a href="/home/cultiu/'.$item['id'].'">'.$item['nom'].'</a></td><td>'.$item['descripcio'].'</td></tr>';
				$llistat[] = '
				<div class="row">
					<div class="col-sm-3 col-md-3"><a href="/home/cultiu/'.$item['id'].'">'.$item['nom'].'</a></div>
					<div class="col-sm-6 col-md-6">'.$item['descripcio'].'</div>
					<div class="col-sm-3 col-md-3">'.$item['date'].'</div>
				</div>';
			}
		}
		return $llistat;
	}

	public function actualitzarLlistat($camp){
		$actius = CampController::llistarCultius($camp);
		$historic = CampController::llistarCultius($camp, 1);
		$llistat = ['actius' => $actius, 'historic' => $historic];
		return view('privat.campllistat')->with('dades', $llistat);
	}

	static function dibuixarMapa($camp){
		return view('mapa')->with('mapa', GoogleMapsController::dibuixarMapa($camp, 1));
	}

	public function actualitzarInfo($camp){
		$info = Camp::infoCamp($camp);
		return view('privat.campinfo')->with('info', $info);
	}

}
