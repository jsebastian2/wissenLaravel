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

Route::get('home', 'HomeController@index');

Route::controller('entidades', 'EntidadesController');
Route::controller('disciplinas', 'DisciplinasController');
Route::controller('usuarios', 'UsuariosController');
Route::controller('evaluaciones', 'EvaluacionesController');
Route::controller('examenes', 'ExamenesController');
Route::controller('eventos', 'EventosController');



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
