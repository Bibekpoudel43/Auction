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

Auth::routes(['verify' => true]);

Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('items', 'ItemsController');
Route::get('items/create', 'ItemsController@create')->middleware('verified');

Route::get('profile/{username}', 'ProfileController@profile')->middleware('verified');

Route::post('items/{item}/bid', 'BidsController@storeBidding');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
