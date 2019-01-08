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
    Route::group(['middleware','login'],function(){
        Route::get('index','IndexController@index');
        Route::get('info','IndexController@info');
        Route::get('login','AdminController@login');
        Route::get('goods/index','GoodsController@index');
        Route::match(['get','post'],'goods/add','GoodsController@add');
        Route::match(['get','post'],'goods/update/{goods}','GoodsController@update');
        Route::post('goods/del','GoodsController@del');
    });
    Route::post('login_check','AdminController@login_check');
    Route::get('logout','AdminController@logout');
});
