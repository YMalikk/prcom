<?php

Route::group(['module' => 'AirCraft', 'middleware' => ['api'], 'namespace' => 'App\Modules\AirCraft\Controllers'], function() {

    Route::resource('AirCraft', 'AirCraftController');

});
