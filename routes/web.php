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
    Route::get('/show/{product}', 'WelcomController@show')->name('show');
    Route::get('/category/{id}', 'WelcomController@category_show')->name('category.show');
    Route::get('/shop', 'WelcomController@shop')->name('shop.show');

    //profile rout
    Route::get('/cart', 'ProductController@index')->name('wallet.index');
    Route::post('/wallet/{product}', 'ProductController@add_card')->name('wallet.store');
    Route::delete('/wallet/{id}', 'ProductController@destroy')->name('wallet.delete');

    //login rout
    Route::get('login/{provider}', 'LoginController@redirectToProvider')->where('provider', 'facebook|google');
    Route::get('login/{provider}/callback', 'LoginController@handleProviderCallback')->where('provider', 'facebook|google');

    Auth::routes();

    Route::get('/clear', function() {

       Artisan::call('cache:clear');
       Artisan::call('config:clear');
       Artisan::call('config:cache');
       Artisan::call('view:clear');
       Artisan::call('view:cache');

       return "Cleared!";

    });

});//LaravelLocalization
