<?php

// use Psr\Http\Message\ResponseInterface as Response;
// use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . "/route/route.php";

$app = AppFactory::create();

// Add error handling middleware.
$displayErrorDetails = false;
$logErrors = false;
$logErrorDetails = false;
$app->addErrorMiddleware($displayErrorDetails, $logErrors, $logErrorDetails);

$app->get('/', $front);
$app->get('/hello/{name}', $hello);

$app->run();
