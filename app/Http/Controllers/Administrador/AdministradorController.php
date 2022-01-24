<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar todos los administradores
        
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        /* try {
            $administrador = User::find($id);
            $administrador->img = config('app.url_server') . $administrador->img;
            if ($administrador) {
                return response()->json($administrador);
            }else{
              return "Usuario no encontrado";
            }
        } catch (\Throwable $th) {
            throw $th;
        } */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        try {
            $administrador = User::find($id);
            return DB::transaction(function () use ($request, $administrador) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'last_name' => 'required',
                    'phone' => 'required|string|max:10',
                    'acerca' => 'required',
                    'email' => 'required|string|email|max:100',                    

                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors()->toJson(), 400);
                }
                $administrador = $administrador->update([                    
                    'name' => $request->input('name'),
                    'last_name' => $request->input('last_name'),
                    'phone' => $request->input('phone'),
                    'acerca' => $request->input('acerca'),
                    'email' => $request->input('email'),
                ]);
                return response()->json([
                    'message' => '!Administrador Actualizado correctamente!',
                    'Motivo' => $administrador,

                ], 201);
            }, 5);
        } catch (\Throwable $th) {
            return $this->capturar($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar usuarios
        try {
            $administrador = User::find($id);
            $administrador->delete();
            return response()->json('Administrador eliminado!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
