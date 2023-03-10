<?php

namespace RocketLauncherFrontTakeOff;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use RocketLauncherBuilder\App;
use RocketLauncherBuilder\Entities\Configurations;
use RocketLauncherBuilder\ServiceProviders\ServiceProviderInterface;
use RocketLauncherFrontTakeOff\Commands\InstallCommand;
use RocketLauncherFrontTakeOff\Services\FrontEndInstallationManage;

class ServiceProvider implements ServiceProviderInterface
{

    /**
     * @var Filesystem
     */
    protected $project_filesystem;

    /**
     * @var Filesystem
     */
    protected $library_filesystem;

    /**
     * Configuration from the project.
     *
     * @var Configurations
     */
    protected $configs;


    /**
     * Instantiate the class.
     *
     * @param Configurations $configs configuration from the project.
     * @param Filesystem $filesystem Interacts with the filesystem.
     * @param string $app_dir base directory from the cli.
     */
    public function __construct(Configurations $configs, Filesystem $filesystem, string $app_dir)
    {
        $this->configs = $configs;
        $this->project_filesystem = $filesystem;

        $adapter = new Local(
        // Determine root directory
            __DIR__ . '/../'
        );

        // The FilesystemOperator
        $this->library_filesystem = new Filesystem($adapter);
    }

    public function attach_commands(App $app): App
    {

        $frontend_installation_manager = new FrontEndInstallationManage($this->project_filesystem, $this->library_filesystem);

        $app->add(new InstallCommand($frontend_installation_manager));

        return $app;
    }
}
