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

Route::get('/', 'FrontController@index')->name('beranda');
Route::get('/home', 'FrontController@index')->name('home');
Route::get('/explore/{category_id}', 'FrontController@eventList')->name('event.browse');

Auth::routes();
Route::resource('/galangan', 'EventController');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
