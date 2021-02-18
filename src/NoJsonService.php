<?php
declare(strict_types=1);

namespace I4code\JaApiSkeleton;

use Middlewares\FastRoute;
use Middlewares\RequestHandler;

class NoJsonService extends \I4code\JaApi\Service
{

    /**
     * @return array
     */
    public function createMiddlewareStack()
    {
        return array_merge(
            [new FastRoute($this->createRouter())],
            $this->middlewares,
            [new RequestHandler($this->getContainer())]);
    }

}