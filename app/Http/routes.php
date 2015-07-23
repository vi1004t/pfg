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

//Route::match(['get', 'post'], 'home/camp/{camp}', 'CampController@show');

Route::get('home/camp/{camp}/llista', 'CampController@actualitzarLlistat');

Route::get('home/camp/{camp}/mapa', 'CampController@dibuixarMapa');

Route::resource('home/camp', 'CampController');

Route::resource('home/event', 'EventController');

Route::get('home/cultiu/{cultiu}/reload', 'CultiuController@refrescarTimeline');

Route::get('home/cultiu/{cultiu}/timeline', 'CultiuController@timeline');

Route::resource('home/cultiu', 'CultiuController');

Route::get('home/llista', 'HomeController@actualitzarLlistat');

Route::get('home/mapa', 'HomeController@dibuixarMapa');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
