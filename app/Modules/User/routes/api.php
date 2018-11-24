<?php

/*Route::group(['module' => 'User', 'middleware' => ['api'], 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::resource('User', 'UserController');

});*/

Route::group(['prefix' => 'api/auth','module' => 'User', 'namespace' => 'App\Modules\User\Controllers'], function() {
    Route::post('login', 'UserController@login');
    Route::post('signup', 'UserController@signup');

    //admin signin
    Route::post('admin_login', 'AdminController@adminLogin');

});

Route::group(['prefix' => 'api', 'middleware' => 'auth:api','module' => 'User', 'namespace' => 'App\Modules\User\Controllers'], function() {
    Route::get('user', 'UserController@user');
});

//admin routes

Route::group(['prefix' => 'api', 'middleware' => ['auth:api','admin'],'module' => 'User', 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::get('users', 'AdminController@getUsers');
    Route::get('user/{id}','AdminController@getUserById');
    Route::post('user/add','AdminController@addUser');
    Route::post('user/edit/{id}','AdminController@editUser');
    Route::get('user/delete/{id}','AdminController@deleteUser');
    Route::get('user/restore/{id}','AdminController@restoreUser');

});



