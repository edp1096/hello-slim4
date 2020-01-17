<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// require_once __DIR__ . '/../vendor/autoload.php';

// 루트
$front = function (Request $request, Response $response, array $args) {
    $helloMessage = "It works.";
    $response->getBody()->write($helloMessage);

    return $response;
};

// Hello 이름
$hello = function (Request $request, Response $response, array $args) {
    $helloMessage = "Hello, " . $args['name'];
    $response->getBody()->write($helloMessage);

    return $response;
};
