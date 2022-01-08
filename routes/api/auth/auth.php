<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace'=> 'Auth'
], function ($router) {
    Route::post('login',  'AuthController@login');
    /* Route::post('logout', 'App\Http\Controllers\Auth\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\Auth\AuthController@refresh');
    Route::get('me', 'App\Http\Controllers\Auth\AuthController@me');
    Route::post('register', 'App\Http\Controllers\Auth\AuthController@register'); */

    //Route::get('paises','App\Http\Controllers\Estadios\EstadioController@')
});