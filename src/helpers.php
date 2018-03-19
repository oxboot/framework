<?php

use Oxboot\Framework\Application;
use Illuminate\Contracts\View\Factory as ViewFactory;

if (! function_exists('app')) {
    function app($abstract = null, array $parameters = [])
    {
        $application = Application::getInstance();
        if (is_null($abstract)) {
            return $application;
        }
        return $application->make($abstract, $parameters);
    }
}

if (! function_exists('container')) {
    function container($abstract = null, array $parameters = [])
    {
        return app($abstract, $parameters);
    }
}

if (! function_exists('oxboot')) {
    function oxboot($abstract = null, array $parameters = [])
    {
        return app($abstract, $parameters);
    }
}
