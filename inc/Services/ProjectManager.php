<?php

namespace RocketLauncherFrontTakeOff\Services;

use League\Flysystem\Filesystem;

class ProjectManager
{
    /**
     * @var Filesystem
     */
    protected $filesystem;

    /**
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function clean() {

    }
}
