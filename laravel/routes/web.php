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
    return view('welcome');
});
Route::get('user/index','UserController@index');
//Route::get('login','Admin\AdminController@login');
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('index','IndexController@index');
    Route::get('info','IndexController@info');
    Route::get('login','AdminController@login');
    Route::post('login_check','AdminController@login_check');
});
