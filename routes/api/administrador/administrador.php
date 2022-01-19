<?php

use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'api',
    'prefix' => 'administrador',
    'namespace'=> 'Administrador'
], function ($router) {
    Route::get('administradores', 'AdministradorController@index');
    Route::get('administrador/{id}', 'AdministradorController@show');
    Route::put('editar_administrador/{id}', 'AdministradorController@update');
    Route::delete('eliminar_administrador/{id}', 'AdministradorController@destroy');
});