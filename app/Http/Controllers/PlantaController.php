<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CrearPlantaRequest;
use App\Http\Controllers\Controller;
use App\planta;
use App\PlantesNom;
use App\UserProfile;
use Auth;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;

class PlantaController extends Controller {

	public function __construct()
	{
		$this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$result = planta::With('noms')
				//->orderBy('especie', 'ASC')
				->get();
		dd($result->toArray());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('crear.plantes');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CrearPlantaRequest $request)
	{
		$planta = new planta($request->all());
		$planta->creador_id = UserProfile::perfilId(Auth::user()->id);
		//strtotime passa un string a date, si els valors del string estan separats per - ho agarra com dd-mm-aaaa, si estan
		//separats per / ho agarra com aaaa/mm/dd. Afegixc al final el any com a valor fixe per a que es puga convertir correctament
		if($request->sembra_inici != "") $planta->sembra_inici = date('Y-m-d',(strtotime($request->sembra_inici.'-2000')));
		if($request->sembra_fi != "") $planta->sembra_fi = date('Y-m-d',(strtotime($request->sembra_fi.'-2000')));
		if($request->planta_inici != "") $planta->planta_inici = date('Y-m-d',(strtotime($request->planta_inici.'-2000')));
		if($request->planta_fi != "") $planta->planta_fi = date('Y-m-d',(strtotime($request->planta_fi.'-2000')));
		if($request->fruta_inici != "") $planta->fruta_inici = date('Y-m-d',(strtotime($request->fruta_inici.'-2000')));
		if($request->fruta_fi != "") $planta->fruta_fi = date('Y-m-d',(strtotime($request->fruta_fi.'-2000')));
		$nom = new PlantesNom();
		$nom->nom = $request->nom_del_cultiu;
		$nom->user_profile_id = UserProfile::perfilId(Auth::user()->id);
		$nom->contador = 1;
		//dd($planta);
		$planta->save();
		$nom->planta_id = $planta->id;
		$nom->save();





	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$result = planta::With('noms')
				->where('id', '=', $id)
		//		->orderBy('especie', 'ASC')
				->get();
		dd($result->toArray());
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

		public function afegirNom($planta)
		{
			$noms = PlantesNom::llistarNoms($planta);
			$dades = ['info' => $noms,
								'id' => $planta];
			if(!is_null($dades)) return view('crear.nomPlantes')->with('dades', $dades);
		}

		public function guardarNom($planta, Request $request) //$planta el id de la planta i $request son les dades del formulari enviat
		{
			$nom = new PlantesNom();
			$nom->nom = $request->nom_del_cultiu;
			$nom->contador = 1;
			$nom->planta_id = $planta;
			$nom->user_profile_id = UserProfile::perfilId(Auth::user()->id);
			$nom->save();
		}
}
