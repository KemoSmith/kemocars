<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('auth:sanctum')->get('/contact_info', 'Api\ContactInfoController@index')->name('api.contact_info.index');
Route::middleware('auth:sanctum')->post('/contact_info', 'Api\ContactInfoController@store')->name('api.contact_info.store');
Route::middleware('auth:sanctum')->patch('/contact_info/{contactInfo}', 'Api\ContactInfoController@update')->name('api.contact_info.update');
Route::middleware('auth:sanctum')->delete('/contact_info/{contactInfo}', 'Api\ContactInfoController@delete')->name('api.contact_info.delete');

Route::get('/vehicle', 'Api\VehicleController@index')->name('api.vehicle.index');
Route::get('/vehicle/filter', 'Api\VehicleController@filter')->name('api.vehicle.filter');
Route::get('/vehicle/search', 'Api\VehicleController@search')->name('api.vehicle.search');
Route::get('/vehicle/u/{user}', 'Api\VehicleController@user_vehicles')->name('api.vehicle.user_vehicles');
Route::get('/vehicle/contact_info/{vehicle}', 'Api\VehicleController@contact_info')->name('api.vehicle.contact_info');
Route::get('/vehicle/{vehicle}', 'Api\VehicleController@show')->name('api.vehicle.show');
Route::post('/vehicle/update/{vehicle}', 'Api\VehicleController@update')->name('api.vehicle.update');
Route::middleware('auth:sanctum')->delete('/vehicle_image/{image}', 'Api\VehicleController@delete_image')->name('api.vehicle.delete_image');
Route::middleware('auth:sanctum')->post('/vehicle', 'Api\VehicleController@store')->name('api.vehicle.store');
