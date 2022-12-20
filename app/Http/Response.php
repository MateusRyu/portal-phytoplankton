<?php

namespace App\Http;

class Response
{
    private $httpCode;
    private $headers = [];
    private $contentType;
    private $contentResponse;

    public function __construct($contentResponse, int $httpCode = 200, string $contentType = 'text/html')
    {
        $this->contentResponse = $contentResponse;
        $this->setContentType($contentType);
        $this->httpCode = $httpCode;
        $this->addHeader('X-XSS-Protection' ,'1; mode=block');
    }

    private function setContentType(string $contentType) :void
    {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    public function setHttpCode(int $code): void
    {
        $this->httpCode = $code;
    }
    
    public function addHeader(string $key, $value) :void
    { 
        $this->headers[$key] = $value;
    }

    private function sendHeaders()
    {
        http_response_code($this->httpCode);
        foreach($this->headers as $key=>$value){
            header($key.': '.$value);
        }
    }

    public function sendResponse(): void
    {
        $this->sendHeaders();   
        switch ($this->contentType) {
            case 'text/html':
                echo $this->contentResponse;
                exit();
            case 'application/json':
                echo json_encode($this->contentResponse, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                exit();
        }
    }
}