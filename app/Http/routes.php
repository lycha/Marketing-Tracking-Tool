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



Route::get('expa-leads', [
    'uses'        => 'ManageExpaLeadsController@index',
    'middleware'   => ['auth', 'acl'],
    'is'           => 'mc_member']);

Route::get('expa-leads/update', [
    'uses'        => 'ManageExpaLeadsController@updateLead',
    'middleware'   => ['auth', 'acl'],
    'is'           => 'mc_member']);

Route::get('expa-leads/add', [
    'uses'        => 'ManageExpaLeadsController@addLead',
    'middleware'   => ['auth', 'acl'],
    'is'           => 'mc_member']);

Route::get('expa-leads/delete', [
    'uses'        => 'ManageExpaLeadsController@deleteLead',
    'middleware'   => ['auth', 'acl'],
    'is'           => 'mc_member']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
////////////

Route::get('lcs', [
    'uses'        => 'ManageLCsController@index',
    'middleware'   => ['auth', 'acl'],
    'is'           => 'mc_member']);

Route::get('lcs/update', [
    'uses'        => 'ManageLCsController@updateLc',
    'middleware'   => ['auth', 'acl'],
    'is'           => 'mc_member']);

Route::get('lcs/add', [
    'uses'        => 'ManageLCsController@addLc',
    'middleware'   => ['auth', 'acl'],
    'is'           => 'mc_member']);

Route::get('lcs/delete', [
    'uses'        => 'ManageLCsController@deleteLc',
    'middleware'   => ['auth', 'acl'],
    'is'           => 'mc_member']);


Route::get('/query-log', 'DashboardController@log');

Route::get('/api/v1/save-lead', 'ApiController@saveLead');
Route::get('/api/v1/register-lead', 'ApiController@registerLead');
Route::get('/api/v1/register-new', 'ApiController@registerNew');
Route::get('/api/v1/get-expa-leads', 'ApiController@getExpaLeads');
Route::get('/api/v1/get-lcs', 'ApiController@getLCs');
Route::get('/api/v1/add-expa-lead', 'ApiController@addExpaLead');
Route::get('/api/v1/get-registered-leads', 'ApiController@getRegisteredLeads');

Route::get('/', 'URLGeneratorController@index');

Route::get('/generate-url', 'URLGeneratorController@index');
Route::get('/generate-url/generate', 'URLGeneratorController@generate');
//Route::get('/national', 'DashboardController@index');
Route::get('/{lc}/{program}/update-analysis', 'DashboardController@updateAnalysis');
//Route::get('/national/update-analysis', 'DashboardController@updateAnalysis');
Route::get('/{lc}/{program}', 'DashboardController@index');


Route::get('/{lc}/{program}/generatexls', 'DashboardController@GenerateXls');

Route::get('home', 'HomeController@index');
//Route::get('roles', 'ManageRolesController@index');
//Route::get('expa-leads', 'ManageExpaLeadsController@index');