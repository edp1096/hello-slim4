<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// require_once __DIR__ . '/../vendor/autoload.php';

// root
$front = function (Request $request, Response $response, array $args) {
    $helloMessage = "It works.";
    $response->getBody()->write($helloMessage);

    return $response;
};

// get
$hello = function (Request $request, Response $response, array $args) {
    $helloMessage = "Hello, " . $args['name'];

    $response->getBody()->write($helloMessage);

    return $response;
};

// post
$trypost = function (Request $request, Response $response) {
    $data = $request->getParsedBody();

    print_r($data);
    $response->getBody()->write(json_encode($data));

    return $response;
};

// post/json
$trypostjson = function (Request $request, Response $response) {
    $data = $request->getBody()->getContents();

    $response->getBody()->write($data);

    return $response;
};
