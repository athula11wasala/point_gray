<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');


    Route::group(['middleware' => ['auth']], function () {

        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::get('user-profile', 'AuthController@userProfile');

        Route::prefix('order')->group(function () {
            Route::get('/list', 'OrderController@index');
            Route::delete('/delete/{id}', 'OrderController@deleteOrder');
            Route::put('/update/{id}', 'OrderController@updateOrder');
            Route::post('/add', 'OrderController@addDiscount');
        });

    });
});
