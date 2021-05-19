<?php

namespace Nemundo\Project\Filename;


use Nemundo\Core\Path\AbstractPath;
use Nemundo\Project\Path\ProjectPath;
use Nemundo\Project\ProjectConfig;

class ProjectConfigFilename extends ProjectPath
{

    protected function loadPath()
    {

        parent::loadPath();
        $this->addPath('config.ini');

    }

}