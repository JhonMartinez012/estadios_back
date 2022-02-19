<?php

namespace App\Http\Controllers\Estadio;

use App\Http\Controllers\Controller;
use App\Models\Estadio;
use App\Models\EstadioMotivoInactividad;
use App\Models\MotivoInactividad;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class EstadioMotivoInactividadController extends Controller
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
                    'estadio_id' => 'required',
                    'motivo_inactividad_id' => 'required',
                    'fecha' => 'required|date',
                ], [
                    'estadio_id.required' => 'Es necesario un estadio',
                    'motivo_inactividad_id.required' => 'Es necesario un motivo',
                    'fecha.required' => 'Ingrese una fecha',
                    'fecha.date' => 'La fecha ingresada no es una fecha valida',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'success' => false,
                        'error' => $validator->errors(),
                    ], 200);
                };

                $motivoExist = EstadioMotivoInactividad::select('estadio_id', 'motivo_inactividad_id', 'fecha')
                    ->where('estadio_id', $request->estadio_id)
                    ->where('motivo_inactividad_id', $request->motivo_inactividad_id)
                    ->where('fecha', $request->fecha)
                    ->exists();

                if ($motivoExist) {
                    return response()->json([
                        'exist' => true,
                        'message' => 'Día y motivo para inactivar ya esta registrado!'
                    ],200);
                };

                $estadioFechaInactivo = EstadioMotivoInactividad::create([
                    'estadio_id' => $request->estadio_id,
                    'motivo_inactividad_id' => $request->motivo_inactividad_id,
                    'fecha' => $request->fecha,
                ]);
                return response()->json([
                    'success' => true,
                    'message' => '!Fecha de inactividad registrado correctamente!',
                    'fechaInactividad' => $estadioFechaInactivo,

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
    public function show($id)
    {
        //
        try {
            $exist = Estadio::where('id', $id)->exists();
            if (!$exist) {
                return ['message' => 'El id estadio no se encuentra registrado'];
            }

            /* $estadioMotivosIvactividad = Estadio::select('estadios.id','emi.fecha', 'motivo_inactividad_id','motivos.nombre_motivo')
            ->join('estadio_motivo_inactividad as emi','emi.estadio_id','estadios.id')
            ->join('motivos_inactividades as motivos','motivos.id','emi.motivo_inactividad_id')
            ->where('estadios.id',$id)
            ->get(); */

            $estadioMotivosIvactividad = EstadioMotivoInactividad::select('fecha', 'motivos.id as id_motivo', 'motivos.nombre_motivo')
                ->join('motivos_inactividades as motivos', 'motivos.id', 'motivo_inactividad_id')
                ->where('estadio_id', $id)
                ->get();

            return $estadioMotivosIvactividad;

            /*    return response()->json([
                'success' => true,
                'motivos' => $estadioMotivosIvactividad,
            ]); */
        } catch (\Throwable $th) {
            throw $th;
        }
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
