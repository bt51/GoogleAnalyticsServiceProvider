<?php

/*
 * This file is part of GoogleAnalyticsServiceProvider
 *
 * (c) Ben Tollakson <ben.tollakson@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bt51\Silex\Provider\GoogleAnalyticsServiceProvider\Twig;

class GoogleAnalyticsExtension extends \Twig_Extension
{
    protected $twig;
    
    protected $code;
    
    public function __construct($twig, $code)
    {
        $this->twig = $twig;
        $this->code = $code;
    }
    
    public function getFunctions()
    {
        return array('ga' => new \Twig_Function_Method($this,
                                                       'getGa',
                                                       array('is_safe' => array('html'))));
    }
    
    public function getGa()
    {
        return $this->twig->render('__ga.twig',
                                   array('code' => $this->code));
    }
    
    public function getName()
    {
        return 'ga';
    }
}
