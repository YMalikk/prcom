<?php

Route::group(['module' => 'AirCraft', 'middleware' => ['web'], 'namespace' => 'App\Modules\AirCraft\Controllers'], function() {

    Route::resource('AirCraft', 'AirCraftController');

});
