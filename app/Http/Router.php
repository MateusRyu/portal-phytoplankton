<?php
namespace App\Http;

use \App\Http\Controllers\ErrorController;
use \App\Http\Request;
use \App\Http\MiddlewareStack;

class Router{
    private static $baseUrl;
    private static $prefix = '';
    private static $routeMap = [];

    public function __construct()
    {
        $config = require(APP_DIR.'/configurations/app.php');
        self::$baseUrl = $config['url'];
        self::$prefix = $config['prefix'];
        require_once APP_DIR.'/configurations/RouteMap.php';
    }
    
    public static function addRoute(string $route, array $parameters, array $middleware = []): void 
    {
        list($routePattern, $query) = self::createPattern($route);
        $method = strtoupper($parameters['method'])??null;

        self::$routeMap[] = array(
            'uri' => $route,
            'query' => $query,
            'pattern' => $routePattern,
            'method' => $method,
            'parameters' => $parameters,
            'middleware' => $middleware
        );
    }

    public static function addRouteGet(string $route, array $parameters, array $middleware = []): void
    {
        $parameters['method'] = 'get';
        Router::addRoute($route, $parameters, $middleware);
    }

    public static function addRoutePost(string $route, array $parameters, array $middleware = []): void
    {
        $parameters['method'] = 'post';
        Router::addRoute($route, $parameters, $middleware);
    }

    private static function createPattern(string $path): array
    {
        $patterns = array(
            'uri' => '/\{([\w\d]*)[\:]?([\w\d]*)?[\?]?\}/',
            'numbers' => '([\d\.]+)',
            'words' => '([a-zá-ù\-]+)',
            'mixed' => '([á-ù\w\d\-\+\.]+)'
        );
        preg_match_all($patterns['uri'], $path, $parameters);
        $callback = function($replace) use ($patterns, &$path){
            switch (explode(':',substr($replace,1,-1))[0]){
                case 'number':
                    $path = str_replace($replace, $patterns['numbers'], $path);
                    break;
                case 'words':
                    $path = str_replace($replace, $patterns['words'], $path);
                    break;
                case 'mixed':
                    $path = str_replace($replace, $patterns['mixed'], $path);
                    break;
            }
        };
        array_map($callback, $parameters[0]);
        $pattern = '/^' . str_replace('/', '\/', $path) . '[\/]?$/i';
        return array($pattern, array_combine($parameters[2], $parameters[1]));
    }

    private static function getUri(Request $request): string
    {
        $uri = $request->getUri();
        $uriExploded = strlen(self::$prefix) ? explode(self::$prefix,$uri) : [$uri];
        return end($uriExploded);
    }

    private static function handleError(int $code, string $message): void
    {
        $errorController = new ErrorController($code, $message);
        $errorView = $errorController->getView();
    }

    private function getRoute(Request $request): array
    {
        $uriExploded = explode('?', self::getUri($request));
        $uri = rawurldecode($uriExploded[0]);
        $httpMethod = $request->getHttpMethod();

        foreach(self::$routeMap as $route => $parameters){
            if (preg_match($parameters['pattern'], $uri)){
                if ($httpMethod == $parameters['method']){
                    return $parameters;
                }
                $error405 = true;
            }
        }
        isset($error405)?self::handleError(405, 'Método não permitido'):self::handleError(404, 'Página não encontrada');
    }

    public function handleRequest($request): void
    {
        $route = $this->getRoute($request);
        $middlewareStack = new MiddlewareStack($request, $route);
        $routeParameters = $middlewareStack->handle();
        $this->executeController($routeParameters);
    }

    public function executeController(array $controller): void
    {
        $uri = substr(rawurldecode($controller['request']->getUri()),strlen(self::$prefix));
        preg_match_all($controller['pattern'], $uri, $parameters);
        array_shift($parameters);
        foreach (array_reverse($parameters) as list($parameter)){
            array_unshift($controller['arguments'], $parameter);
        }
        if(method_exists($controller['name'], $controller['action'])){
            try {
                call_user_func_array(array(
                    new $controller['name'], 
                    $controller['action']), 
                    $controller['arguments']
                );                
            } catch (\Error $error) {
                if (DEBUG) {
                    $response = "<h1>Catch error 501</h1>";
                    $response .= "Error code: ".$error->getCode().'<br>';
                    $response .= "File: ".$error->getFile().'<br>';
                    $response .= "Line: ".$error->getline().'<br>';
                    $response .= "Previous: ".$error->getPrevious().'<hr>';
                    $response .= "Message: <pre>".$error->getMessage()."</pre><hr>";
                    $response .= "Trace: <pre>".$error->getTraceAsString()."</pre><hr>";
                    echo $response;
                    exit();
                } 
                self::handleError(501, 'Método ainda não implementado');
            }
        }
        self::handleError(501, 'Método ainda não implementado');
    }
}