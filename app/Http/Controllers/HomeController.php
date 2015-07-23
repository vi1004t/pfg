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
		// $this->middleware('is_user');
		}
		/**
		* Show the application dashboard to the user.
		*
		* @return Response
		*/
		public function index()
		{
		return view('home');
		}

		static public function llistarCamps($id){
			$llistat = "";
				$camps = Camp::campsUsuari($id);
			if(!is_null($camps)){
				foreach ($camps as $item) {
					//$llistat[] = '<tr><td><a href="/home/cultiu/'.$item['id'].'">'.$item['nom'].'</a></td><td>'.$item['descripcio'].'</td></tr>';
					$llistat[] = '
					<div class="row">
						<div class="col-sm-4 col-md-4"><a href="/home/camp/'.$item['id'].'">'.$item['nom'].'</a></div>
						<div class="col-sm-5 col-md-5">'.$item['descripcio'].'</div>
						<div class="col-sm-3 col-md-3">'.$item['poble'].'</div>
					</div>';
				}
			}
			return $llistat;
		}

		public function actualitzarLlistat(){
			$llistat = HomeController::llistarCamps(UserProfile::perfilId(Auth::user()->id));
			//dd($llistat);
			return view('homellistat')->with('dades', $llistat);
		}


		static function dibuixarMapa(){
			return view('mapa')->with('mapa', GoogleMapsController::dibuixarMapa(UserProfile::perfilId(Auth::user()->id), 0));
		}
}
