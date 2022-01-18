<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Payload;
use App\Models\Company;

class JwtMiddleware extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            $payload = JWTAuth::getPayLoad($request->token)->toArray();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException)
            {
                return response()->json(['status' => 'Token is Invalid']);
            }
            else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
               

                try
                {
                    $refreshed = JWTAuth::refresh(JWTAuth::getToken());
                    $user = JWTAuth::setToken($refreshed)->toUser();

                    Company::where('id', JWTAuth::getPayLoad($request->token)->toArray()['sub'])->update(['name'=>$name, 'token'=>$refreshed]);
                    $request->headers->set('Authorization', 'Bearer '.$refreshed);
                }
                catch (JWTException $e)
                {
                    return response()->json([
                        'code' => 103,
                        'message' => 'Token cannot be refreshed'
                    ]);
                }
            }
            else
            {
                // dd($request);
                return response()->json(['status' => ' Token not found']);
            }
        }


        return $next($request);
    }
}
