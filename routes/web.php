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


Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');

Route::get('/logout', 'LoginController@logout');

Route::get('/signup', 'SignUpController@index');
Route::post('/signup', 'SignUpController@signup');

Route::get('/map', 'MapController@index');





Route::middleware(['authenticated'])->group(function(){
    Route::get('/service', 'ServiceController@addService');
    Route::post('/service', 'ServiceController@store');
    Route::get('/service/{id}/edit', 'ServiceController@edit');
    Route::post('/service/{id}/edit', 'ServiceController@storeService');
    
    Route::delete('service/{id}/delete', 'ServiceController@deleteService');
    Route::get('/settings', 'SettingsController@index');
    Route::get('/myservices', 'ServiceController@getUserServices');
});
// have middleware to only allow people who are authenticated to see certain pages