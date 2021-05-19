<?php

namespace Nemundo\Project\Loader;


use Nemundo\Project\Config\ProjectConfigReader;
use Nemundo\Project\ProjectConfig;

class MySqlProjectLoader extends AbstractProjectLoader
{

    public function loadProject()
    {

        $config = new  ProjectConfigReader();
        $config->filename = ProjectConfig::$projectPath . 'config.ini';
        $config->readFile();

        $this->loadPath();

    }

}