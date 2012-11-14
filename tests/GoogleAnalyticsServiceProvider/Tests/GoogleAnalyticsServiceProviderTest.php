<?php
/*
 * This file is part of GoogleAnalyticsServiceProvider
 *
 * (c) Ben Tollakson <ben.tollakson@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GoogleAnalyticsServiceProvider\Tests;

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Bt51\Silex\Provider\GoogleAnalyticsServiceProvider\GoogleAnalyticsServiceProvider;

class GoogleAnalyticsServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    protected $app;
    
    public function setUp()
    {
        $this->app = new Application();
        $this->app->register(new TwigServiceProvider());

        $this->app->register(new GoogleAnalyticsServiceProvider(),
                       array('ga.configuration' => array('code' => 'UA-XXXXX-X')));
    }
    
    public function testTwigExtension()
    {
        if (!class_exists('Twig_Environment')) {
            $this->markTestSkipped('Twig is not installed.');
        }

        $this->assertInstanceOf('Bt51\\Silex\\Provider\\GoogleAnalyticsServiceProvider\\Twig\\GoogleAnalyticsExtension',
                                $this->app['twig']->getExtension('ga'));
    }
}
