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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');

Auth::routes(['verify' => true]);

Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');

Route::resource('items', 'ItemsController');
Route::get('items/create', 'ItemsController@create')->middleware('verified');

Route::get('profile/{username}', 'ProfileController@profile')->middleware('verified');

Route::post('items/{item}/bid', 'BidsController@storeBidding');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\AdminLoginController@userLogout')->name('logout');


Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/settings', 'AdminController@settings')->name('admin.settings');
    Route::get('/checkPassword', 'AdminController@checkPassword')->name('admin.checkPassword');
    Route::match(['get', 'post'], '/updatePassword', 'AdminController@updatePassword')->name('admin.updatePassword');
    Route::match(['get', 'post'], '/add-category', 'CategoryController@addCategory')->name('admin.addCategory');
    Route::get('/view-categories', 'CategoryController@viewCategories')->name('admin.viewCategory');
    Route::match(['get', 'post'], '/edit-category/{id}', 'CategoryController@editCategory');



    //password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

});

