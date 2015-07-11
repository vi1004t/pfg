<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::resource('plantes', 'PlantaController');

Route::resource('enfermetats', 'EnfermetatController');

Route::get('usuari', function(){

	return view('privat.usuari', ['name' => 'Beniganim']);
});

Route::get('camp', function(){

	return View::make('privat.camp')->with('name', 'Quatretonda');
});

Route::resource('cultiu', 'EventController');

Route::get('galeria', function(){

	return view('privat.galeria');
});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
