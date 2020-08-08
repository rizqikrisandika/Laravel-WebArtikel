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

Route::get('/','HomesController@index');

Route::get('/dashboard','ArtikelsController@index');
Route::get('/dashboard/create','ArtikelsController@create')->name('create.artikel');

Route::get('/{home}','HomesController@show');

Route::post('/dashboard','ArtikelsController@store');
Route::delete('/dashboard/{artikel}','ArtikelsController@destroy');
Route::get('/dashboard/{artikel}/edit','ArtikelsController@edit');
Route::patch('/dashboard/{artikel}', 'ArtikelsController@update');

// Route::resource('/dashboard', 'ArtikelsController');


