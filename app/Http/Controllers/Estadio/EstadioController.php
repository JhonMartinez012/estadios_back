<?php

namespace App\Http\Controllers\Estadio;

use App\Http\Controllers\Controller;
use App\Models\Estadio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EstadioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $estadios = DB::table('estadios')
                ->join('terrenos', 'estadios.terreno_id', '=', 'terrenos.id')
                ->select('estadios.*', 'terrenos.img')
                ->get();
            foreach ($estadios as $estadio) {
                $estadio->img_principal = config('app.url_server') . $estadio->img_principal;
                $estadio->img = config('app.url_server') . $estadio->img;
            }
            return response()->json(['estadios'=>$estadios]);
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
                    'nombreEstadio' => 'required',
                    'acercaEstadio' => 'required',
                    'imgPrincipal' => 'required',
                    'capacidadEstadio'=>'required',
                    'ciudadId' => 'required',
                    'terrenoId' => 'required',
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors()->toJson(), 400);
                }
                $image_64 = $request['imgPrincipal']; //your base64 encoded data
                $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
                $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
                // find substring fro replace here eg: data:image/png;base64,
                $image = str_replace($replace, '', $image_64);
                $image = str_replace(' ', '+', $image);
                $imageName = Str::random(10) . '.' . $extension;
                $img_principal = Storage::url($imageName);
                $url_img = Storage::disk('public')->put($imageName, base64_decode($image));
                if ($url_img) {
                    $estadio = Estadio::create([
                        'nombre_estadio' => $request->input('nombreEstadio'),
                        'acerca_estadio' => $request->input('acercaEstadio'),
                        'img_principal' => $img_principal,
                        'capacidad_estadio'=>$request['capacidadEstadio'],
                        'terreno_id' => $request->input('terrenoId'),
                        'ciudad_id' => $request->input('ciudadId'),
                    ]);
                }
                return response()->json([
                    'exito'=>true,
                    'message' => 'Estadio registrado correctamente!',
                    'Estadio' => $estadio,
                    'id' => $estadio->id,

                ], 201);
            }, 5);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estadio  $estadio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //       
        try {
            $estadio = DB::table('estadios')
                ->join('terrenos', 'estadios.terreno_id', '=', 'terrenos.id')
                ->join('ciudades', 'estadios.ciudad_id', '=', 'ciudades.id')
                ->join('paises','ciudades.pais_id','=','paises.id')
                ->where('estadios.id', $id)
                ->select('estadios.*', 'terrenos.*', 'ciudades.*','paises.nombre as nom_pais')
                ->first();
            $estadio->img_principal = config('app.url_server') . $estadio->img_principal;
            $estadio->img = config('app.url_server') . $estadio->img;
            return response()->json(['estadio'=>$estadio]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estadio  $estadio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estadio $estadio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estadio  $estadio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estadio $estadio)
    {
        //
    }
}
