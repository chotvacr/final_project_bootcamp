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


Route::get('/', 'CityController@index')->name('city.index'); 

Route::get('/{city_id}/categories', 'CategoryController@index')->name('category.index'); 

/*
Route::get('/', 'CategoryController@index')->name('category.index');

Route::get('/categories/{category_id', 'CategoryController@show')->name('category.show'); 

Route::get('/cities', 'CityController@index')->name('city.index');

Route::get('/{city_id}/categories', 'CategoryController@index'); // Prague and Nuremberg
*/