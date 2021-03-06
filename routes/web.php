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
    return view('home');
});

Route::resource('users', 'UserController');
Route::view('/', 'auth/login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/board', 'BoardController');
Route::put('/task/changeLane/', 'TaskController@changeLane');
Route::resource('/task', 'TaskController');
Route::resource('/lane', 'LaneController');
