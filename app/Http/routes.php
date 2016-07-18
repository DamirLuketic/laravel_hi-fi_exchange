<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

// Basic view if user is not register/sign up

Route::get('/', ['as' => 'index', function(){
    return view('index');
}]);

// Admin route

Route::auth();

Route::get('/home', 'HomeController@index');


// Route for Controller -> uses native and created method

Route::resource('/users', 'UserController');

Route::resource('/products', 'ProductController');

// Add route and route name for attach product to current user method

Route::post('/products/{id}/attach', ['as' => 'attach_product', 'uses' => 'ProductController@attach_product']);

// Add route and route name for detach product from current user method

Route::post('/products/{id}/detach', ['as' => 'detach_product', 'uses' => 'ProductController@detach_product']);


// Admin middleware with Admin route, for products

Route::group(['middleware' => 'Admin'], function()
{

    Route::resource('/admin/products', 'AdminProductController');
    
});







