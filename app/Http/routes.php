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

Route::get('/', 'URLGeneratorController@index');
//Route::get('/national', 'DashboardController@index');
Route::get('/{lc}/{program}/update-analysis', 'DashboardController@updateAnalysis')
	->where(['lc' => '^(total)|(national)|(bialystok)|(gdansk)|(katowice)|(kielce)|(krakow)|(lublin)|(lodz)|(olsztyn)|(poznan)|(rzeszow)|(szczecin)|(torun)|(warszawasgh)|(warszawauw)|(wroclawue)|(wroclawut)',
			 'program' => '^(gt)|(gc)|(gh)|(fl)|(au)']);
//Route::get('/national/update-analysis', 'DashboardController@updateAnalysis');
Route::get('/{lc}/{program}', 'DashboardController@index')
	->where(['lc' => '^(total)|(national)|(bialystok)|(gdansk)|(katowice)|(kielce)|(krakow)|(lublin)|(lodz)|(olsztyn)|(poznan)|(rzeszow)|(szczecin)|(torun)|(warszawasgh)|(warszawauw)|(wroclawue)|(wroclawut)',
			 'program' => '^(gt)|(gc)|(gh)|(fl)|(au)']);

Route::get('/generate-url', 'URLGeneratorController@index');
Route::get('/generate-url/generate', 'URLGeneratorController@generate');

Route::get('/{lc}/{program}/generatexls', 'DashboardController@GenerateXls');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/query-log', 'DashboardController@log');

Route::get('/api/v1/save-lead', 'ApiController@saveLead');
Route::get('/api/v1/register-lead', 'ApiController@registerLead');
Route::get('/api/v1/register-new', 'ApiController@registerNew');
