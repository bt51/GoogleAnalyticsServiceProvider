<?php

/*
 * This file is part of GoogleAnalyticsServiceProvider
 *
 * (c) Ben Tollakson <ben.tollakson@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bt51\Silex\Provider\GoogleAnalyticsServiceProvider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Bt51\Silex\Provider\GoogleAnalyticsServiceProvider\Twig\GoogleAnalyticsExtension;

class GoogleAnalyticsServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        if (! isset($app['twig'])) {
            throw new \InvalidArgumentException('You must register the twig service provider first');
        }
        
        $app['twig.loader.filesystem'] = $app->share($app->extend('twig.loader.filesystem',
                                                                  function (\Twig_Loader_Filesystem $loader) use ($app) {
            $loader->addPath(__DIR__ . DIRECTORY_SEPARATOR . 'Resources' . DIRECTORY_SEPARATOR . 'views');
            return $loader;
        }));
        
        $app['ga.configuration'] = (isset($app['ga.configuration']) ? $app['ga.configuration'] : array());
        
        $app['twig'] = $app->share($app->extend('twig', function ($twig, $app) {
            if (! isset($app['ga.configuration']['code'])) {
                throw new \InvalidArgumentException('No ga code was given. Set a ga code first');
            }
            
            $twig->addExtension(new GoogleAnalyticsExtension($twig,
                                                             $app['ga.configuration']['code']));
            return $twig;
        }));
    }   

    public function boot(Application $app)
    {   
    }   
}
