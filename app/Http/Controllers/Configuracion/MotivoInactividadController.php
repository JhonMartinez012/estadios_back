<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use App\Models\MotivoInactividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MotivoInactividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $motivos_inactividad=MotivoInactividad::get();
        return response()->json($motivos_inactividad);
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
        try{
        $validator=Validator::make($request->all(), [
            'nombre_motivo' => 'required',            
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $motivo_inactividad=MotivoInactividad::create([
            'nombre_motivo' => $request->input('nombre_motivo'),
        ]);
        return response()->json([
            'message' => '!Motivo registrado correctamente!',
            'Motivo' => $motivo_inactividad,
            
        ], 201);
        }catch(\Throwable $th) {
            return $this->capturar($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MotivoInactividad  $motivoInactividad
     * @return \Illuminate\Http\Response
     */
    public function show(MotivoInactividad $motivoInactividad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MotivoInactividad  $motivoInactividad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MotivoInactividad $motivoInactividad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MotivoInactividad  $motivoInactividad
     * @return \Illuminate\Http\Response
     */
    public function destroy(MotivoInactividad $motivoInactividad)
    {
        //
    }
}
