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

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{user_id}', 'UserController@show')->name('profile.show');


//  active.test/ - landing page OK
Route::get('/', 'CityController@index')->name('city.index'); 
// on landing page, we have multiple options : 
// a. redirected to register - OK
        // active.test/register 
// b. redirected to login  -OK
        // active.test/login
// c. redirected to categories of selected city OK
        // active.test/{city_name}/categories
Route::get('/cities/{city_id}/categories', 'CategoryController@index')->name('category.index'); 
// active.test/prague/categories 
        // a. got to category name active.test/{city_name=prague}/categories/{category_name = Coocing, Coding, Helping, Language }
        // b. go to home page
        // c. register/login 
// active.test/prague/categories/category_name/activities - this page is done with React 
        // this page shows all activities in city Prague, in selected category 
//  active.test/prague/categories/category_name/activities/activity_id 
        // detail of the activity
        // we can register for this activity - with button, that saves into database user_id and activity_id (registration pivot table ??)
        // we stay on the same page, we see alert/pop up message, stating you are registered for this activity, for management go to your profile
// active.test/profile/{user_id} - on this page, you can edit user information, see registered activities-possibility to remove, see your activities + add your activity
// active.test/profile/{user_id}/activity_creation
  
        
// /city_name/categories/category_name/activities - activities in different categories a
// /city_name/categories/category_name/activities/activity_id ..... detail of activity

// // activities
// activity_id/edit (update method happens here) GET for edit POST with Update
// activity_id/create (store method happens here) POST
// activity_id/remove 

// /profile/user_id 


