<?php


namespace Nemundo\App\Robots\Filename;


use Nemundo\Project\Path\WebPath;

class RobotsFilename extends WebPath
{

    protected function loadPath()
    {
        parent::loadPath();
        $this->addPath('robots.txt');
    }

}