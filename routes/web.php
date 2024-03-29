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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('landing-page');
})->name('landing');

Auth::routes();
Route::post('/info','InfoController@store')->name('getInfo.store');

Route::get('/success-request', function () {
    return view('success-request');
})->name('success-request');
//Route::resource('leads', 'LeadController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/operators/{id}','PublicController@show')->name('operator');
Route::get('/offers/{id}','PublicController@detail')->name('offerDetail');
Route::prefix('user')

    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {

    Route::resource('myoffers', 'CrudOfferController');
    Route::resource('myleads', 'CrudLeadController');
    Route::get('admin','OperatorController@admin');
    // l'ho dovuto mettere qui anche se api senno non potevo usare Auth::id(), problema col token/laravel passport?

        //Route::get('/dashboard','DashboardController@dashboard')->name('dashboard');
    Route::get('dashboard', 'OperatorController@viewAdmin')->name('admin-dashboard');
    Route::resource('offers', 'OfferController');
    Route::get('/offerscrud', function () {
        return view('user.offers.crud-offer');
    })->name('crudoffer');

    Route::resource('leads', 'LeadController');
    });

    // Route::get('/{any}', function () {
    //     return view('test');
    // })->where('any','.*');

    // Route::get('/{any}', 'HomeController@index')->where('any','.*');

