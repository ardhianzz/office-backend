<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Helpers\APIResponderHelper;
use App\Models\Master\User;

class JwtMiddleware
{
    use APIResponderHelper;
    
    public function handle(Request $request, Closure $next): Response
    {
        if(is_null($token = $request->header('Authorization'))){
            return $this->failure("Token Failed");
         }
         
         $response = explode(' ', $token);
         $token = isset($response[1]) ? trim($response[1]) : '*';
 
         $user = User::where('access_token', $token)->first();
         if (is_null($user)) return $this->unauthorized();

        return $next($request);
    }
}
