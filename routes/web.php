<?php

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
    return view('login');
});

Auth::routes();
Auth::routes('admin');


Route::get('/', 'CyberController@rest');
// Route::get('/content', 'CyberController@content');
Route::get('/monitoring_cyberpatrol', 'CyberController@rest');
Route::get('/form', 'CyberController@form');
Route::post('/user', 'CyberController@users')->middleware('admin');
Route::get('/user', 'CyberController@add');
Route::delete('/pages.user/{id}', 'CyberController@destroy');
Route::get('/kategory', 'CyberController@kategory');
// Route::get('/modal', 'CyberController@modal');


//monitoring_backend
Route::get('/monitoring_backend', 'BackendController@backend');
Route::get('/monitoring_engine', 'EngineController@engine');
Route::get('/view', 'BackendController@view');
// Route::get('/range', 'BackendController@view');