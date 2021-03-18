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

// PROVVISORIA
Route::get('/guest/index', function () {
    return view('guest.index');
})->name('guest.index');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group( function(){


    Route::resource('dishes', 'DishController');

    Route::get('/restaurant', 'RestaurantController@index')->name('restaurant.index');
    Route::get('/restaurant/create', 'RestaurantController@create')->name('restaurant.create')->middleware('check');
    Route::post('/restaurant/store', 'RestaurantController@store')->name('restaurant.store');

});

Route::get('/guest/{slug}/show', 'GuestController@show')->name('guest.show');
