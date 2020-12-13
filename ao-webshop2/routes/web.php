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

/*
    the new syntax of adding a controller to a route is:

    Route::get('/', [HomeController::class, 'index'])

    the new syntax of adding a controller to a route is: 
    
    Route::get('/', 'HomeController@index');

    to use the old syntax i had to uncomment line 29 in the RouteServiceProvider
*/

Route::get('/', 'PagesController@index')->name('main.index');

Route::get('/hello', function () {
    return '<h1> hello </h1>';
})->name('test.hello');

// Route::resource('examples','ExampleController');
// Route::resource('category','CategoriesController');

Route::get('/admin/category','CategoriesController@index')->name('category.index');

Route::post('/admin/category','CategoriesController@store')->name('category.store');

Route::get('/admin/category/create','CategoriesController@create')->name('category.create');

Route::get('/admin/category/{category}','CategoriesController@show')->name('category.show');

Route::put('/admin/category/{category}','CategoriesController@update')->name('category.update');

Route::delete('/admin/category/{category}','CategoriesController@destroy')->name('category.destroy');

Route::get('/admin/category/{category}/edit','CategoriesController@edit')->name('category.edit');


// Route::get('/shop', 'WebshopController@index');
