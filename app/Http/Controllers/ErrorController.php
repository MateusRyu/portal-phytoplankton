<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\View;
use App\Http\Response;

class ErrorController extends Controller
{
    private $code;
    private $message;

    function __construct($code, $message='')
    {
        $this->code = $code;
        $this->message = $message;        
    }

    public function getView(): void
    {
        $viewName = 'pages/error/';
        switch ($this->code) {
            case 404:
                $viewName .= '404';
                break;
            case 405:
                $viewName .= '405';
                break;
            case 501:
                $viewName .= '501';
                break;
            default:
                $viewName .= '404';
                break;
        }
        
        $ErrorResponse = new Response(new View($viewName), $this->code);
        $ErrorResponse->sendResponse();
        exit();
    }
}
