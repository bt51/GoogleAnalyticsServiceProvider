<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Bt51\Silex\Provider\GoogleAnalyticsServiceProvider\GoogleAnalyticsServiceProvider;

$app = new Application();

$app->register(TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views'
));

$app->register(new GoogleAnalyticsServiceProvider(),
			   array('ga.configuration' => array('code' => 'UA-XXXXX-X')));

$app->get('/', function () use ($app) {
    return $app['twig']->render('test.html.twig');
});
