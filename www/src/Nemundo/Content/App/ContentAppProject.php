<?php

namespace Nemundo\Content\App;


use Nemundo\Content\ContentProject;
use Nemundo\Project\AbstractProject;

class ContentAppProject extends AbstractProject
{

    protected function loadProject()
    {

        $this->project = 'Content App';
        $this->projectName = 'content_app';
        $this->path = __DIR__;
        $this->namespace = __NAMESPACE__;
        $this->modelPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR;

        $this->addDependency(new ContentProject());

    }

}