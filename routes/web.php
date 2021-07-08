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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
function () {


    //home route
    Route::get('/', 'WelcomController@index')->name('/');

    //profile rout
    Route::get('/profile/{id}', 'UserrController@profile')->name('profile')->middleware('auth');
    Route::put('/update_prfile/{id}', 'UserrController@update_prfile')->name('update_prfile')->middleware('auth');

    //profile rout
    Route::get('/show/{id}', 'WelcomController@show')->name('show');

    //profile rout
    Route::get('/cart', 'ProductController@index')->name('wallet.index');
    Route::post('/wallet/{product}', 'ProductController@add_card')->name('wallet.store');
    Route::delete('/wallet/{id}', 'ProductController@destroy')->name('wallet.delete');

    Auth::routes();

});//LaravelLocalization
