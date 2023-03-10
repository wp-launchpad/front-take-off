<?php

namespace RocketLauncherFrontTakeOff\Services;

use League\Flysystem\Filesystem;
use RocketLauncherFrontTakeOff\ObjectValues\FrontVersion;

class FrontEndInstallationManage
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
     * @param Filesystem $project_filesystem
     * @param Filesystem $library_filesystem
     */
    public function __construct(Filesystem $project_filesystem, Filesystem $library_filesystem)
    {
        $this->project_filesystem = $project_filesystem;
        $this->library_filesystem = $library_filesystem;
    }

    public function move_front_assets( FrontVersion $version ) {
        foreach ($this->library_filesystem->listPaths('front' . DIRECTORY_SEPARATOR . $version->getValue()) as $path) {

        }
    }

    public function create_template_folder() {
        $template_dir = 'templates';

        $params_path = 'configs/parameters.php';

        if ( ! $this->project_filesystem->has($template_dir) ) {
            return;
        }

        $this->project_filesystem->createDir($template_dir);

        if ( ! $this->project_filesystem->has( $params_path ) ) {
            return;
        }

        $content = $this->project_filesystem->read( $params_path );

        $this->project_filesystem->update($params_path, $content);
    }

    protected function add_template_param(string $content) {
        if(preg_match('/[\'"]template_path[\'"]\s=>/', $content)) {
            return $content;
        }



    }
}
