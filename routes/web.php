<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//guest routes
Route::get('/', 'HouseController@homepage')->name('guest.homepage');
Route::get('/search', 'HouseController@search')->name('guest.search');
Route::get('/houses/{house}', 'HouseController@show')->name('guest.show');
Route::post('/sendmessage', 'MessageController@store')->name('guest.messages.store');

//UPR routes
Route::prefix('upr')->namespace('upr')->name('upr.')->middleware('auth')->group(function() {
    Route::resource('/houses', 'HouseController');
	Route::get('/payments', 'PaymentController@index')->name('payments.index');
    Route::get('/payments/create/{house}', 'PaymentController@create')->name('payments.create');
    Route::post('/payments/checkout/{house}', 'PaymentController@checkout')->name('payments.checkout');
    Route::post('/payments', 'PaymentController@store')->name('payments.store');
    Route::get('/messages', 'MessageController@index')->name('messages.index');
    Route::post('/sendmessage', 'MessageController@store')->name('messages.store');
    Route::get('/stats/{house}', 'HitController@index')->name('hits.index');
    Route::get('/toggle/{house}', 'HouseController@toggleVisibility')->name('houses.toggle');

});
