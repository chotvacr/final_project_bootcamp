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





// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


//Landing Page
Route::get('/', 'CityController@index')->name('city.index'); 

// Second Page: 
Route::get('/{city_name}/categories', 'CategoryController@index')->name('category.index'); 

// Personal logged-in page
Route::get('/home', 'UserController@edit');

// shows all activities in Laravel
Route::get('/{city_name}/{category_id}/activities', 'ActivityController@index')->name('activity.index');

// Detail of the activity
// Route::get('/{city_name}/{category_id}/activities/{activity_id}', 'ActivityController@show')->name('activity.show');
Route::get('/activities/{activity_id}', 'ActivityController@show')->name('activity.show');
Route::get('/activities/{activity_id}/registered', 'ActivityController@show')->name('activity.show');

// Route::post('/', 'UserController@update'); 

Route::post('/description', 'UserController@update'); 


//Activity creation page
Route::post('/description', 'UserController@update'); 

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{user_id}', 'UserController@show');




// /city_name/categories/category_name/activities - activities in different categories a
// /city_name/categories/category_name/activities/activity_id ..... detail of activity

// // activities
// activity_id/edit (update method happens here) GET for edit POST with Update
// activity_id/create (store method happens here) POST
// activity_id/remove 

// /profile/user_id 


