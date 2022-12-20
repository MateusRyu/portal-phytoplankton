<?php

use PHPUnit\Framework\TestCase;
use \App\Core\Http\Request;

class RequestTest extends TestCase
{
    public function testConstruct()
    {
        $request = new Request();
        $this->assertSame("App\Core\Http\Request", get_class($request));
    }

    public function testGetterUri()
    {
        $expected = '/index.html';
        $globals['requestUri'] = $expected;
        $request = new Request($globals);
        $actual = $request->getUri();

        
        $this->assertSame($expected, $actual);
    }

    public function testGetterMethod()
    {
        $expected = 'GET';
        $globals['requestMethod'] = $expected;
        $request = new Request($globals);
        $actual = $request->getHttpMethod();

        
        $this->assertSame($expected, $actual);
    }

    public function testGetterParametersIfMethodGet()
    {
        $expected = ['id' => '213465464137'];
        $globals['get'] = $expected;
        $request = new Request($globals);
        $actual = $request->getParameters();

        $this->assertSame($expected, $actual);
    }

    public function testGetterParametersIfMethodPost()
    {
        $expected = ['id' => '213465464137'];
        $globals['post'] = $expected;
        $request = new Request($globals);
        $actual = $request->getParameters();

        $this->assertSame($expected, $actual);
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetterHeaders()
    {
        $expected = ['Cache-Control: no-cache, must-revalidate'];
        $globals['headers'] = $expected;
        
        $request = new Request($globals);
        $actual = $request->getHeaders();

        $this->assertSame($expected, $actual);
    }
}