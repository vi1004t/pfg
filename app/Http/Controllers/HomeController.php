<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserProfile;
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
		$ubicacio = UserProfile::poblacio(UserProfile::perfilId(Auth::user()->id));
		//dd(UserProfile::poblacio(UserProfile::perfilId(Auth::user()->id)));
		$dades = ['ubicacio' => $ubicacio];
		//dd($poblacio->toArray()[0]['poblacio']);
		return view('home', ['dades' => $dades]);
	}

}
