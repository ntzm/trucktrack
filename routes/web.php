<?php

Route::group(['prefix' => 'deliveries', 'as' => 'deliveries.'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('create', 'DeliveryController@create')->name('create');
        Route::post('create', 'DeliveryController@store')->name('store');
    });

    Route::get('/', 'DeliveryController@index')->name('index');
    Route::get('{delivery}', 'DeliveryController@show')->name('show');
});

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('{user}', 'UserController@overview')->name('overview');
    Route::get('{user}/deliveries', 'UserController@deliveries')->name('deliveries');
});

Route::get('/', 'HomeController@index');

Auth::routes();
