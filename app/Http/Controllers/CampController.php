<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CrearCampRequest;
use App\Http\Controllers\Controller;
use App\Camp;
use App\Cultiu;
use App\UserProfile;
use Illuminate\Http\Request;
use Auth;

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
		$dades = ['ubicacio' => $ubicacio];
		return view('crear.camp', ['dades' => $dades]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CrearCampRequest $request)
	{
		//dd($request->all());

					$camp = new Camp($request->all());
					$camp->user_profile_id = UserProfile::perfilId(Auth::user()->id);
					//$camp->ubicacio =$request->ubicacio->toJson();
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
		$info = Camp::infoCamp($camp);
		if(!is_null($info['ubicacio'])){
			$coordenades = "
			<script>
			function dibuixa() {
				var triangleCoords = [";

			$temporal = explode(",", $info['ubicacio']);
			for($i = 0; $i < count($temporal); $i++){
				$coordenades = $coordenades . 'new google.maps.LatLng'. $temporal[$i] . ',' . $temporal[$i+1] . ',';
				$i++;
			}
			$coordenades = $coordenades . "];

					bermudaTriangle = new google.maps.Polygon({
						paths: triangleCoords,
						strokeColor: '#FF0000',
						strokeOpacity: 0.8,
						strokeWeight: 3,
						fillColor: '#FF0000',
						fillOpacity: 0.35
					});

					bermudaTriangle.setMap(map);

			}
			google.maps.event.addDomListener(window, 'load', dibuixa);
			</script>	";
		}
		else{
			$coordenades = "";
		}

		//dd($coordenades);
		$camps = Cultiu::cultiusCamp($camp);
		if(!is_null($camps)){
			foreach ($camps as $item) {
				//$llistat[] = '<tr><td><a href="/home/cultiu/'.$item['id'].'">'.$item['nom'].'</a></td><td>'.$item['descripcio'].'</td></tr>';
				$llistat[] = '
				<div class="row">
			    <div class="col-sm-4 col-md-4"><a href="/home/cultiu/'.$item['id'].'">'.$item['nom'].'</a></div>
			    <div class="col-sm-8 col-md-8">'.$item['descripcio'].'</div>
			  </div>';
			}
		}
		$dades = ['ubicacio' => $info['poble'], 'info' => $info, 'id' => $camp, 'cultius' => $llistat, 'coordenades' => $coordenades];
		//dd($ubicacio->toArray()[0]['poble']);
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

}
