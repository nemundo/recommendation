<?php

namespace Nemundo\Srf;


use Nemundo\Content\App\ContentAppProject;
use Nemundo\Project\AbstractProject;

class SrfProject extends AbstractProject
{

    protected function loadProject()
    {
        $this->project = 'SRF';
        $this->projectName = 'srf';
        $this->path = __DIR__;
        $this->namespace = __NAMESPACE__;
        $this->modelPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR;

        $this->addDependency(new ContentAppProject());

    }

}