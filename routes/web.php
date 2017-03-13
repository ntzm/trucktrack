<?php

Route::group(['prefix' => 'deliveries', 'middleware' => 'auth', 'as' => 'deliveries.'], function () {
    Route::get('/', 'DeliveryController@index')->name('index');
    Route::get('create', 'DeliveryController@create')->name('create');
    Route::get('{delivery}', 'DeliveryController@show')->name('show');
    Route::post('store', 'DeliveryController@store')->name('store');
});

Auth::routes();
