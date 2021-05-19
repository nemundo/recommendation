<?php

namespace Nemundo;

use Nemundo\Core\CoreRepository;
use Nemundo\Db\DbRepository;
use Nemundo\Html\HtmlRepository;
use Nemundo\Project\AbstractProject;

class FrameworkProject extends AbstractProject
{

    protected function loadProject()
    {

        $this->project = 'Framework';
        $this->projectName = 'framework';
        $this->path = __DIR__;
        $this->namespace = __NAMESPACE__;
        $this->modelPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR;

        $this
            ->addDependency(new CoreRepository())
            ->addDependency(new DbRepository())
            ->addDependency(new HtmlRepository());

    }

}