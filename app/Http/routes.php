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

Route::get('/', 'IndexController@index');
Route::POST('/placement', 'IndexController@placement');

Route::get('/leagues/{league}/{division?}/{mode?}/{username?}', 'LeagueController@show');

Route::get('/api/leagues/{mode}', function($mode) {
	$leagues = App\League::where('mode', $mode)->get();

	return view('apihtml.leagues', ['leagues' => $leagues]);
});