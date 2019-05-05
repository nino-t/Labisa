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
Route::get('/view-event/{event_slug}', 'FrontController@eventView')->name('event.view');

Route::post('/event/{event_slug}/donation', 'FrontController@donation')->name('event.donation');
Route::get('/event/{event_slug}/donation', 'FrontController@donation')->name('donation.store');

Auth::routes();
Route::resource('/event', 'EventController');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
