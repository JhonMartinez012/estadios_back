<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group([
    'middleware' => ['auth'],//['auth']
    'prefix' => 'motivo_inactividad',
    'namespace'=> 'Configuracion'
], function ($router) {
    Route::get('motivos-inactividad',  'MotivoInactividadController@index');
    Route::post('crear-motivo',  'MotivoInactividadController@store');
    Route::put('editar-motivo/{id}', 'MotivoInactividadController@update');
    Route::delete('eliminar-motivo/{id}','MotivoInactividadController@destroy');
    
    
});