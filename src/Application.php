<?php

namespace Oxboot\Framework;

use Illuminate\Container\Container;

class Application extends Container
{

    protected $basePath;

    public function __construct($basePath = null)
    {
        if ($basePath) {
            $this->setBasePath($basePath);
        }

        $this->registerBaseBindings();
        $this->registerCoreContainerAliases();
    }

    protected function registerBaseBindings()
    {
        static::setInstance($this);
        $this->instance('app', $this);
        $this->instance(Container::class, $this);
    }

    public function setBasePath($basePath)
    {
        $this->basePath = rtrim($basePath, '\/');
        $this->bindPathsInContainer();
        return $this;
    }

    protected function bindPathsInContainer()
    {
        $this->instance('path', $this->path());
    }

    public function path($path = '')
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'app'.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    public function registerCoreContainerAliases()
    {
        foreach ([
                     'app'                  => [\Illuminate\Foundation\Application::class, \Illuminate\Contracts\Container\Container::class, \Illuminate\Contracts\Foundation\Application::class,  \Psr\Container\ContainerInterface::class],
                 ] as $key => $aliases) {
            foreach ($aliases as $alias) {
                $this->alias($key, $alias);
            }
        }
    }
}
