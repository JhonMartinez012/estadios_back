<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'estadio',
    'namespace' => 'Estadio'
], function ($router) {
    //rutas para el estadio 
    Route::get('listar_estadios',  'EstadioController@index');
    Route::get('ver_estadio/{id}',  'EstadioController@show');
    Route::post('crear_estadio', 'EstadioController@store');

    //Rutas para listar los paises y ciudades
    Route::get('paises',  'PaisController@index');
    Route::get('ciudades', 'CiudadController@getCiudades');

    //Rutas para gestionar las tribunas
    Route::get('listar_tribunas/{id}','TribunaController@show');
    Route::post('crear_tribuna', 'TribunaController@store');
    Route::put('editar_tribuna/{id}', 'TribunaController@update');
    Route::delete('eliminar_tribuna/{id}', 'TribunaController@destroy');
    
    //rutas para gestionar las imagenes secundarias de los estadios
    Route::post('guardar-imagenes-secundarias', 'ImagenesController@store');
    Route::get('imagenes-secundarias/{id}','ImagenesController@show');



});
