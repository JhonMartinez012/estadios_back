<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => ['auth'],
    'prefix' => 'auth',
    'namespace' => 'Auth'
], function ($router) {
    Route::post('login',  'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
       
    // rutas personalizadas para los administradores
    Route::post('register', 'AuthController@register');
    Route::get('usuarios', 'AuthController@index'); 
    Route::get('administrador/{id}', 'AuthController@show');
    Route::put('editar_administrador/{id}', 'AuthController@update');
    Route::delete('eliminar_administrador/{id}', 'AuthController@destroy');
});
