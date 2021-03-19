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


Auth::routes();

//home page halaman pelanggan
Route::livewire('/', 'home')->name('home');
Route::livewire('/products', 'product-index')->name('products');
Route::livewire('/products/category/{id}', 'product-category')->name('products.category');
Route::livewire('/products/{id}', 'product-detail')->name('products.detail');
Route::livewire('/keranjang', 'keranjang')->name('keranjang');
Route::livewire('/checkout', 'checkout')->name('checkout');
Route::livewire('/history', 'history')->name('history');

// dashboard halaman petugas
Route::get('/dashboard', 'PageController@index')->name('dashboard');

//catgeory route
Route::get('/category', 'CategoryController@index')->name('category');
Route::post('/category/store', 'CategoryController@store')->name('category.store');
Route::post('/category/import', 'CategoryController@import')->name('category.import');
Route::get('/category/{id}/edit', 'CategoryController@edit')->name('category.edit');
Route::post('/category/{id}/update', 'CategoryController@update')->name('category.update');
Route::get('/category/{id}/delete', 'CategoryController@destroy')->name('category.delete');


//product route
Route::get('/dashboard-product', 'ProductController@index')->name('dashboard-product');
Route::get('/dashboard-product/create', 'ProductController@create')->name('dashboard-product.create');
Route::post('/dashboard-product/store', 'ProductController@store')->name('dashboard-product.store');
Route::get('/dashboard-product/{id}/show', 'ProductController@show')->name('dashboard-product.show');
Route::get('/dashboard-product/{id}/edit', 'ProductController@edit')->name('dashboard-product.edit');
Route::post('/dashboard-product/{id}/update', 'ProductController@update')->name('dashboard-product.update');
Route::get('/dashboard-product/{id}/delete', 'ProductController@destroy')->name('dashboard-product.delete');

//route user
Route::get('/dashboard-user', 'UserController@index')->name('dashboard-user');
Route::get('/dashboard-user/create', 'UserController@create')->name('dashboard-user.create');
Route::post('/dashboard-user/store', 'UserController@store')->name('dashboard-user.store');
Route::get('/dashboard-user/{id}/edit', 'UserController@edit')->name('dashboard-user.edit');
Route::post('/dashboard-user/{id}/update', 'UserController@update')->name('dashboard-user.update');
Route::get('/dashboard-user/{id}/delete', 'UserController@destroy')->name('dashboard-user.delete');


//log controller
Route::get('/category-log', 'LogController@logCategory')->name('category-log');
Route::get('/product-log', 'LogController@logProduct')->name('product-log');
Route::get('/user-log', 'LogController@logUser')->name('user-log');

//route pesanan
Route::get('/dashboard-pesanan', 'PesananController@index')->name('dashboard-pesanan');
Route::post('/dashboard-pesanan/{id}', 'PesananController@statusOnchange')->name('statusOnchange');