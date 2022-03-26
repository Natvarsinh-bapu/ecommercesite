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

// login
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('logout', 'Auth\LoginController@logout');
Route::get('user-login', 'Auth\LoginController@showLoginForm');
Route::post('user-login', 'Auth\LoginController@userLogin');
Route::get('user-register', 'Auth\RegisterController@showRegistrationForm');
Route::post('user-register', 'Auth\RegisterController@userRegister');

Route::get('/', 'DefaultController@index');
Route::get('shop', 'DefaultController@shop');
Route::get('product/{id}', 'DefaultController@productInfo');
Route::get('cart', 'DefaultController@cart');
Route::post('add-to-cart', 'DefaultController@addToCart');
Route::post('remove-from-cart', 'DefaultController@removeFromCart');
Route::post('buy-now', 'DefaultController@buyNow');
Route::post('continue-order', 'DefaultController@continueOrder');
Route::get('order-summery', 'DefaultController@orderSummery');
Route::post('place-order', 'DefaultController@placeOrder');
Route::get('my-orders', 'DefaultController@myOrders');
Route::get('my-orders/{id}', 'DefaultController@orderShow');
Route::post('cancel-order', 'DefaultController@cancelOrder');

Route::get('/my-profile', 'userController@myProfile');
Route::post('update-profile-pic', 'userController@updateProfilePic');
Route::post('update-profile', 'userController@updateProfile');

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');


