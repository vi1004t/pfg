<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CrearEventRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cultiu;
use App\Event;
//use Illuminate\Support\Facades\Request;
use Carbon\Carbon;



class EventController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($array)
	{
		//$array = ['user' => $user, 'camp' => $camp, 'cultiu' => $cultiu ];
		return view('crear.event')->with('array', $array);
	}
	public function crear(Request $request)
	{
		dd("hola");
		return view('crear.event')->with('array', $request);
	}
	public function postcrear(Request $request)
	{
		//dd("hola");
		$array = $request->only('user', 'camp', 'cultiu', 'tevent');
		//dd('perfil/'.$array['user'].'/camp/'.$array['camp'].'/cultiu/'.$array['cultiu'].'/event/crear');
		return redirect('perfil/'.$array['user'].'/camp/'.$array['camp'].'/cultiu/'.$array['cultiu'].'/event/crear');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CrearEventRequest $request)
	{
		$event = new Event($request->all());
		$event->save();
		return redirect('perfil/'.$request->user_id.'/camp/'.$request->camp_id.'/cultiu/'.$event->cultiu_id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
