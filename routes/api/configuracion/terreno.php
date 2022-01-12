<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group([
    'middleware' => 'api',
    'prefix' => 'terreno',
    'namespace'=> 'Configuracion'
], function ($router) {
    //Route::get('terrenos',  'TerrenoController@index');
    Route::post('crear_terreno',  'TerrenoController@store');
    /* Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
    Route::post('register', 'AuthController@register'); */
});