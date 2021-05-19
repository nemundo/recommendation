<?php


namespace Nemundo\App\Robots\Filename;


use Nemundo\Project\Path\ConfigPath;

class RobotsConfigFilename extends ConfigPath
{

    protected function loadPath()
    {
        parent::loadPath();
        $this->addPath('robots');
        $this->addPath('robots.json');
    }

}