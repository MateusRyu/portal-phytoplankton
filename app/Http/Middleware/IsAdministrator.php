<?php

namespace App\Http\Middleware;

use App\Http\Request;
use App\Http\Controllers\ErrorController;
use App\Library\Session;
use App\Models\Usuario;
use Closure;

class IsAdministrator implements MiddlewareInterface
{
    private function return404(): void
    {
        $errorController = new ErrorController(404);
        $errorView = $errorController->getView();
        exit();
    }

    public function __invoke(Request $request, Closure $next, $route)
    {
        $user = Session::getUser();
        if ($user == false) {
            $this->return404();    
        }
        Usuario::setup();
        
        if ($user['role'] == Usuario::$role['administrator']) {
            return $next($request, $route);
        }
        $this->return404();
    }
}