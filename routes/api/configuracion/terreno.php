<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group([
    'middleware' => ['auth'],
    'prefix' => 'terreno',
    'namespace'=> 'Configuracion'
], function ($router) {
    Route::get('terrenos',  'TerrenoController@index');
    Route::post('crear-terreno',  'TerrenoController@store');
    Route::put('editar-terreno/{id}', 'TerrenoController@update');
    Route::delete('eliminar-terreno/{id}','TerrenoController@destroy');
    
    
});