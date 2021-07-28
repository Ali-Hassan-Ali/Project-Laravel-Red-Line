<?php

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
function () {

    Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

        Route::get('/', 'WelcomController@index')->name('welcome');

        //user routes
        Route::resource('users', 'UserController')->except(['show']);

        //categoreys routes
        Route::resource('categoreys', 'CategoreyController')->except(['show']);

        //products routes
        Route::resource('products', 'ProductController')->except(['show']);

        //products routes
        Route::resource('gallerys', 'GalleryController')->except(['show']);

        //products routes
        Route::resource('supports', 'SupportController');

        Route::post('settings.store', 'SettingController@store')->name('settings.store');
        Route::get('service_index', 'SettingController@service_index')->name('service.index');

    }); //end of dashboard routes

});//LaravelLocalization
