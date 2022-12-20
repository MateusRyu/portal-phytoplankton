<?php
namespace App;

use \App\Http\Router;
use \App\Http\Request;
use \App\Http\Response;
use \App\Http\View;

class Kernel
{
    public function __construct()
    {
        $this->bootstrap();
    }

    public function run(Router $Router, Request $Request): void
    {
        try {
            ob_start();
            $view = $Router->handleRequest($Request);
            ob_end_flush();  
        } catch (\Exception $error) {
            http_response_code(500);
            $config = require APP_DIR."/configurations/app.php";
            if ($config['debug']) {
                $response = "<h1>Catch error 500</h1>";
                $response .= "Error code: ".$error->getCode().'<br>';
                $response .= "File: ".$error->getFile().'<br>';
                $response .= "Line: ".$error->getline().'<br>';
                $response .= "Previous: ".$error->getPrevious().'<hr>';
                $response .= "Message: <pre>".$error->getMessage()."</pre><hr>";
                $response .= "Trace: <pre>".$error->getTraceAsString()."</pre><hr>";
                echo $response;
            }
            echo 'Ocorreu um problema no servidor. Não será possível acessar o site por algum momento.<br>';
        } 
    }

    private function bootstrap(): void
    {
        date_default_timezone_set('America/Sao_Paulo');
        define('APP_DIR', __DIR__);
        $config = require APP_DIR .'/configurations/app.php';
        define('DEBUG', $config['debug']);
        View::setup();

        if ($config['debug']){
            error_reporting(E_ALL | E_STRICT);
            ini_set('display_errors', 1);
        }else{
            error_reporting(0);
            ini_set('display_errors', 0);
        }
    }
}