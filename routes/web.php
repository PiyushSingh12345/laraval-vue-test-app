<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('dash','TeamController@teamdash')->name('dash');
Route::get('addteam','TeamController@addteam')->name('addteam');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Team Route
Route::get('/teams', [
    'uses'=>'TeamController@index',
    'as'=>'teams'
]);

Route::post('teams', 'TeamController@createTeam');
Route::get('/teamdelete/{id}','TeamController@deleteTeam');
Route::get('/teamedit/{id}','TeamController@editTeam');
Route::put('/teamedit/{id}','TeamController@updateTeam');
Route::get('/teamplayers/{id}','TeamController@teamPlayers');

//Player Route
Route::get('/players', [
    'uses'=>'PlayerController@index',
    'as'=>'players'
]);
Route::post('players', 'PlayerController@createPlayer');
Route::get('/playerdelete/{id}','PlayerController@deletePlayer');
Route::get('/playeredit/{id}','PlayerController@editPlayer');
Route::put('/playeredit/{id}','PlayerController@updatePlayer');




