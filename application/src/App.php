<?php

use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use SomeCompany\Patterns\Pattern\Menu;
use SomeCompany\Patterns\Pattern\MenuItem;
use SomeCompany\Patterns\Pattern\SiteHeader;
use SomeCompany\Patterns\Silex\PatternServiceProvider;

$app = new Application(['debug' => true]);

$app->register(new AssetServiceProvider());

$app->register(new PatternServiceProvider(), ['patterns.mustache.assets_path' => '/patterns']);

$app->register(new TwigServiceProvider(), [
    'twig.path' => __DIR__.'/../views',
]);

$app['site_header'] = function () use ($app) {
    $request = $app['request_stack']->getCurrentRequest();

    $menu = [
        $app['url_generator']->generate('home') => 'Home page',
        $app['url_generator']->generate('second') => 'Second page',
    ];

    return new SiteHeader(
        'Some company',
        $app['url_generator']->generate('home'),
        'Synergizing your virtual interfaces to disintermediate open-source e-commerce',
        new Menu(...array_map(function (string $text, string $url) use ($request) {
            return new MenuItem($text, $url, $request->getPathInfo() === $url);
        }, array_values($menu), array_keys($menu)))
    );
};

$app->extend('twig', function (Twig_Environment $twig, Application $app) {
    $twig->addGlobal('siteHeader', $app['site_header']);

    return $twig;
});

$app->get('/', function () use ($app) {
    return $app['twig']->render('page.html.twig', [
        'title' => 'Home page',
    ]);
})->bind('home');

$app->get('/second', function () use ($app) {
    return $app['twig']->render('page.html.twig', [
        'title' => 'Second page',
    ]);
})->bind('second');

return $app;
