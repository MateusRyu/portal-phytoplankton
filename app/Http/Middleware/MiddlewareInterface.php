<?php

namespace App\Http\Middleware;

use App\Http\Request;
use Closure;

interface MiddlewareInterface
{
    public function __invoke(Request $request, Closure $next, $route);
}