<?php

namespace App\Http\Middleware;

use App\Http\Middleware;
use App\Http\Request;
use App\Library\Database;
use Closure;

class PrepareDatabase implements MiddlewareInterface
{
    public function __invoke(Request $request, Closure $next, $route)
    {
        $settings = require APP_DIR . '/configurations/database.php';
        Database::setup($settings);
        return $next($request, $route);
    }
}
