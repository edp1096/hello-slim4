A skeleton for my personal using.

## index.php
```php
<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/vendor/autoload.php'; // Not use public for vscode workspace

$app = AppFactory::create();

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->run();
```

## Using composer
```powershell
$ php .\composer.phar require slim/slim:^4.0
$ php .\composer.phar require slim/psr7
```

## Intelephense indexing
When intelephense show error which is not an error
```
F1 > intelephense: Index workspace
```
