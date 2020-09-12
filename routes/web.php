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

// Route::get('/', 'HomeController@index')->name('home');

// Vehicle
Route::get('/vehicle/create', 'VehicleController@create')->name('vehicle.create');
Route::get('/vehicle/filter', 'VehicleController@filter')->name('vehicle.filter');
Route::get('/vehicle/search', 'VehicleController@search')->name('vehicle.search');
Route::get('/vehicle/{vehicle}/edit', 'VehicleController@edit')->name('vehicle.edit');
Route::get('/vehicle/{vehicle}', 'VehicleController@show')->name('vehicle.show');
Route::patch('/vehicle/{vehicle}', 'VehicleController@update')->name('vehicle.update');
Route::post('/vehicle', 'VehicleController@store')->name('vehicle.store');
Route::get('/', 'VehicleController@index')->name('vehicle.index');
Route::delete('/vehicle/{vehicle}', 'VehicleController@destroy')->name('vehicle.destroy');

// User
Route::patch('/user/{user}', 'UserController@update')->name('user.update');
