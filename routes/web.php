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

// Route::get('/', 'HomeController@index');

Auth::routes();

Route::permanentRedirect('/home', '/')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::feeds();

Route::get('/{any}', 'SPAController@index')->where('any', '.*');