<?php
declare(strict_types=1);

namespace I4code\JaApiSkeleton;

use I4code\JaApi\Controllers\ControllerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SampleController implements ControllerInterface
{
    public function __invoke(ServerRequestInterface $request, RequestHandlerInterface $handler)
    {
        $response = $handler->handle($request);
        $body = $response->getBody();
        $body->write('Hello world!');
        $response = $response->withBody($body);
        return $response;
    }
}