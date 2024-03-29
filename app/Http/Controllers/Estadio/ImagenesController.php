<?php

namespace App\Http\Controllers\Estadio;

use App\Http\Controllers\Controller;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ImagenesController extends Controller
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
                    'imagenSecundaria' => 'required',
                    'estadioId' => 'required',

                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors()->toJson(), 400);
                }
                $image_64 = $request['imagenSecundaria']; //your base64 encoded data
                $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
                $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
                // find substring fro replace here eg: data:image/png;base64,
                $image = str_replace($replace, '', $image_64);
                $image = str_replace(' ', '+', $image);
                $imageName = Str::random(10) . '.' . $extension;
                $img_val = Storage::url($imageName);
                $url_img = Storage::disk('public')->put($imageName, base64_decode($image));

                if ($url_img) {
                    $imgSecundaria = Imagen::create([
                        'ruta_img' => $img_val,
                        'estadio_id' => $request->estadioId
                    ]);
                }
                return response()->json([
                    'message' => 'Imagen del estadio registrada correctamente!',
                    'Imagen' => $imgSecundaria,

                ], 201);
            }, 5);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try {
            $imagenesSecundarias = Imagen::find($id);
            if (!$imagenesSecundarias) {
                return response()->json([
                    'success' => false
                ]);
            } else {
                $imagenesSecundarias = Imagen::where('estadio_id', $id)->get();
                foreach ($imagenesSecundarias as $imagenSecundaria) {
                    $imagenSecundaria->ruta_img = config('app.url_server') . $imagenSecundaria->ruta_img;
                }
                return response()->json([
                    'success' => true,
                    'imagenesSecundarias' => $imagenesSecundarias
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
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //
        
        try {
                $existe = Imagen::find($id)->exists();
                if ($existe) {

                return DB::transaction(function () use ($id, $request) {
                    $validator = Validator::make($request->all(), [
                        'imgSecEdit' => 'required',
                        'estadioId' => 'required',

                    ]);
                    if ($validator->fails()) {
                        return response()->json($validator->errors()->toJson(), 200);
                    }
                    
                    $image_64 = $request['imgSecEdit']; //your base64 encoded data
                    $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
                    $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
                    // find substring fro replace here eg: data:image/png;base64,
                    $image = str_replace($replace, '', $image_64);
                    $image = str_replace(' ', '+', $image);
                    $imageName = Str::random(10) . '.' . $extension;
                    $img_val = Storage::url($imageName);
                    $url_img = Storage::disk('public')->put($imageName, base64_decode($image));

                    if ($url_img) {
                        $imagenSecundariaEditar = Imagen::find($id);
                        $imagenSecundariaEditar = $imagenSecundariaEditar->update([
                            'ruta_img' => $img_val,
                        ]);
                    }
                    return response()->json([
                        'success'=>true,
                        'message' => 'Imagen del estadio actualizada correctamente!',
                        'Imagen' => $imagenSecundariaEditar,

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
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            return DB::transaction(function () use ($id) {
                $existe = Imagen::where('id', $id)->exists();
                if ($existe) {
                    $imgSecundariaDelete = Imagen::find($id)->delete();
                    if ($imgSecundariaDelete) {
                        return response()->json([
                            'success' => true,
                            'msgDelete' => "Imagen eliminada correctamente!"
                        ]);
                    } else {
                        return response()->json([
                            'success' => false,
                            'msgDelete' => "No se pudo eliminar la imagen"
                        ]);
                    }
                } else {
                    return response()->json([
                        'existe' => false
                    ]);
                }
            }, 5);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
