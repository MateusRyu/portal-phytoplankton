<?php

namespace App\Http\Middleware;

use App\Http\Request;
use App\Http\Controllers\ErrorController;
use App\Library\Session;
use App\Models\Realiza;
use Closure;

class IsRegisterOwner implements MiddlewareInterface
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
        $list = new Realiza();
        preg_match($route['pattern'], $request->getUri(), $id);
        $owner = $list->getRegisterOwner($id[1]);
        
        if (!$owner) {
            $this->return404();
        }

        if ($user['id'] == $owner['userId'] && $owner['role'] == 'autor') {
            return $next($request, $route);
        }
        $this->return404();
    }
}