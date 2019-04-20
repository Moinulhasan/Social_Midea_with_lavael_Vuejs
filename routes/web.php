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
Route::get('/test', function () {
    return Auth::user()->test();
});

Auth::routes();



Route::group(['middleware'=>'auth'],function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile/{slug}', 'ProfileController@index');
    Route::get('/changeimage', 'ProfileController@changeimage');
    Route::post('/uploadphoto','ProfileController@uploadphoto');
    Route::post('/updateprofile','ProfileController@updateprofile');
    Route::get('/editprofile','ProfileController@editprofile');
     Route::get('/findfriend/{slug}','ProfileController@findfriend');
     Route::get('/addfriend/{id}','ProfileController@addfriend');
     Route::get('/accept/{name}/{id}','ProfileController@accept');
      Route::get('/friends','ProfileController@friends');
       Route::get('/remove/{id}','ProfileController@remove');
       Route::get('/unfriend/{id}','ProfileController@unfriend');
     Route::get('/request/{slug}','ProfileController@request');
});
