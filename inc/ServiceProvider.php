<?php

namespace RocketLauncherFrontTakeOff;

use RocketLauncherBuilder\App;
use RocketLauncherBuilder\ServiceProviders\ServiceProviderInterface;
use RocketLauncherFrontTakeOff\Commands\InstallCommand;

class ServiceProvider implements ServiceProviderInterface
{

    public function attach_commands(App $app): App
    {
        $app->add(new InstallCommand());

        return $app;
    }
}
