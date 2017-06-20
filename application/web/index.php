<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

require_once __DIR__.'/../vendor/autoload.php';

ErrorHandler::register();
ExceptionHandler::register();

$app = include __DIR__.'/../src/App.php';

$app->run();
