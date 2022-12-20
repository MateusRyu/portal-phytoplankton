<?php

namespace App\Http;

use App\Http\Request;
use App\Http\Middleware\MiddlewareInterface;

class MiddlewareStack
{
    private $stack;
    private array $route;
    private $request;

    public function __construct(Request $request, array $route)
    {
        $this->route = $route;
        $this->request = $request;
        $this->stack = function ($request, $route) {
            return array(
                'request' => $request,
                'pattern' => $route['pattern'],
                'httpCode' => $route['parameters']['httpCode'],
                'name' => 'App\\Http\\Controllers\\'.$this->route['parameters']['controller'],
                'action' => $route['parameters']['action'],
                'arguments' => $route['parameters']['arguments'] ?? array()
            );
        };
        
        $config = require APP_DIR.'/configurations/app.php';

        $defaultsMiddleware = require APP_DIR.'/configurations/defaultMiddleware.php';
        $stack = array_merge($defaultsMiddleware, $route['middleware']);
        
        foreach ($stack as $middleware){
            $middlewareName = '\App\Http\Middleware\\'.$middleware;
            $this->addMiddleware(new $middlewareName);
        }
    }

    public function addMiddleware(MiddlewareInterface $middleware): void
    {
        $next = $this->stack;
        $request = $this->request;
        $route = $this->route;
        $this->stack = function () use ($middleware, $next, $request, $route) {
            return $middleware($request, $next, $route);
        };
    }

    public function handle(): array
    {
        return call_user_func($this->stack);
    }
}