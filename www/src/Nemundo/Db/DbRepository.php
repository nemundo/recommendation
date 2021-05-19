<?php

namespace Nemundo\Db;

use Nemundo\Core\CoreRepository;
use Nemundo\Core\Repository\AbstractRepository;
use Nemundo\Project\AbstractProject;

class DbRepository extends AbstractRepository
{

    protected function loadProject()
    {

        $this->project = 'Db';
        $this->projectName = 'db';
        $this->path = __DIR__;
        $this->namespace = __NAMESPACE__;

        $this->addDependency(new CoreRepository());

    }

}