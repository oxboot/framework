<?php

namespace Oxboot\Framework\Foundation\Bootstrap;

use Oxboot\Framework\Foundation\AliasLoader;
use Illuminate\Support\Facades\Facade;
use Oxboot\Framework\Foundation\PackageManifest;
use Illuminate\Contracts\Foundation\Application;

class RegisterFacades
{
    /**
     * Bootstrap the given application.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function bootstrap(Application $app)
    {
        Facade::clearResolvedInstances();

        Facade::setFacadeApplication($app);

        AliasLoader::getInstance(array_merge(
            $app->make('config')->get('app.aliases', []),
            $app->make(PackageManifest::class)->aliases()
        ))->register();
    }
}
