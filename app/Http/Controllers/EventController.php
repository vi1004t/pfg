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

	public function __construct()
	{
		$this->middleware('auth');
//		$this->middleware('is_cultiu', ['only' => ['index', 'edit', 'show', 'finalitzar']]);
//		$this->middleware('is_camp_defined', ['only' => ['create']]);
		$this->middleware('is_event_editable', ['only' => ['destroy']]);
		//$this->middleware('is_cultiu_editable', ['only' => ['store']]);
	}

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
	public function create()
	{
		return view('crear.event');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CrearEventRequest $request)
	{
		//dd('hola')
		//echo json_encode($request);
		$event = new Event($request->all());
		$event->save();
		//return redirect('perfil/'.$request->user_id.'/camp/'.$request->camp_id.'/cultiu/'.$event->cultiu_id);
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
		$event = Event::findOrFail($id);
		return view(admin.users.edit, compact('event'));
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
		$event = Event::findOrFail($id);
		if ($event->headline != 'Inici') {
			$event->delete();
			\Session::flash('message', 'Event '. $event->headline .' eliminat');
		}
		else{
			\Session::flash('message', 'Aquest event no es pot eliminar');
		}

	}

	static public function llistarEvents($id){
		$llistat = "";
		$events = Event::eventsCultiu($id);
		if(!is_null($cultius)){
			foreach ($cultius as $item) {
				//$llistat[] = '<tr><td><a href="/home/cultiu/'.$item['id'].'">'.$item['nom'].'</a></td><td>'.$item['descripcio'].'</td></tr>';
				$llistat[] = '
				<div class="row">
					<div class="col-sm-4 col-md-4"><a href="/home/cultiu/'.$item['id'].'">'.$item['nom'].'</a></div>
					<div class="col-sm-8 col-md-8">'.$item['descripcio'].'</div>
				</div>';
			}
		}
		return $llistat;
	}

	public function actualitzarLlistat($camp){
		$llistat = CampController::llistarCultius($camp);
		return view('privat.campllistat')->with('dades', $llistat);
	}


}
