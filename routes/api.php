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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories','Api\ApiController@categories');
Route::get('offers','Api\ApiController@offers');
Route::get('categories/{name}','Api\ApiController@filteredOffers');
Route::get('operators','Api\ApiController@operators');

Route::resource('cruds', 'CrudAdminController',['except'=>['edit','show','store']]);
