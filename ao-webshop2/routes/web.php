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

// profile routes
Route::middleware('auth')->get('/profile', 'ProfileController@index')->name('profile');
Route::middleware('auth')->get('/order/{id}', 'OrdersController@show')->name('order.show');

// login routes
Route::get('/login', 'LoginController@loginForm')->name('loginForm');
Route::post('/login', 'LoginController@authenticate')->name('authenticate');
Route::post('/logout', 'LoginController@logout')->name('logout');
Route::get('/register', 'RegisterController@registerForm')->name('registerForm');
Route::post('/register', 'RegisterController@register')->name('register');

//shop routes 
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/product/{id}', 'ShopController@product')->name('shop.product');
Route::get('/shop/cart', 'ShopController@cart')->name('shop.cart');
Route::put('/shop/cart/{id}', 'ShopController@updateCart')->name('shop.updateCart');
Route::post('/shop/add-to-cart/{id}', 'ShopController@addToCart')->name('shop.addToCart');
Route::post('/shop/subtract-from-cart/{id}', 'ShopController@subtractFromCart')->name('shop.subtractFromCart');
Route::delete('/shop/delete-from-cart/{id}', 'ShopController@deleteFromCart')->name('shop.deleteFromCart');
Route::middleware('auth')->post('/shop/cart/order', 'OrdersController@order')->name('placeOrder');

// admin routes


// Route::resources([
//     'admin/category'=>'CategoriesController',
//     'admin/product'=>'ProductsController'
// ]);
    
Route::middleware('isAdmin')->get('/admin', 'AdminController@index')->name('admin.index');

Route::middleware('isAdmin')->resource('admin/category','CategoriesController');

Route::middleware('isAdmin')->resource('admin/product','ProductsController');

Route::middleware('isAdmin')->resource('admin/user','UsersController');

Route::middleware('isAdmin')->resource('admin/orders','OrdersController');


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
