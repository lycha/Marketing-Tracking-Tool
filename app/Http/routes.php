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

Route::get('/', 'DashboardController@index');
//Route::get('/national', 'DashboardController@index');
Route::get('/{lc}/{program}/update-analysis', 'DashboardController@updateAnalysis')
	->where(['lc' => '^(total)|(national)|(bialystok)|(gdansk)|(katowice)|(kielce)|(krakow)|(lublin)|(lodz)|(olsztyn)|(poznan)|(rzeszow)|(szczecin)|(torun)|(warszawasgh)|(warszawauw)|(wroclawue)|(wroclawut)',
			 'program' => '^(gt)|(gc)|(gh)|(fl)|(au)']);
//Route::get('/national/update-analysis', 'DashboardController@updateAnalysis');
Route::get('/{lc}/{program}', 'DashboardController@index')
	->where(['lc' => '^(total)|(national)|(bialystok)|(gdansk)|(katowice)|(kielce)|(krakow)|(lublin)|(lodz)|(olsztyn)|(poznan)|(rzeszow)|(szczecin)|(torun)|(warszawasgh)|(warszawauw)|(wroclawue)|(wroclawut)',
			 'program' => '^(gt)|(gc)|(gh)|(fl)|(au)']);

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
