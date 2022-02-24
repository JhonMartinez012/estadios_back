<?php

namespace App\Http\Controllers\Estadio;

use App\Http\Controllers\Controller;
use App\Models\Estadio;
use App\Models\Tribuna;
use GrahamCampbell\ResultType\Success;
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
                ->where('estadios.deleted_by', null)
                ->get();
            foreach ($estadios as $estadio) {
                $estadio->img_principal = concatenarUrl($estadio);
                $estadio->img =  concatenarUrl($estadio, "img");
            }
            return response()->json(['estadios' => $estadios]);
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
                $validator = Validator::make(
                    $request->all(),
                    [
                        'nombreEstadio' => 'required',
                        'acercaEstadio' => 'required',
                        'imgPrincipal' => 'required',
                        'capacidadEstadio' => 'required| integer| gt:499 | min:3',
                        'ciudadId' => 'required | integer| gt:0 ',
                        'terrenoId' => 'required | integer| gt:0  ',
                    ],
                    [
                        'nombreEstadio.required' => 'Campo nombre es obligatorio',
                        'acercaEstadio.required' => 'Campo acerca es obligatorio',
                        'imgPrincipal.required' => 'La foto es obligatoria',
                        'capacidadEstadio.required' => 'La capacidad es obligatorio',
                        'capacidadEstadio.min' => 'El minimo de capacidad es 500',
                        'capacidadEstadio.gt' => 'La capacidad es obligatoria',
                        'ciudadId.gt' => 'Campo ciudad es obligatorio',
                        'terrenoId.gt' => 'El terreno es obligatorio',
                    ]
                );
                if ($validator->fails()) {
                    return response()->json([
                        'success' => false,
                        'errores' => $validator->errors()
                    ], 200);
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
                        'capacidad_estadio' => $request['capacidadEstadio'],
                        'terreno_id' => $request->input('terrenoId'),
                        'ciudad_id' => $request->input('ciudadId'),
                    ]);
                }
                return response()->json([
                    'success' => true,
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
            $estadio = Estadio::find($id);
            if (!$estadio) {
                return response()->json([
                    'success' => false
                ]);
            } else {
                $estadio = DB::table('estadios')
                    ->join('terrenos', 'estadios.terreno_id', '=', 'terrenos.id')
                    ->join('ciudades', 'estadios.ciudad_id', '=', 'ciudades.id')
                    ->join('paises', 'ciudades.pais_id', '=', 'paises.id')
                    ->where('estadios.id', $id)
                    ->select('estadios.*', 'estadios.id as idEstadio', 'terrenos.*', 'ciudades.*', 'paises.nombre as nom_pais')
                    ->first();
                $estadio->img_principal = concatenarUrl($estadio);
                $estadio->img = concatenarUrl($estadio, "img");
                return response()->json([
                    'success' => true,
                    'estadio' => $estadio
                ]);
            }
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
    public function update($id, Request $request)
    {
        //
        try {
            $estadioExist = Estadio::where('id',$id)->exists();
            if (!$estadioExist) {
                return response()->json([
                    'exist' => false
                ]);
            } else {
                $estadioEdit= Estadio::find($id);
                return DB::transaction(function () use ($request, $estadioEdit) {
                    $validator = Validator::make($request->all(), [
                        'nombreEstadio' => 'required',
                        'acercaEstadio' => 'required',
                        'ciudadId' => 'required | integer| gt:0',
                        'terrenoId' => 'required | integer| gt:0',
                        'capacidadEstadio' => 'required| integer| gt:499 | min:3',
                        
                    ]);
                    if ($validator->fails()) {
                        return response()->json([
                            'success' => false,
                            'errores' => $validator->errors()
                        ], 200);
                    }

                    $estadioEdit=$estadioEdit->update([
                        'nombre_estadio'=>$request->nombreEstadio,
                        'acerca_estadio'=>$request->acercaEstadio,
                        'capacidad_estadio'=>$request->capacidadEstadio,
                        'terreno_id'=>$request->terrenoId ,
                        'ciudad_id'=>$request->ciudadId,
                    ]); 
                    return response()->json([
                        'success' => true,
                        'message' => '!Estadio actualizado correctamente!',
                        'estadio' => $estadioEdit,
                    ], 201);                   
                }, 5);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estadio  $estadio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            return DB::transaction(function () use ($id) {
                $tribunasDelete = DB::table('tribunas')->where('estadio_id', $id)->delete();
                if ($tribunasDelete) {
                    $tribunasDelete = "eliminado";
                }

                $motivosDelete = DB::table('estadio_motivo_inactividad')->where('estadio_id', $id)->delete();
                if ($motivosDelete) {
                    $motivosDelete = "eliminado";
                }


                if ($tribunasDelete == "eliminado" && $motivosDelete == "eliminado") {
                    $estadioDelete = Estadio::find($id)->delete();
                    if ($estadioDelete) {
                        return response()->json([
                            "delete" => true
                        ]);
                    } else {
                        return response()->json([
                            "delete" => true
                        ]);
                    }
                }
            }, 5);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
