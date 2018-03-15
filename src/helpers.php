<?php

if (! function_exists('oxboot')) {
    function oxboot($abstract = null, array $parameters = [])
    {
        if (is_null($abstract)) {
            return \Oxboot\Framework\Application::getInstance();
        }
        return \Oxboot\Framework\Application::getInstance()->make($abstract, $parameters);
    }
}
