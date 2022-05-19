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
Auth::routes();
Route::get('/home', 'EventsController@index')->name('home');

Route::get('/', 'EventsController@index');

Route::get('/events', 'EventsController@index')->name('index.events');
Route::middleware(['auth'])->group(function () {
    Route::get('/events/create','EventsController@create')->name('create.event');
    Route::post('/events/store','EventsController@store')->name('store.event');
    Route::put('/events/update','EventsController@update')->name('update.event');
    Route::get('/events/{id}/edit','EventsController@edit')->name('edit.event');
    
    Route::delete('/events/{id}','EventsController@destroy')->name('delete.event');
});

Route::get('/events/{id}','EventsController@show')->name('show.event');

Route::get('/api/exaternal','ExternalAPIsController@externalUsers')->name('external.users');