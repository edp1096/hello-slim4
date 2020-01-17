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

or

```powershell
$ php .\composer.phar install
```

## Intelephense indexing
When intelephense show error which is not an error
```
F1 > intelephense: Index workspace
```

## Route - rewrite set in nginx.conf
```nginx
...

    server {
        listen       10081;
        server_name  localhost;

        root   c:/pcbangstudio/workspace/hello-slim4;
        index  index.html index.htm index.php;

        location / {
            try_files $uri $uri/ /index.php?/$request_uri;
        }

        error_page   500 502 503 504  /50x.html;
        location = /50x.html {
            root   html;
        }

        location ~ \.php$ {
            root   c:/pcbangstudio/workspace/hello-slim4;
            
            fastcgi_split_path_info ^(.+\.php)(/.+)$;
            
            fastcgi_pass   127.0.0.1:9900;
            fastcgi_index  index.php;
            fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
            include        fastcgi_params;
        }
    }

...
```
