<?php
declare(strict_types=1);

namespace I4code\JaApiSkeleton\Test;

use I4code\JaApiSkeleton\SampleController;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SampleControllerTest extends TestCase
{

    public function testInvocation()
    {
        $expected = 'Hello world!';
        $bodyMock = $this->createMock(StreamInterface::class);
        $bodyMock->method('__toString')->willReturn($expected);
        $handlerMock = $this->createMock(RequestHandlerInterface::class);
        $requestMock = $this->createMock(ServerRequestInterface::class);
        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock->method('getBody')->willReturn($bodyMock);
        $responseMock->method('withBody')->willReturn($responseMock);
        $handlerMock->method('handle')->willReturn($responseMock);
        $controller = new SampleController();
        $response = $controller->__invoke($requestMock, $handlerMock);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals($expected, (string) $response->getBody());
    }
}
