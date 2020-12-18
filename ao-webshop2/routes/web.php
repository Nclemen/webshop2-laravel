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

Route::get('/login', 'LoginController@loginForm')->name('loginForm');

Route::post('/login', 'LoginController@authenticate')->name('authenticate');

Route::post('/logout', 'LoginController@logout')->name('logout');

Route::get('/register', 'RegisterController@registerForm')->name('registerForm');

Route::post('/register', 'RegisterController@register')->name('register');


// Route::get('/shop', 'ShopController@index')->name('index');


// admin routes


// Route::resources([
//     'admin/category'=>'CategoriesController',
//     'admin/product'=>'ProductsController'
// ]);
    
Route::middleware('isAdmin')->get('/admin', 'AdminController@index')->name('admin.index');

Route::middleware('isAdmin')->resource('admin/category','CategoriesController');

Route::middleware('isAdmin')->resource('admin/product','ProductsController');



// Route::get('/hello', function () {
//     return '<h1> hello </h1>';
// })->name('test.hello');

// Route::resource('examples','ExampleController');


/*

    Route::resource('admin/category','CategoriesController') creates all of these routes below

    // Route::get('/admin/category','CategoriesController@index')->name('category.index');

    // Route::post('/admin/category','CategoriesController@store')->name('category.store');

    // Route::get('/admin/category/create','CategoriesController@create')->name('category.create');

    // Route::get('/admin/category/{category}','CategoriesController@show')->name('category.show');

    // Route::put('/admin/category/{category}','CategoriesController@update')->name('category.update');

    // Route::delete('/admin/category/{category}','CategoriesController@destroy')->name('category.destroy');

    // Route::get('/admin/category/{category}/edit','CategoriesController@edit')->name('category.edit');

*/


// Route::get('/shop', 'WebshopController@index');
