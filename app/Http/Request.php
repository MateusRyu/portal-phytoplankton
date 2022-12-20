<?php

namespace App\Http;

class Request
{
    private $httpMethod;
    private $uri;
    public $parameters;
    private $headers;

    public function __construct(array $globals = []){
        $getMethod = $globals['get'] ?? $_GET ?? [];
        $postMethod = $globals['post'] ?? $_POST ?? [];
        $this->parameters = ($postMethod===[])?$getMethod:$postMethod;
        $this->httpMethod = $globals['requestMethod'] ?? $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri = $globals['requestUri'] ?? $_SERVER['REQUEST_URI'] ?? '';

        $headers = function_exists('getallheaders') ? getallheaders() : [];
        $this->headers = $globals['headers'] ?? $headers;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getHttpMethod(): string
    {
        return $this->httpMethod;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }
}