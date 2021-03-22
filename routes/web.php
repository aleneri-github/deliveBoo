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

Route::get('/', 'RedirectController@index');

Route::get('/home', function () {
    return view('guest.index');
})->name('guest.index');

Route::prefix('guest')->name('guest.')->group( function() {

    Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
    Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
    Route::get('/restaurants/{slug}/show', 'GuestController@show')->name('show');

});

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
    Route::get('/dashboard', function () {
        return view('admin.dishes.dash');
    })->name('dishes.dash');
    Route::get('/statistics', function () {
        return view('admin.dishes.statistics');
    })->name('dishes.statistics');

});

Route::get('/restaurants/{slug}/show', 'GuestController@show')->name('guest.show');
