<?php

namespace SomeCompany\Patterns\Silex;

use Mustache_Engine;
use Mustache_Loader_CascadingLoader;
use Mustache_Loader_FilesystemLoader;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Api\BootableProviderInterface;
use Silex\Application;
use SomeCompany\Patterns\PatternRenderer\MustachePatternRenderer;
use SomeCompany\Patterns\Twig\PatternExtension;
use Twig_Environment;

final class PatternServiceProvider implements ServiceProviderInterface, BootableProviderInterface
{
    public function register(Container $app)
    {
        $app['patterns.mustache'] = function () {
            return new Mustache_Engine([
                'loader' => new Mustache_Loader_CascadingLoader([
                    new Mustache_Loader_FilesystemLoader(__DIR__.'/../..'),
                    new Mustache_Loader_FilesystemLoader(__DIR__.'/../../resources/templates'),
                ]),
            ]);
        };

        $app['patterns.pattern_renderer'] = function () use ($app) {
            return new MustachePatternRenderer($app['patterns.mustache']);
        };
    }

    public function boot(Application $app)
    {
        if (isset($app['twig'])) {
            $app['twig'] = $app->extend(
                'twig',
                function (Twig_Environment $twig, Application $app) {
                    $twig->addExtension(new PatternExtension($app['patterns.pattern_renderer']));

                    return $twig;
                }
            );
        }
    }
}
