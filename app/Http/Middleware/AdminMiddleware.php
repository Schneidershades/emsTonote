<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Traits\Api\ApiResponder;

class AdminMiddleware
{
    use ApiResponder;

    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role != 'Admin'){
            return $this->errorResponse('you are not authorized to use this application', 409);
        }
        
        return $next($request);
    }
}
