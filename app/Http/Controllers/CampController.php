<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Camp;
use Illuminate\Http\Request;

class CampController extends Controller {

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
	public function create($user)
	{
		return view('crear.camp')->with('user', $user);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	//	dd($request->all());
		if(strlen($request->nom)){
			if(strlen($request->descripcio)){
				if(strlen($request->poble)){
					$camp = new Camp($request->all());
					$camp->save();
					return redirect('usuari/'.$camp->user_profile_id.'/camp/'.$camp->id.'/');
					}
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

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($user, $camp)
	{
		$ubicacio = Camp::select('poble')->where('id', '=', $camp)->get();
		//dd($ubicacio->toArray()[0]['poble']);
		return view('privat.camp')->with('name', $ubicacio->toArray()[0]['poble']);
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
