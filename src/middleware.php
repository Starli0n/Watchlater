<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

//use Watchlater\Api;

$container['token'] = function (Slim\Container $c) {
    return new Watchlater\Api\Token;
};

$container['JwtAuthentication'] = function (Slim\Container $c) {
    $settings = $c->get('settings')['api'];
    return new \Slim\Middleware\JwtAuthentication([
        'path' => ['/api', '/admin'],
        'passthrough' => ['/api/hello', '/api/token'],
        'secret' => $settings['jwt_secret'],
        'callback' => function ($request, $response, $arguments) use ($c) {
            $c['token']->hydrate($arguments['decoded']);
        }
    ]);
};

$app->add('JwtAuthentication');
