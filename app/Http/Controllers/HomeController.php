<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserProfile;
use App\Camp;
use App\Cultiu;
use App\Event;
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
			$info = UserProfile::informacioPersonal(Auth::user()->id);
			$numCamps = Camp::contaCampsUsuari(UserProfile::perfilId(Auth::user()->id));
			$camps = Camp::idCampsUsuari(UserProfile::perfilId(Auth::user()->id));
			foreach ($camps as $item){
				$resultatcultius[] = Cultiu::idCultiusCamp($item['id']);
			}
			$numCultius=(count($resultatcultius, COUNT_RECURSIVE) - count($resultatcultius))/4;
			//foreach ($resultatcultius as $in_ar) {$res+=getArrCount($in_ar, 1);}
			$info['numCamps'] = $numCamps;
			$info['numCultius'] = $numCultius;
			$dades = ['llistat' => $llistat, 'info' => $info];
			//dd($dades);
			return view('homellistat')->with('dades', $dades);
		}


		static function dibuixarMapa(){
			return view('mapa')->with('mapa', GoogleMapsController::dibuixarMapa(UserProfile::perfilId(Auth::user()->id), 0));
		}

		public function actualitzarEvents(){
			$camps = Camp::idCampsUsuari(UserProfile::perfilId(Auth::user()->id));
			if(!is_null($camps)){
				foreach ($camps as $item){
					$resultatcultius[] = Cultiu::idCultiusCamp($item['id']);
				}
				foreach ($resultatcultius as $cultiuscamp){
					if(isset($cultiuscamp)){
						if(!is_null($cultiuscamp)){
							foreach ($cultiuscamp as $item){
								if(isset($item)){
									if(!is_null($item)){
										$cultius[] = $item;
									}
								}
							}
						}
					}
				}
			}
			//dd($cultius);
				if(!is_null($cultius)){
					$events = Event::eventsUsuari($cultius);
				}
//dd($events);
				foreach ($events as $event){
					//dd($event['cultiu_id']);
					//$event->cultiu_id =
					//obtindre el registre del cultiu_id actual
					$key1 = array_search($event['id'], array_column($events, 'id')); //array multidimensional
					//obtindre el registre dins de $cultius on està el cultiu_id actual
					$key2 = array_search($event['cultiu_id'], array_column($cultius, 'id')); //array multidimensional
					//obtindre el registre dins de "camps del camp_id actual
					//$key3 = $cultius[$key2]['camp_id'];
					//dd($cultius[$key2]['camp_id']);
					$key3 = array_search($cultius[$key2]['camp_id'], array_column($camps, 'id')); //array multidimensional
					//dd($key3);
					//modificar a $events el id del cultiu pel nom del cultiu
					$events[$key1]['cultiu_nom'] = $cultius[$key2]['nom'];
					$events[$key1]['bancal_nom'] = $camps[$key3]['nom'];
					$events[$key1]['bancal_id'] = $camps[$key3]['id'];
					//$key = array_search($event['cultiu_id'], $cultius); //array unidimensional
					//dd($events[$key1]);
				}
			//dd($events);
			return view('homeevents')->with('dades', $events);
		}
}
