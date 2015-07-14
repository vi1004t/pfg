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

Route::resource('perfil', 'UserProfileController');

Route::resource('home/camp', 'CampController');

Route::get('perfil/{user}/camp/{camp}/cultiu/{cultiu}/timeline', 'CultiuController@timeline');

Route::resource('perfil/{user}/camp/{camp}/cultiu', 'CultiuController');

Route::post('perfil/{user}/camp/{camp}/cultiu/{cultiu}/event/postcrear', 'EventController@postcrear');

Route::post('perfil/{user}/camp/{camp}/cultiu/{cultiu}/event/crear', 'EventController@crear');

Route::resource('perfil/{user}/camp/{camp}/cultiu/{cultiu}/event', 'EventController');

Route::resource('usuari', 'UsersController');




Route::get('galeria', function(){

	return App\planta::listar();
});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
