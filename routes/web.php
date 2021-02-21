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

Route::get('/', function () {
    return view('launch');
});

Route::get('/dashboard', 'PageController@index')->name('dashboard');
Route::get('/login', 'PageController@login')->name('login');
Route::get('/register', 'PageController@register')->name('register');
Route::get('/home', 'PageController@home')->name('home');

Route::get('/order', 'PageController@order')->name('order');
Route::get('/transaksi', 'PageController@transaksi')->name('transaksi');
Route::get('/menu', 'PageController@menu')->name('menu');