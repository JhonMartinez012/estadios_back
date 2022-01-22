<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group([
    'middleware' => ['api','cors'],
    'prefix' => 'terreno',
    'namespace'=> 'Configuracion'
], function ($router) {
    Route::get('terrenos',  'TerrenoController@index');
    Route::post('crear_terreno',  'TerrenoController@store');
    Route::put('editar_terreno/{id}', 'TerrenoController@update');
    Route::delete('eliminar_terreno/{id}','TerrenoController@destroy');
    
});