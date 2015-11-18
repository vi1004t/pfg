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
				->orderBy('especie', 'ASC')
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
		$nom = new PlantesNom();
		$nom->nom = $request->nom_del_cultiu;
		$nom->user_profile_id = UserProfile::perfilId(Auth::user()->id);
		$nom->contador = 1;
		$nom->planta_id = $planta->id;
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
				->orderBy('especie', 'ASC')
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

}
