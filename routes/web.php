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
    Route::get('/', 'HomeController@index')->name('/');

    //profile rout
    Route::get('/profile/{id}', 'UserrController@profile')->name('profile')->middleware('auth');
    Route::put('/update_prfile/{id}', 'UserrController@update_prfile')->name('update_prfile')->middleware('auth');

    Auth::routes();

});//LaravelLocalization
