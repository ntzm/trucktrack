<?php

Route::group(['prefix' => 'deliveries', 'middleware' => 'auth', 'as' => 'deliveries.'], function () {
    Route::get('/', 'DeliveryController@index')->name('index');
    Route::get('create', 'DeliveryController@create')->name('create');
    Route::get('{delivery}', 'DeliveryController@show')->name('show');
    Route::post('store', 'DeliveryController@store')->name('store');
});

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Auth::routes();
