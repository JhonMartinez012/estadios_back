<?php

namespace App\Http\Controllers\Estadio;

use App\Http\Controllers\Controller;
use App\Models\EstadioMotivoInactividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EstadioMotivoIncatividadController extends Controller
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
        try {            
            return DB::transaction(function () use ($request) {
                $validator = Validator::make($request->all(), [
                   
                    'estadio_id'=> 'required',
                    'motivo_inactividad_id'=>'required',
                    'fecha'=>'required',
                ],[
                    'nombre_motivo.required' => 'Campo motivo es obligatorio',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'success'=> false,
                        'error' => $validator->errors(),                        
                    ], 200);
                };

                $motivo_inactividad = EstadioMotivoInactividad::create([
                    'nombre_motivo' => $request->input('nombre_motivo'),
                ]);
                return response()->json([
                    'success' => true,
                    'message' => '!Motivo registrado correctamente!',                    
                    'Motivo' => $motivo_inactividad,

                ], 201);
            }, 5);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EstadioMotivoInactividad  $estadioMotivoInactividad
     * @return \Illuminate\Http\Response
     */
    public function show(EstadioMotivoInactividad $estadioMotivoInactividad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EstadioMotivoInactividad  $estadioMotivoInactividad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstadioMotivoInactividad $estadioMotivoInactividad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EstadioMotivoInactividad  $estadioMotivoInactividad
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadioMotivoInactividad $estadioMotivoInactividad)
    {
        //
    }
}
