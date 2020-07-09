<?php

use Illuminate\Support\Facades\Route;

/**
 * Routes Directory: 
 * 1. Landing Page: Route::get('/', 'CityController@index')->name('city.index');
 * ------------------------------------------------------------------------------ 
 *      --- from here go to ---
 *      a)      Registering:                            
 *                Route::get('register', 'Auth\RegisterController@showRegistrationForm')                        ->name('register');
 *                Route::post('register', 'Auth\RegisterController@register');
 * 
 *      b)      Log-in:                                 
 *                Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');                                                      
 *                Route::post('login', 'Auth\LoginController@login');                                                     
 *                Route::post('logout', 'Auth\LoginController@logout')                                          ->name('logout');
 * 
 *      c)      Categories of selected city:            
 *                Route::get('/cities/{city_id}/categories', 'CityController@show')                             ->('city.show'); 
 * 
 *      d)      Personal Profile Page
 *                Route::get('/profile/{user_id})                                                               ->name('user.show');
 * 
 * 
 * 2. Categories of selected city:    
 * -------------------------------                 
 *      --- from here go to ---
 *      a)      Registering / Login / Landing-Page
 *      b)      Personal Profile Page (if logged in):  
 *   
 *      c)      Overview Activities:                    
 *                Route::get('/cities/{city_id}/{category_id}/activities', ActivityController@index')           ->name('activity.index'); 
 * 
 * 
 * 3. Overview Activities of specific Category:         
 * --------------------------------------------
 *      --- from here go to ---
 *      a)      Registering / Login / Landing-Page / Categories / Personal Profile Page 
 * 
 *      b)      Specific Activity - Page:               
 *                Route::get('/cities/{city_id}/{category_id}/{activities_id}', ActivityController@show')      ->name('activity.show'); 
 * 
 * 4. Specific Activity - Page:
 * ---------------------------- 
 *      --- from here go to ---
 *      a)      Registering (via "Register"-button and via Register-Header-Link)
 *      b)      Login (via "Register"-button and via Loginin-Header-Link)
 *      c)      Landing-Page / Categories / Activities
 *      d)      Personal Page (if logged in) 
 *      e)      "Register"-Button: if already logged in: Pop-up
 * 
 * 5. Activity-related Routes: 
 *      1)      Create activity                         
 *                Route::get('/activities/create','ActivityController@create')                                  ->name('activity.create');                                                     
 *                Route::post('/activities', 'ActivityController@store')                                        ->name('activity.store');
 *  
 *      2)      Edit activity
 *                Route::get('/activities/{activity_id}/edit', 'ActivityController@edit')                       ->name('activity.edit'); 
 *                Route::post('/activities/{activity_id}', 'ActivityController@update')                         ->name('activity.update'); 
 * 
 * 6. Personal Profile Page

 */    
/**------------------------------------------------------------------------------------------- */ 
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
/** ------------------------------------------------------------------------------------------- */


// 1. Landing Page: 
Route::get('/', 'CityController@index')->name('city.index'); // works 

// 2. Categories of selected City:
Route::get('/cities/{city_id}/categories', 'CityController@show')->name('city.show'); // works

// 3. Overview Activities: 
Route::get('/cities/{city_id}/{category_id}/activities', 'ActivityController@show')->name('activity.show'); 

// 4. Specific Activity: 
Route::get('/cities/{city_id}/{category_id}/{activity_id}', 'ActivityController@detail')->name('activity.detail'); 
Route::post('/store', 'ActivityController@register')->name('activity.register'); 

// 5. Activity-related Routes: 
Route::get('/activities/create', 'ActivityController@create')->name('activity.create'); 
Route::post('/activities', 'ActivityController@store')->name('activity.store'); 

Route::get('/activities/{activity_id}/edit', 'ActivityController@edit')->name('activity.edit'); 
Route::get('/activities/{activity_id}', 'ActivityController@update')->name('activity.update'); 

// Personal Profile Page: 
Route::get('/profile/{user_id}', 'ProfileController@show')->name('profile.show');


