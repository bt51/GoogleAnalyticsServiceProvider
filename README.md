GoogleAnalyticsServiceProvider
================

The GoogleAnalyticsServiceProvider adds a twig function for GA tracking

Installation
------------

Create a composer.json your project

    {
        "require": {
            "bt51/googleanalytics-serviceprovider": "dev-master"
        }
    }

Read more on composer here: http://getcomposer.org

Parameters
----------

* **ga.configuration**: An array with 'code' as the key and your GA code as the value

Registering
----------

See the *example/* directory to see how to register the service

Twig
----

This service provider adds a twig function to output a
view partial with the GA tracking script.

See the *example/* directory for more information on how to use it.

License
-------

MIT
