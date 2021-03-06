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
        // show all available Categories in certain City: 
Route::get('/cities/{city_id}/categories', 'CityController@show')->name('city.show'); // works

// 3. Overview Activities: 
        // show all available Activities in certain Category
// Route::get('/cities/{city_id}/{category_id}/activities', 'ActivityController@show')->name('activity.show'); 

// 4. Specific Activity: 
        // Show the Detail of the Activity: 

        // Register a logged-in user to that activity: 
Route::post('/store', 'ActivityController@registerActivity')->name('activity.registerActivity'); 

// 5. Activity-related Routes: 
    // Create a new Activity as logged-in User: 
Route::get('/activities/create', 'ActivityController@create')->name('activity.create'); 
    // Store a new Activity: 
Route::post('/activities', 'ActivityController@store')->name('activity.store'); 

 
// Personal Profile Page: 
Route::post('/profile/removeActivity/',       'ActivityController@removeActivity')->name('activity.removeActivity');
Route::post('/profile/removeregistration/',       'ActivityController@removeRegistration')->name('activity.removeRegistration');

Route::get('/profile/activities/{activity_id}/edit',       'ActivityController@edit')->name('activity.edit');
Route::post('/profile/activities/{activity_id}',       'ActivityController@update')->name('activity.update');

Route::get('/profile/{user_id}', 'ProfileController@show')->name('profile.show');
Route::get( '/profile/{user_id}/edit', 'ProfileController@edit')   ->name('profile.edit');
Route::post( '/profile/{user_id}',      'ProfileController@update') ->name('profile.update');

//Search-Bar: 
Route::post('/search', 'ActivityController@search')->name('activity.search'); 

// Route::view('/api/activity','welcome');

Route::view('/activityreactlist', 'welcome');
Route::get('/cities/{city_id}/{category_id}/activities', 'ActivityController@show')->name('activity.show'); 

Route::get('/cities/{city_id}/{category_id}/{activity_id}', 'ActivityController@detail')->name('activity.detail'); 