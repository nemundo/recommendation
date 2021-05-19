<?php

namespace Nemundo\Project\Path;


use Nemundo\Core\Path\AbstractPath;
use Nemundo\Project\ProjectConfig;

class ProjectPath extends AbstractPath
{

    protected function loadPath()
    {
        $this->addPath(ProjectConfig::$projectPath);
    }

}