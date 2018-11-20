<?php

/*Route::group(['module' => 'User', 'middleware' => ['api'], 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::resource('User', 'UserController');

});*/

Route::group(['prefix' => 'api/auth','module' => 'User', 'namespace' => 'App\Modules\User\Controllers'], function() {
    Route::post('login', 'UserController@login');
    Route::post('signup', 'UserController@signup');

});

Route::group(['prefix' => 'api','module' => 'User', 'namespace' => 'App\Modules\User\Controllers'], function() {
    Route::post('getUserById', 'UserController@getUserById');
});


