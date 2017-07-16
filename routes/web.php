<?php

Route::group(['prefix' => 'deliveries', 'as' => 'deliveries.'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('create', 'DeliveryController@create')->name('create');
        Route::post('create', 'DeliveryController@store')->name('store');

        Route::group(['prefix' => '{delivery}', 'middleware' => 'can:modify,delivery'], function () {
            Route::get('edit', 'DeliveryController@edit')->name('edit');
            Route::put('/', 'DeliveryController@update')->name('update');
            Route::delete('/', 'DeliveryController@destroy')->name('destroy');
        });
    });

    Route::get('/', 'DeliveryController@index')->name('index');
    Route::get('{delivery}', 'DeliveryController@show')->name('show');
});

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('{user}', 'UserController@overview')->name('overview');
    Route::get('{user}/deliveries', 'UserController@deliveries')->name('deliveries');
});

Route::get('/', 'HomeController@index');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
