<?php
use App\Kernel;
use App\Http\Router;
use App\Http\Request;

require_once __DIR__ . '/../vendor/autoload.php';

$kernel = new Kernel();
$kernel->run(new Router, new Request);
exit();
