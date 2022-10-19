<?php

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

Route::get('/', 'HomeController@index');
Route::get('viewproduct/{id}', 'HomeController@viewProduct');
Route::get('getcart/{id}', 'HomeController@getCart');
Route::post('addtocart', 'HomeController@addToCart');
Route::get('cart/{userid}', 'HomeController@cart');

Route::get('admin', 'AdminController@index');
Route::get('addproducts', 'AdminController@addProducts');
Route::post('saveproduct', 'AdminController@saveProducts');
Route::get('getcartdata', 'AdminController@getCartData');
