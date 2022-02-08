<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use App\Models\Terreno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class TerrenoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $terrenos = Terreno::withCount(['estadios'])->get();
            foreach ($terrenos as $terreno) {
                $terreno->img = concatenarUrl($terreno,'img');
            }
            return response()->json(['terrenos' => $terrenos]);
        } catch (\Throwable $th) {
            return $this->capturar($th);
        }
        // mostrar todos los terrenos

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
                    'nombre_terreno' => 'required',
                    'img' => 'required',

                ],[
                    'img.required' => 'Es necesario seleccionar una imagen'
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'success' => false,
                        'errores' => $validator->errors()
                    ], 200);
                }

                $image_64 = $request['img']; //your base64 encoded data
                $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
                $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
                // find substring fro replace here eg: data:image/png;base64,
                $image = str_replace($replace, '', $image_64);
                $image = str_replace(' ', '+', $image);
                $imageName = Str::random(10) . '.' . $extension;
                $img_val = Storage::url($imageName);
                $url_img = Storage::disk('public')->put($imageName, base64_decode($image));

                if ($url_img) {
                    $terreno = Terreno::create([
                        'nombre_terreno' => $request->input('nombre_terreno'),
                        'img' => $img_val,

                    ]);
                }
                return response()->json([
                    'success' => true,
                    'message' => '¡Terreno registrado correctamente!',
                    'terreno' => $terreno,

                ], 201);
            }, 5);
        } catch (\Throwable $th) {
            throw $th;
        }
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
    public function destroy($id)
    {
        // Eliminar terrenos que no han sido utilizados anteriormente
        try {
            $terrenoDelete = Terreno::find($id);
            $terrenoDelete->delete();
            return response()->json([
                'terrenoEliminado' => true,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
