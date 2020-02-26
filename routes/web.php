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
Auth::routes();

Route::get('/', function () {
    return Auth::check() ? redirect('/task') : view('welcome'); 
});

Route::get('/task', "TaskController@index")->middleware('auth');
Route::get('/task/{task}', 'TaskController@show')->middleware('auth');
Route::get('/newtask', 'TaskController@create')->middleware('auth');
Route::get('/task/{task}/complete', 'TaskController@complete')->middleware('auth');
Route::post('/createtask', 'TaskController@store')->middleware('auth');
Route::get('/task/{task}/delete', 'TaskController@delete')->middleware('auth');
Route::get('/task/{task}/edit', 'TaskController@edit')->middleware('auth');
Route::post('/task/{task}/update', 'TaskController@update')->middleware('auth');
