<?php

namespace App\Http\Middleware;

use Closure;

class APIToken
{
    public function handle($request, Closure $next)
    {
        if($request->header('Authorization')){
            return $next($request);
        }
        return response()->json([
            'message' => 'Not a valid API request.',
        ]);
    }
}
