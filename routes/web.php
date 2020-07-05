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

/**www.active.test would be the landing page */
Route::get('/', 'CategoryController@index')->name('category.index');

/** Possible structure: 
 * 
 * Route::get('/categories', 'CategoryController@index)         --> would show the second page with the 4 categories
 * 
 * Route::get('/categories/{category_id}', 'CategoryController@show)  --> this would be the 3. page with details on the selected category
 * 
 * 
 */

 Route::get('/categories/{category_id', 'CategoryController@show')->name('category.show'); 