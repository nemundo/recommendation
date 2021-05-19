<?php

namespace Nemundo\Html;

use Nemundo\Core\CoreRepository;
use Nemundo\Core\Repository\AbstractRepository;

class HtmlRepository extends AbstractRepository
{

    protected function loadProject()
    {

        $this->project = 'Html';
        $this->projectName = 'html';
        $this->path = __DIR__;
        $this->namespace = __NAMESPACE__;

        $this->addDependency(new CoreRepository());

    }

}