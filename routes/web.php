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

Auth::routes(['verify' => true]);

Route::get('/advertise', function () {
    return view('promo.advertise');
})->name('advertise');

Route::get('/terms-of-use', function () {
    return view('promo.terms');
})->name('terms');

// Vehicle
Route::get('/vehicle/create', 'VehicleController@create')->name('vehicle.create')->middleware('verified');
Route::get('/vehicle/filter', 'VehicleController@filter')->name('vehicle.filter');
Route::get('/vehicle/search', 'VehicleController@search')->name('vehicle.search');
Route::get('/vehicle/u/{user}', 'VehicleController@user_vehicles')->name('vehicle.user_vehicles');
Route::get('/vehicle/{vehicle}/edit', 'VehicleController@edit')->name('vehicle.edit')->middleware('verified');
Route::get('/vehicle/{vehicle}', 'VehicleController@show')->name('vehicle.show');
Route::patch('/vehicle/{vehicle}', 'VehicleController@update')->name('vehicle.update')->middleware('verified');
Route::post('/vehicle', 'VehicleController@store')->name('vehicle.store')->middleware('verified');;
Route::get('/', 'VehicleController@index')->name('vehicle.index');
Route::delete('/vehicle/{vehicle}', 'VehicleController@destroy')->name('vehicle.destroy')->middleware('verified');

// User
Route::patch('/user/{user}', 'UserController@update')->name('user.update')->middleware('verified');
