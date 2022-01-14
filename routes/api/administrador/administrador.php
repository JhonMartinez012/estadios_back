<?php

use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'api',
    'prefix' => 'administrador',
    'namespace'=> 'Administrador'
], function ($router) {
    Route::get('administradores', 'AdministradorController@index');

    //Route::post('crear_motivo',  'MotivoInactividadController@store');
    
});