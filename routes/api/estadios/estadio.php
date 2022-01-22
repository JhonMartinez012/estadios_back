<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'estadio',
    'namespace' => 'Estadio'
], function ($router) {
    Route::get('listar_estadios',  'EstadioController@index');
    Route::get('ver_estadio/{id}',  'EstadioController@show');

    Route::get('paises',  'PaisController@index');
    Route::get('ciudades', 'CiudadController@getCiudades');
    Route::post('crear_estadio', 'EstadioController@store');

    Route::get("listar_tribunas",'TribunaController@index');
    Route::post('crear_tribuna', 'TribunaController@store');
});
