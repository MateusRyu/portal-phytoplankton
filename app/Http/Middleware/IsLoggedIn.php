<?php

namespace App\Http\Middleware;

use App\Http\Request;
use App\Library\Session;
use App\Http\Controllers\Controller;
use Closure;

class IsLoggedIn implements MiddlewareInterface
{
    public function __invoke(Request $request, Closure $next, $route)
    {
        $session = Session::authenticateSession();
        if ($session){
            $route['parameters']['arguments'] = (isset($route['parameters']['arguments']))?$route['parameters']['arguments']:[];
            if ($session == Session::$closed) {
                array_push($route['parameters']['arguments'],  ['session'=>'closed']);
                return $next($request, $route);
            }
            array_push($route['parameters']['arguments'], [
                'id' => $session['id'],
                'username' => $session['username'],
                'role' => $session['role'],
            ]);
            return $next($request, $route);
        }
        $config = require(APP_DIR.'/configurations/app.php');
        $baseUrl = $config['url'];
        $replace = true;
        header('Location: '.$baseUrl.'/sem-sessao', $replace, 303);
        exit();        
    }
}