<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckAdminToken
{
    
    use GeneralTrait;
    public function handle($request, Closure $next)

            {

            try {

            $user = JWTAuth::parseToken()->authenticate();

            if( !$user ) throw new Exception('User Not Found');

            } catch (Exception $e) {

            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){

            
                return $this ->returnError('E3001','Token Invalid');

            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){

            

            return $this ->returnError('E3001','Expired_Token');


            }

            else{

                return $this ->returnError('E3001','Token_NotFound');


            }
        

            if(!user)
             $this ->returnError('E3001','Token_NotFound');


            return $next($request);
            

        }


           
    }  

}
