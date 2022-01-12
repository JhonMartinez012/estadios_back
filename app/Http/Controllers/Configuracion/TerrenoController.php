<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use App\Models\Terreno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TerrenoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Terreno  $terreno
     * @return \Illuminate\Http\Response
     */
    public function show(Terreno $terreno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Terreno  $terreno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Terreno $terreno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Terreno  $terreno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Terreno $terreno)
    {
        //
    }
}
