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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/category', 'CategoryController@index')->name('category');
Route::get('/category/{id}', 'CategoryController@detail')->name('category-detail');

Route::get('/detail/{id}', 'DetailController@index')->name('detail');
Route::post('/detail/{id}', 'DetailController@add')->name('detail-add');

Route::post('/checkout/callback', 'CheckoutController@callback')->name('midtrans-callback');

Route::get('/success', 'CartController@success')->name('success');

Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware'=> ['auth']], function(){

    Route::get('/cart', 'CartController@index')->name('cart');
    Route::delete('/cart/{id}', 'CartController@delete')->name('cart-delete');

    Route::post('/checkout', 'CheckoutController@process')->name('checkout');

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/dashboard/product', 'DashboardProductsController@index')->name('dashboard-products');
    Route::get('/dashboard/product/create', 'DashboardProductsController@create')->name('dashboard-products-create');
    Route::post('/dashboard/product', 'DashboardProductsController@store')->name('dashboard-products-store');
    Route::get('/dashboard/product/{id}', 'DashboardProductsController@detail')->name('dashboard-products-detail');
    Route::post('/dashboard/product/{id}', 'DashboardProductsController@update')->name('dashboard-products-update');
    
    Route::post('/dashboard/product/gallery/upload', 'DashboardProductsController@uploadGallery')->name('dashboard-products-gallery-upload');
    Route::get('/dashboard/product/gallery/delete/{id}', 'DashboardProductsController@deleteGallery')->name('dashboard-products-gallery-delete');

    Route::get('/dashboard/transactions', 'DashboardTransactionsController@index')->name('dashboard-transactions');
    Route::get('/dashboard/transactions/{id}', 'DashboardTransactionsController@detail')->name('dashboard-transactions-detail');
    Route::post('/dashboard/transactions/{id}', 'DashboardTransactionsController@update')->name('dashboard-transactions-update');

    Route::get('/dashboard/settings', 'DashboardSettingController@store')->name('dashboard-setting');
    Route::get('/dashboard/account', 'DashboardSettingController@account')->name('dashboard-account');
    Route::post('/dashboard/account/{redirect}', 'DashboardSettingController@update')->name('dashboard-setting-redirect');

});

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/', 'DashboardController@index')->name('admin-dashboard');
        Route::resource('category', 'CategoryController');
        Route::resource('user', 'UserController');
        Route::resource('product', 'ProductController');
        Route::resource('product-gallery', 'ProductGalleryController');
        Route::resource('transaction', 'TransactionController');
    });

Auth::routes();

