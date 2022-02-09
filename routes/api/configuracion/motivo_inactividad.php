<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group([
    'middleware' => ['auth'],//['auth']
    'prefix' => 'motivo_inactividad',
    'namespace'=> 'Configuracion'
], function ($router) {
    Route::get('motivos_inactividad',  'MotivoInactividadController@index');
    Route::post('crear_motivo',  'MotivoInactividadController@store');
    Route::put('editar_motivo/{id}', 'MotivoInactividadController@update');
    Route::delete('eliminarMotivo/{id}','MotivoInactividadController@destroy');
    
});