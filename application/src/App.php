<?php

use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use SomeCompany\Patterns\Pattern\Menu;
use SomeCompany\Patterns\Pattern\MenuItem;
use SomeCompany\Patterns\Pattern\SiteHeader;
use SomeCompany\Patterns\Silex\PatternServiceProvider;

// Set up the application.

$app = new Application(['debug' => true]);

$app->register(new AssetServiceProvider());

$app->register(new PatternServiceProvider(), ['patterns.mustache.assets_path' => '/patterns']);

$app->register(new TwigServiceProvider(), [
    'twig.path' => __DIR__.'/../views',
]);

// Make the site header pattern globally available.

$app->extend('twig', function (Twig_Environment $twig, Application $app) {
    $request = $app['request_stack']->getCurrentRequest();

    $menu = [
        $app['url_generator']->generate('home') => 'Home page',
        $app['url_generator']->generate('second') => 'Second page',
    ];

    $siteHeader = new SiteHeader(
        'Some company',
        $app['url_generator']->generate('home'),
        'Synergizing your virtual interfaces to disintermediate open-source e-commerce',
        new Menu(...array_map(function (string $text, string $url) use ($request) {
            return new MenuItem($text, $url, $request->getPathInfo() === $url);
        }, array_values($menu), array_keys($menu)))
    );

    $twig->addGlobal('siteHeader', $siteHeader);

    return $twig;
});

// Define a couple of pages.

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
