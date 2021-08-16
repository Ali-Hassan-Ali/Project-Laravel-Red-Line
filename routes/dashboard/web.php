<?php

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
function () {

    Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

        Route::get('/', 'WelcomController@index')->name('welcome');

        //user routes
        Route::resource('users', 'UserController')->except(['show']);

        //clients routes
        Route::resource('clients', 'ClientController');

        //admin routes
        Route::resource('admin', 'AdminController')->except(['show','create','delete','index']);

        //categoreys routes
        Route::resource('categoreys', 'CategoreyController')->except(['show']);

        //products routes
        Route::resource('products', 'ProductController')->except(['show']);

        //cupons routes
        Route::resource('cupons', 'CuponController')->except(['show']);

        //cupons routes
        Route::resource('orders', 'OrderController')->except(['create']);
        Route::put('orders.status{id}', 'OrderController@status')->name('orders.status');

        //products routes
        Route::resource('gallerys', 'GalleryController')->except(['show']);

        //products routes
        Route::resource('supports', 'SupportController')->except(['show']);

        //payments routes
        Route::resource('payments', 'PaymentController')->except(['show']);

        //settings routes
        Route::post('settings.store', 'SettingController@store')->name('settings.store');
        Route::get('service_index', 'SettingController@service_index')->name('service.index');
        Route::get('contact_us', 'SettingController@contact_index')->name('contact_us.index');
        Route::get('social_links', 'SettingController@social_links')->name('social_links.index');

    }); //end of dashboard routes

});//LaravelLocalization
