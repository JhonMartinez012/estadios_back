<?php

namespace App\Http\Controllers\Estadio;

use App\Http\Controllers\Controller;
use App\Models\Estadio;
use App\Models\Tribuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TribunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* try {
            $tribunas=Tribuna::get();
            return response()->json($tribunas);
        } catch (\Throwable $th) {
            throw $th;
        } */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                $validator = Validator::make($request->all(), [
                    'nombreTribuna' => 'required',
                    'capacidad' => 'required|numeric|min:500',
                    'valorBoleta' => 'required|numeric|min:1000',
                    'estadioId' => 'required|numeric',
                ], [
                    'nombreTribuna.required' => 'Nombre de tribuna es obligatorio',
                    'capacidad.required' => 'Ingrese una capacidad mayor o igual a 500',
                    'capacidad.min' => 'La capacidad mínima de la tribuna es 500',
                    'valorBoleta.required' => 'Ingrese un valor mayor a $1.000 pesares',
                    'valorBoleta.min' => 'El valor mínimo de una boleta es $1000'

                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'success' => false,
                        'errores' => $validator->errors()
                    ], 200);
                };

                $capacidadEstadio = DB::table('estadios')
                    // ->select('capacidad_estadio')
                    ->where('id', $request->estadioId)
                    ->pluck('capacidad_estadio');

                $capacidadOcupada = DB::table('tribunas')
                    ->select('capacidad')
                    ->where('estadio_id', $request->estadioId)
                    ->where('deleted_by', null)
                    ->get()
                    ->groupBy('estadio_id')
                    ->values()->map(function ($value, $key) {
                        $total = 0;
                        foreach ($value as $itercion) {
                            $total += $itercion->capacidad;
                        }
                        return [
                            'total' => $total
                        ];
                    });


                // return $capacidadEstadio[0]-$capacidadOcupada[0]['total'];

                $capacidadLibre = ($capacidadEstadio[0] - $capacidadOcupada[0]['total']);
                //return response()->json(["capaLib"=>$capacidadLibre]);


                if ($capacidadLibre > $request->capacidad) {
                    $tribuna = Tribuna::create([
                        'nombre_tribuna' => $request->nombreTribuna,
                        'capacidad' => $request->capacidad,
                        'valor_boleta' => $request->valorBoleta,
                        'estadio_id' => $request->estadioId,
                    ]);
                    if ($tribuna) {
                        return response()->json([
                            'success' => true,
                            'message' => 'tribuna registrado correctamente!',
                            'Tribuna' => $tribuna,
                        ], 201);
                    }
                } else {
                    return response()->json([
                        'capacidad' => false,
                        'message' => 'Número máximo de espectadores es: ' . $capacidadEstadio[0],
                    ]);
                }
            }, 5);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tribuna  $tribuna
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try {
            $tribunas = Tribuna::where('estadio_id', $id)->get();
            if ($tribunas) {
                return response()->json(['tribunas' => $tribunas]);
            } else {
                return "No tiene tribunas asignadas";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tribuna  $tribuna
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        try {
            $tribuna = Tribuna::find($id);
            if ($tribuna) {
                return DB::transaction(function () use ($request, $tribuna) {
                    $validator = Validator::make($request->all(), [
                        'nombreTribuna' => 'required',
                        'capacidad' => 'required|numeric',
                        'valorBoleta' => 'required|numeric',
                    ]);
                    if ($validator->fails()) {
                        return response()->json($validator->errors()->toJson(), 400);
                    }
                    $tribuna = $tribuna->update([
                        'nombre_tribuna' => $request->nombreTribuna,
                        'capacidad' => $request->capacidad,
                        'valor_boleta' => $request->valorBoleta,
                    ]);
                    return response()->json([
                        'message' => '!Tribuna Actualizada correctamente!',
                        'actualizado' => true,
                    ], 201);
                }, 5);
            }else{
                return response()->json([
                    'existe'=>'La tribuna que busca no existe'
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tribuna  $tribuna
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tribunaDelete = Tribuna::find($id);
            $tribunaDelete->delete();
            return response()->json([
                'tribunaEliminada' => true
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
