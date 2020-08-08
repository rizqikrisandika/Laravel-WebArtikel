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
Route::group(['middleware' => ['auth']], function () {
    Route::post('/dashboard','ArtikelsController@store');
    Route::delete('/dashboard/{artikel}','ArtikelsController@destroy');
    Route::get('/dashboard/{artikel}/edit','ArtikelsController@edit');
    Route::patch('/dashboard/{artikel}', 'ArtikelsController@update');
    Route::get('/dashboard','ArtikelsController@index');
    Route::get('/dashboard/create','ArtikelsController@create')->name('create.artikel');
});

Route::get('/','HomesController@index');
Route::get('/login','AuthController@login')->name('login');
Route::post('/login','AuthController@loginadmin')->name('post.loginadmin');
Route::get('/logout','AuthController@logout')->name('logout');

Route::get('/{home}','HomesController@show');




// Route::resource('/dashboard', 'ArtikelsController');


