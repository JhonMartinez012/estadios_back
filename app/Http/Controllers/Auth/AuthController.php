<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

//use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function index()
    {
        try {
            $administradores = User::get();
            foreach ($administradores as $administrador) {
                $administrador->img = config('app.url_server') . $administrador->img;
            }
            return response()->json(['administradores'=>$administradores]);
        } catch (\Throwable $th) {
            return $this->capturar($th);
        }
    }

    public function login()
    {

        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'No autorizado'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function register(Request $request)
    {
        try {
            
            return DB::transaction(function () use ($request) {

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'lastName' => 'required',
                    'phone' => 'required|string|max:10',
                    'acerca' => 'required',
                    'email' => 'required|string|email|max:100',
                    'password' => 'required|string|min:6',
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors()->toJson(), 400);
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
                    $user = User::create(array_merge(
                        $validator->validate(),
                        [   'last_name'=> $request->lastName,
                            'password' => bcrypt($request->password),
                            'img' => $img_val,
                        ]
                    ));
                }
                return response()->json([
                    'message' => '¡Usuario registrado correctamente!',
                    'user' => $user,
                ], 201);
            }, 5);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show($id)
    {
        //
        try {
            $administrador = User::find($id);
            $administrador->img = config('app.url_server') . $administrador->img;
            if ($administrador) {
                return response()->json(['administrador'=>$administrador]);
            }else{
              return "Usuario no encontrado";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update($id,Request $request)
    {
        try {
            $administrador = User::find($id);
            return DB::transaction(function () use ($request, $administrador) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'lastName' => 'required',
                    'phone' => 'required|string|max:10',
                    'acerca' => 'required',
                    'email' => 'required|string|email|max:100',                    

                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors()->toJson(), 400);
                }
                $administrador = $administrador->update([                    
                    'name' => $request->name,
                    'last_name' => $request->lastName,
                    'phone' => $request->phone,
                    'acerca' => $request->acerca,
                    'email' => $request->email,
                ]);
                return response()->json([
                    'message' => '!Administrador Actualizado correctamente!',
                    'Administrador' => $administrador,

                ], 201);
            }, 5);
        } catch (\Throwable $th) {
            return $this->capturar($th);
        }
    }
    public function destroy($id)
    {
        // Eliminar usuarios
        try {
            $administrador = User::find($id);
            $administrador->delete();
            return response()->json(['administrador'=>'Administrador eliminado!']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
