<?php
declare(strict_types=1);

namespace I4code\JaApiSkeleton;

use I4code\JaApi\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

set_include_path('..');

require  "vendor/autoload.php";

$service = new NoJsonService();
$service->get('/', SampleController::class);

$serverRequestFactory = new ServerRequestFactory();
$serverRequest = $serverRequestFactory->createLiveRequest();

$response = $service->dispatch($serverRequest);

(new SapiEmitter())->emit($response);