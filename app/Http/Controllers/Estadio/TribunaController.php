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
        try {
            $tribunas=Tribuna::get();
            return response()->json($tribunas);
        } catch (\Throwable $th) {
            throw $th;
        }
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
                    'nombre_tribuna' => 'required',
                    'capacidad' => 'required|numeric',
                    'valor_boleta' => 'numeric|required',
                    'estadio_id' => 'required|numeric',
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors()->toJson(), 400);
                }
                $tribuna=Tribuna::create([
                    'nombre_tribuna'=>$request->input('nombre_tribuna'),
                    'capacidad'=>$request->capacidad,
                    'valor_boleta'=>$request->valor_boleta,
                    'estadio_id'=>$request->estadio_id,
                ]);
                if($tribuna){
                    return response()->json([
                        'message' => 'tribuna registrado correctamente!',
                        'Tribuna' => $tribuna,
                    ], 201);
                }
            },5);
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
    public function show(Tribuna $tribuna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tribuna  $tribuna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tribuna $tribuna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tribuna  $tribuna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tribuna $tribuna)
    {
        //
    }
}
