<?php

use PHPUnit\Framework\TestCase;
use \App\Core\Kernel;
use \App\Core\Utils\LoggerFactory;
use \App\Core\Router;
use \App\Core\Http\Response;
use \App\Core\Http\Request;
use Monolog\Logger;

class RouterStub extends Router
{
    function __construct(){}

    public function handleRequest($request): Response
    {
        return new Response('a');
    }
}

class RequestStub extends Request
{
    function __construct(){}
}

class KernelTest extends TestCase
{
    public function testConstruct()
    {
        // Criar stub
        $logger = $this->createStub(LoggerFactory::class);
        $logger->method('getLogger')->willReturn(new Logger('teste'));

        $kernel = new Kernel($logger, new RouterStub);
        $this->assertSame("App\Core\Kernel", get_class($kernel));
    }

    public function testGetterResponde()
    {
        $logger = $this->createStub(LoggerFactory::class);
        $logger->method('getLogger')->willReturn(new Logger('teste'));

        $kernel = new Kernel($logger, new RouterStub);
        $response = $kernel->getResponse(new RequestStub);
        
        $this->assertSame("App\Core\Http\Response", get_class($response));
    }
}