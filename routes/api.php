<?php

Route::get('games/{game}/locations', 'GameController@getLocations');
Route::get('directions', 'DirectionsController@get');
