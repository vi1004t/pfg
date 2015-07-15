<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserProfile;
use App\Camp;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	//	$this->middleware('is_user');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		//return view('home');
		$llistat = "";
		$ubicacio = UserProfile::poblacio(UserProfile::perfilId(Auth::user()->id));
		$camps = Camp::campsUsuari(UserProfile::perfilId(Auth::user()->id));
		if(!is_null($camps)){
			foreach ($camps as $item) {
				//$llistat[] = '<tr><td><a href="/home/camp/'.$item['id'].'">'.$item['nom'].'</a></td><td>'.$item['descripcio'].'</td><td>'.$item['poble'].'</td></tr>';
				$llistat[] = '
				<div class="row">
			    <div class="col-sm-4 col-md-4"><a href="/home/camp/'.$item['id'].'">'.$item['nom'].'</a></div>
			    <div class="col-sm-5 col-md-5">'.$item['descripcio'].'</div>
					<div class="col-sm-3 col-md-3">'.$item['poble'].'</div>
			  </div>';
			}
		}
		//dd($llistat);
		//dd(UserProfile::poblacio(UserProfile::perfilId(Auth::user()->id)));
		$dades = ['ubicacio' => $ubicacio, 'camps' => $llistat];
		//dd($poblacio->toArray()[0]['poblacio']);
		return view('home', ['dades' => $dades]);
	}

}
