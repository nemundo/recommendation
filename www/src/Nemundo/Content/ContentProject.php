<?php


namespace Nemundo\Content;


use Nemundo\FrameworkProject;
use Nemundo\Geo\Kml\KmlProject;
use Nemundo\Project\AbstractProject;

class ContentProject extends AbstractProject
{

    protected function loadProject()
    {

        $this->project = 'Content';
        $this->projectName = 'content';
        $this->path = __DIR__;
        $this->namespace = __NAMESPACE__;
        $this->modelPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR;

        $this->addDependency(new FrameworkProject());
        $this->addDependency(new KmlProject());

    }

}