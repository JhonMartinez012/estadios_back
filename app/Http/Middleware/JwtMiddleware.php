<?php
namespace App\Http\Middleware;
use JWTAuth;
use Closure;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
class JwtMiddleware extends BaseMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
            return $next($request);
        } catch (\Tymon\JWTAuth\Exceptions\TokenBlacklistedException $e) {
            return response(['status' => 'Token invalido'], 401);
        }
        catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response(['status' => 'Token invalido'], 401);
        }
        catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response(['status' => 'El token ha expiradooooo'], 403);
        }
        catch (\Tymon\JWTAuth\JWTException $e) {
            return response(['status' => 'Token invalido'], 401);
        }
        catch (Exception $e) {
            return response(['status' => 'El token no ha sido encontradoooo'], 401);
        }
    }
}