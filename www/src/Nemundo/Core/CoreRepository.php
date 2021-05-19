<?php

namespace Nemundo\Core;

use Nemundo\Core\Repository\AbstractRepository;
use Nemundo\Project\AbstractProject;

class CoreRepository extends AbstractRepository
{

    protected function loadProject()
    {

        $this->project = 'Core';
        $this->projectName = 'core';
        $this->path = __DIR__;
        $this->namespace = __NAMESPACE__;

    }

}