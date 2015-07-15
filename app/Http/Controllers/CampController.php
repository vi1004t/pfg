<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CrearCampRequest;
use App\Http\Controllers\Controller;
use App\Camp;
use App\Cultiu;
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
		return view('crear.camp');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CrearCampRequest $request)
	{
	//	dd($request->all());
/**		if(strlen($request->nom)){
			if(strlen($request->descripcio)){
				if(strlen($request->poble)){ */
					$camp = new Camp($request->all());
					$camp->save();
					return redirect('perfil/'.$camp->user_profile_id.'/camp/'.$camp->id);
/**					}
				else{
					dd("El poble no pot estar buit");
				}
			}
			else{
				dd("LA descripcio no pot estar buit");
			}
		}
		else{
			dd("El nom no pot estar buit");
		}
*/
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
		$dades = ['ubicacio' => $info['poble'], 'info' => $info, 'id' => $camp, 'cultius' => $llistat];
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
