<?php

use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use SomeCompany\Patterns\Pattern\HelloWorld;
use SomeCompany\Patterns\Silex\PatternServiceProvider;

$app = new Application(['debug' => true]);

$app->register(new AssetServiceProvider());

$app->register(new PatternServiceProvider());

$app->register(new TwigServiceProvider(), [
    'twig.path' => __DIR__.'/../views',
]);

$app->get('/', function () use ($app) {
    return $app['twig']->render('hello-world.html.twig', [
        'helloWorld' => new HelloWorld('jupiter'),
    ]);
});

return $app;
