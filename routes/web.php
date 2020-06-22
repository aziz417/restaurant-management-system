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

Route::get('dashboard', function () {
    return view('admin.layouts.master');
});

Route::get('/', 'Frontend\FrontendController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::POST('reservation', 'Frontend\ReservationController@reserve')->name('reservation.reserve');

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'admin'], function(){
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::resource('sliders', 'SliderController');
    Route::resource('categorys', 'CategoryController');
    Route::resource('items', 'ItemController');

});

