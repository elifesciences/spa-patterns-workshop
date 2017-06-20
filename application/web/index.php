<?php

use SomeCompany\Patterns\Pattern\HelloWorld;
use SomeCompany\Patterns\PatternRenderer\MustachePatternRenderer;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application(['debug' => true]);

$app['mustache'] = function () {
    return new Mustache_Engine([
        'loader' => new Mustache_Loader_FilesystemLoader(ComposerLocator::getPath('some-company/patterns')),
    ]);
};

$app['pattern_renderer'] = function () use ($app) {
    return new MustachePatternRenderer($app['mustache']);
};

$app->get('/', function () use ($app) {
    return new Response('<html><head><link rel="stylesheet" href="/patterns/style.css"></head><body>'.$app['pattern_renderer']->render(new HelloWorld('jupiter')).'</body></html>');
});

$app->run();
