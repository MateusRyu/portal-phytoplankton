<?php

namespace App\Http\Middleware;

use App\Http\Request;
use App\Http\Controllers\PagesController;
use App\Library\Session;
use Closure;

class IsLoggedOut implements MiddlewareInterface
{
    public function __invoke(Request $request, Closure $next, $route)
    {
        $session = Session::authenticateSession();
        if ($session == false){
            return $next($request, $route);
        }
        $config = require(APP_DIR.'/configurations/app.php');
        $url = $config['url'].'/registros';
        $replace = true;
        header('Location: '.$url, $replace, 303);
        exit();
    }
}