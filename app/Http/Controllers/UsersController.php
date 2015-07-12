<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
//use Illuminate\Support\Facades\Request;

use Illuminate\Http\Request;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $fillable = ['nick', 'email'];

	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('crear.user');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	//	dd($request->all());
		if(strlen($request->nick)){
			if(strlen($request->email)){
				if(strlen($request->password)){
					if(strlen($request->password2)){
						if($request->password == $request->password2){
							$password = \Hash::make($request->password);
							$user = new User($request->all());
							$user->password = $password;
							$user->acces = 1; 															//usuari normal
							$user->save();
							dd($password);
						}
						else{
							dd("El password i la seva confirmació no coincidixen");
						}
					}
					else{
						dd("La confirmació del password no pot estar buit");
					}

				}
				else{
					dd("El password no pot estar buit");
				}
			}
			else{
				dd("El correu no pot estar buit");
			}
		}
		else{
			dd("El nick no pot estar buit");
		}

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
