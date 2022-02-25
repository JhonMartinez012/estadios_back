<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'estadio',
    'namespace' => 'Estadio'
], function ($router) {
    //rutas para el estadio 
    Route::get('listar-estadios',  'EstadioController@index');
    Route::get('ver-estadio/{id}',  'EstadioController@show');
    Route::post('crear-estadio', 'EstadioController@store');
    Route::put('editar-estadio/{id}', 'EstadioController@update');
    Route::delete('eliminar-estadio/{id}', 'EstadioController@destroy');


    //Rutas para listar los paises y ciudades
    Route::get('paises',  'PaisController@index');
    Route::get('ciudades', 'CiudadController@getCiudades');

    //Rutas para gestionar las tribunas
    Route::get('listar-tribunas/{id}','TribunaController@show');
    Route::post('crear-tribuna', 'TribunaController@store');
    Route::put('editar-tribuna/{id}', 'TribunaController@update');
    Route::delete('eliminar-tribuna/{id}', 'TribunaController@destroy');
    
    //rutas para gestionar las imagenes secundarias de los estadios
    Route::post('guardar-imagenes-secundarias', 'ImagenesController@store');
    Route::get('imagenes-secundarias/{id}','ImagenesController@show');
    Route::put('editar-imagenes-secundarias/{id}','ImagenesController@update');
    Route::delete('eliminar-imagen-secundaria/{id}', 'ImagenesController@destroy');


    // Rutas para gestionar inactivar los dias de los estadios
    Route::post('inactivar-dia-estadio','EstadioMotivoInactividadController@store');
    Route::get('listar-dias-inactivos/{id}','EstadioMotivoInactividadController@show');
    Route::delete('habilitar-dia-inactivo/{id}','EstadioMotivoInactividadController@destroy');






});
