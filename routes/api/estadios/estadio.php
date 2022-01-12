<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'estadio',
    'namespace'=> 'Estadio'
], function ($router) {
    Route::get('paises',  'PaisController@index');
    Route::get('ciudades', 'CiudadController@index');
    
});