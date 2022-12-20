<?php

namespace App\Http\Middleware;

use App\Http\Request;
use App\Http\View;
use \Closure;

class PrepareView implements MiddlewareInterface
{
    public function __invoke(Request $request, Closure $next, $route)
    {
        View::setup();
        return $next($request, $route);
        
    }
}