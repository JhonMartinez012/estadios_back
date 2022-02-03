<?php

namespace App\Http\Controllers\Estadio;

use App\Http\Controllers\Controller;
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
                    'capacidad' => 'required|numeric',
                    'valorBoleta' => 'numeric|required',
                    'estadioId' => 'required|numeric',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'succcess' => false,
                        'errores' => $validator->errors()->toJson()
                    ], 200);
                };
                $tribuna = Tribuna::create([
                    'nombre_tribuna' => $request->nombreTribuna,
                    'capacidad' => $request->capacidad,
                    'valor_boleta' => $request->valorBoleta,
                    'estadio_id' => $request->estadioId,
                ]);
                if ($tribuna) {
                    return response()->json([
                        'success'=> true,
                        'message' => 'tribuna registrado correctamente!',
                        'Tribuna' => $tribuna,
                    ], 201);
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
