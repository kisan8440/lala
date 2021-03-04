<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');


//Product Controller
Route::group(['prefix' => 'products'], function () {
    //product listing
    Route::get('/', 'ProductController@show_products')->name('product.search');
    //View product details - using ID
    Route::get('/view/{id?}', 'ProductController@view_one_product')->name('product.view');
    Route::get('/item/view/{id?}', 'ProductController@view_one_product_item')->name('product.item_view');
    Route::get('/optional/item/view/{id?}', 'ProductController@view_one_product_optional_item')->name('product.optional_item_view');
});

//Brand Controller
Route::group(['prefix' => 'brands'], function () {
    //brand listing
    Route::get('/', 'BrandController@show_products')->name('brands.search');
    //View brand details - using ID
    Route::get('/view/{id?}', 'BrandController@view_one_brand_item')->name('brands.view');
   
});

//Support Controller
Route::group(['prefix' => 'support'], function () {
    //support listing
    Route::get('/', 'SupportController@show_products')->name('support.search');
    //View support details - using ID
    Route::get('/view/{id?}', 'SupportController@view_one_support_item')->name('support.view');
});

//check user is login
Route::get('/auth/is-login', 'HomeController@check_login')->name('is_login');

//custom auth controllers
Route::post('/login', 'UserController@attemptLogin')->name('attempt_login');
Route::post('/register', 'UserController@storeUser')->name('register');

// Logged in user's controller
Route::group([
    'prefix' => 'user', 
    'middleware' => ['auth'],
    ], function () {
    
        Route::get('/dashboard', 'UserController@index')->name('user.dashboard');
        Route::get('/cart', 'CartController@cart')->name('user.cart');
        Route::get('/orders', 'CartController@cart')->name('user.order');
        Route::get('/cart/remove/{csl}', 'CartController@remove')->name('user.remove_cart');
        Route::get('/checkout', 'UserController@checkout')->name('user.checkout');

        //Cart controller
        Route::post('/add-to-cart', 'CartController@add_to_cart')->name('user.addToCart');
        
});