<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group([
    'middleware' => 'api',
    'prefix' => 'motivo_inactividad',
    'namespace'=> 'Configuracion'
], function ($router) {
    Route::get('motivos_inactividad',  'MotivoInactividadController@index');
    Route::post('crear_motivo',  'MotivoInactividadController@store');
    
});